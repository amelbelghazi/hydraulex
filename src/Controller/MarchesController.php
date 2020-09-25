<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Marches Controller
 *
 * @property \App\Model\Table\MarchesTable $Marches
 *
 * @method \App\Model\Entity\marche[] paginate($object = null, array $settings = [])
 */
class MarchesController extends AppController
{

    /**
     * Index method 
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
      if($this->request->data){
            //debug($this->request->data);
            $rech = $this->request->data['search'];
            if (($this->request->data['critere']=='affaire_id')) {
                 
                  $marches = $this->Marches->find()->innerJoinWith('Affaires')->select()->where('Affaires.intitule LIKE "%'.$rech.'%"');

            } else {
                if (($this->request->data['critere']=='maitres_oeuvre_id')) {
               
               $marches = $this->Marches->find()->innerJoinWith('MaitresOeuvres')->select()->where('MaitresOeuvres.nom LIKE "%'.$rech.'%"');
                } else {
                    $marches = $this->Marches->find()->select()->where('Marches.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }
                 
                }
        }else{
            $marches=$this->Marches; 
        }
        $this->paginate = [
            'contain' => ['Affaires', 'MaitresOeuvres']
        ];
        $marches = $this->paginate($marches);

        $this->set(compact('marches'));
        $this->set('_serialize', ['marches']);
    }

    /**
     * View method
     *
     * @param string|null $id Marche id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marche = $this->Marches->get($id, [
            'contain' => ['Affaires', 'MaitresOeuvres', 'EtatsMarches', 'EtatsMarches.Etats', 'Avances', 'Avenants', 'Cautions', 'Chantiers', 'Correspondances', 'DetailsMarches', 'Devis', 'ProjetsSoustraitant', 'Pvs', 'VisasCf','Documents']
        ]);

         $this->loadModel('Documents');
        $documents = $this->Documents->find()->select()->where('Documents.id = \''.$marche['document_id'].'\'')->first();
        $this->set(compact('documents'));


        $this->set('marche', $marche);
        $this->set('_serialize', ['marche']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marche = $this->Marches->newEntity();
        if ($this->request->is('post')) {
            $marche = $this->Marches->patchEntity($marche, $this->request->data);
            if ($this->Marches->save($marche)) {
                $this->Flash->success(__('The {0} has been saved.', 'Marche'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Marche'));
            }
        }
        $affaires = $this->Marches->Affaires->find('list', ['limit' => 200]);
        $maitresOeuvres = $this->Marches->MaitresOeuvres->find('list', ['limit' => 200]);
        $etats = $this->Marches->EtatsMarches->Etats->find('list', ['limit' => 200]);
        $this->set(compact('marche', 'affaires', 'maitresOeuvres', 'etats'));
        $this->set('_serialize', ['marche']);
    }

    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }

    /**
     * Edit method
     *
     * @param string|null $id Marche id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
       
        
        $marche = $this->Marches->get($id, [
            'contain' => ['Affaires', 'MaitresOeuvres', 'EtatsMarches', 'EtatsMarches.Etats', 'Avances', 'Avenants', 'Cautions', 'Chantiers', 'Correspondances', 'DetailsMarches', 'Devis', 'ProjetsSoustraitant', 'Pvs', 'VisasCf']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $time = substr($this->request->data['VisasCF']['datevisa'], 6, 4).
                    substr($this->request->data['VisasCF']['datevisa'], 2, 4).
                    substr($this->request->data['VisasCF']['datevisa'], 0, 2);
            $this->request->data['VisasCF']['datevisa'] = $time; 

              $marche = $this->Marches->patchEntity($marche, $this->request->data);
          
 
            /******************************* sauvgarde de document  ****************************/
             $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Marches'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Marches';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle=$this->request->data['DetailsMarches']['intitule'];
                                if ($this->Documents->save($Documents)){
                                    $tags="Marches";
                                    $tag = $this->Documents->Tags->find()->select()->where('Tags.libelle = \''.$tags.'\'')->first();
                                    if (!isset($tag)) {
                                        $tag = $this->Documents->Tags->newEntity();
                                        $tag->libelle= $tags;
                                        $this->Documents->Tags->save($tag);
                                    }
                                    $documentstag = $this->DocumentsTags->newEntity();
                                    $documentstag->document_id=$Documents->id;
                                    $documentstag->tag_id=$tag->id;
                                    $this->Documents->DocumentsTags->save($documentstag);
                                      $marche->document_id=$Documents->id;
                                } else {
                                    $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer', 'documents'));
                                } 

                            }else{
                                $this->Flash->error(__('4 The {0} could not be saved. Please, try again.', 'documents'));
                            }
                    }else{
                            $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer. 
                        Les fichiers autoriser sont " .jpg, .png, .jpeg,.pdf,.gif,.docx,.doc"', 'documents'));
                    }
            }

            /********************************************************/
            

          
            if ($this->Marches->save($marche)) {

               
                $VisaCF = $this->Marches->VisasCF->newEntity(); 
                $VisaCF = $this->Marches->VisasCF->patchEntity($VisaCF, $this->request->data['VisasCF']);
                $VisaCF->marche_id = $marche->id; 
               
                
                if ($this->Marches->VisasCF->save($VisaCF)) {
                    $this->Flash->success(__('Le {0} a bien été enregistré.', 'marche'));
                    return $this->redirect(['action' => 'index']); 
                } else {
                    $this->Flash->error(__('Le {0} n\' pas pu etre enregistré. Veuillez réessayer.', 'visa'));
                }
            } else {
                $this->Flash->error(__('Le {0} n\' pas pu etre enregistré. Veuillez réessayer.', 'marche'));
            }
        }
        $affaires = $this->Marches->Affaires->find('list', ['limit' => 200]);
        $maitresOeuvres = $this->Marches->MaitresOeuvres->find('list', ['limit' => 200]);
        $etats = $this->Marches->EtatsMarches->Etats->find('list', ['limit' => 200]);
        $this->set(compact('marche', 'affaires', 'maitresOeuvres', 'etats'));
        $this->set('_serialize', ['marche']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marche id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marche = $this->Marches->get($id);
        if ($this->Marches->delete($marche)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Marche'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Marche'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
