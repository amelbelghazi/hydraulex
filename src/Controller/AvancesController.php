<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Avances Controller
 *
 * @property \App\Model\Table\AvancesTable $Avances
 *
 * @method \App\Model\Entity\Avance[] paginate($object = null, array $settings = [])
 */
class AvancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('DetailsMarches');
        $this->loadModel('RemboursementsAvance');

        if($this->request->data){
            $rech = $this->request->data['search'];
            if (($this->request->data['critere']=='dateavance')|| ($this->request->data['critere']=='dateremboursement')) {

                $time = substr($rech, 6, 4).
                        substr($rech, 2, 4).
                        substr($rech, 0, 2);
                $rech = $time;
                $Avances = $this->Avances->find()->select()->where('Avances.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
            }else{
                if (($this->request->data['critere']=='marche_id')) {
                    $Avances = $this->Avances->find()->innerJoinWith('Marches')->innerJoinWith('Marches.DetailsMarches')->select()->where('DetailsMarches.intitule LIKE "%'.$rech.'%" and DetailsMarches.id = (select id from details_marches M1 where id = M1.id order by M1.id DESC limit 1 )');
                } else {
                    $Avances = $this->Avances->find()->select()->where('Avances.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }

                
            }
            
        }else{ 
            $Avances=$this->Avances;
             
        }
       
        $this->paginate = [
            'contain' => ['Marches','Marches.DetailsMarches','RemboursementsAvance','TypesAvances']
        ];
        $RemboursementsAvance = $this->RemboursementsAvance->find('all');
         $avances = $this->paginate($Avances);
        $this->set(compact('avances','marches','RemboursementsAvance'));
        $this->set('_serialize', ['avances']);
    }

    /**
     * View method
     *
     * @param string|null $id Avance id.
     * @return \Cake\Http\Response|void 
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('DetailsMarches');
        $this->loadModel('RemboursementsAvance');
        $this->loadModel('Documents');
        $avance = $this->Avances->get($id, [
            'contain' => ['Marches', 'Marches.DetailsMarches', 'RemboursementsAvance','Documents']
        ]);
        $marches = $this->DetailsMarches->find('all');
        $this->paginate = [
            'contain' => ['Marches','RemboursementsAvance']
        ];
        $RemboursementsAvance = $this->RemboursementsAvance->find('all');

        $documents = $this->Documents->find()->select()->where('Documents.id = \''.$avance['document_id'].'\'')->first();

        $this->set(compact('marches','RemboursementsAvance','documents'));
        $this->set('avance', $avance);
        $this->set('_serialize', ['avance']);
    }
    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() 
    {
        $this->loadModel('DetailsMarches'); 
        $this->loadModel('TypesAvances');
        $avance = $this->Avances->newEntity();
        $typesAvance = $this->Avances->TypesAvances->newEntity();
        if ($this->request->is('post')) {
         // debug($this->request->data);die();
            $this->toValideTime('dateremboursement'); 
            $this->toValideTime('dateavance');

            
            $detailsmarches_id = $this->request->data['details_marche_id'];
            $marche_id = $this->Avances->Marches->DetailsMarches->get($detailsmarches_id)->marche_id; 
            $avance = $this->Avances->patchEntity($avance, $this->request->data);

            /******************************* sauvgarde de document  ****************************/
        $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Avances-'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Avances';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle='Avances';
                                if ($this->Documents->save($Documents)){
                                    $tags="Avances";
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
                                      $avance->document_id=$Documents->id;
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
            //debug($avance);die();
            $avance->marche_id = $marche_id; 
            $avance->types_avance_id = $this->request->data['types_avance_id'];
             // debug($avance->types_avance_id);die();
            if ($this->Avances->save($avance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Avance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Avance'));
               
            }
        }
        $detailsMarches = $this->Avenants->Marches->DetailsMarches->find('list')
                               ->select()
                               ->where('id = (select id from details_marches d1 where id = id order by d1.id DESC limit 1)');
        $typesAvances = $this->Avances->TypesAvances->find('list', ['limit' => 200]);

        $this->set(compact('avance', 'detailsmarches','typesAvances','typesAvance'));
        $this->set('_serialize', ['avance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Avance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('DetailsMarches');
        $avance = $this->Avances->get($id, [
            'contain' => ['Marches','Marches.DetailsMarches', 'RemboursementsAvance','TypesAvances']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $this->toValideTime('dateremboursement'); 
              $this->toValideTime('dateavance');
             
            $avance = $this->Avances->patchEntity($avance, $this->request->data);

              /******************************* sauvgarde de document  ****************************/
        $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Avances-'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Avances';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle='Avances';
                                if ($this->Documents->save($Documents)){
                                    $tags="Avances";
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
                                      $avance->document_id=$Documents->id;
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
            //debug($avance);die(); 
            if ($this->Avances->save($avance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Avance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Avance'));
            }
        }
        //$detailsmarches = $this->DetailsMarches->find('list', ['limit' => 200]);
        $typesAvances = $this->Avances->TypesAvances->find('list', ['limit' => 200]);
        
        $this->set(compact('avance','typesAvances'));
        $this->set('_serialize', ['avance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Avance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $avance = $this->Avances->get($id);
        if ($this->Avances->delete($avance)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Avance'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Avance'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function TotalMontants($idmarche = null)
    {
        $iddetails = $this->request->params['pass'][0]; 
      
        $this->loadModel('detailsmarches'); 
        $TotalMontants = $this->Avances->Marches->DetailsMarches
                            ->get($iddetails)->montant; 
      
           $this->set('TotalMontants', $TotalMontants);
           $this->set('_serialize', ['TotalMontants']);
          
    }
    public function pourcentagesAvances($idtypeavance = null)
    {
        $idtypeavance = $this->request->params['pass'][0]; 
        $this->loadModel('TypesAvances'); 
        $TypesAvances = $this->Avances->TypesAvances
                            ->find()
                            ->select('pourcentage')
                            ->where('TypesAvances.id = '.$idtypeavance);
    //debug($TypesAvances);die();
           $this->set('TypesAvances', $TypesAvances);
           $this->set('_serialize', ['TypesAvances']);
       
    }
}
