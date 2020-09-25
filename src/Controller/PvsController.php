<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pvs Controller
 *
 * @property \App\Model\Table\PvsTable $Pvs
 *
 * @method \App\Model\Entity\Pv[] paginate($object = null, array $settings = [])
 */
class PvsController extends AppController
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
            if (($this->request->data['critere']=='marche_id')) {
              $pvs = $this->Pvs->find()->innerJoinWith('Marches')->innerJoinWith('Marches.DetailsMarches')->select()->where('DetailsMarches.intitule LIKE "%'.$rech.'%" and DetailsMarches.id = (select id from details_marches M1 where id = M1.id order by M1.id DESC limit 1 )');

            } else {
                if (($this->request->data['critere']=='datePV')) {
                  $time = substr($rech, 6, 4).
                            substr($rech, 2, 4).
                            substr($rech, 0, 2);
                        $rech = $time;
                  $pvs = $this->Pvs->find()->select()->where('Pvs.'.$this->request->data['critere'].'LIKE "%'.$rech.'%"');
                
                } else {
                    if (($this->request->data['critere']=='types_PV_id')) {
                         $pvs = $this->Pvs->find()->innerJoinWith('TypesPvs')->select()->where('TypesPvs.libelle LIKE "%'.$rech.'%"');
                    } else {
                        $pvs = $this->Pvs->find()->select()->where('Pvs.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                }
            }
        }else{
            $pvs=$this->Pvs; 
        }
        $this->paginate = [
            'contain' => ['Marches', 'Marches.DetailsMarches', 'TypesPVs']
        ];
        $pvs = $this->paginate($this->Pvs);

        $this->set(compact('pvs'));
        $this->set('_serialize', ['pvs']);
    }

    /**
     * View method
     *
     * @param string|null $id Pv id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pv = $this->Pvs->get($id, [
            'contain' => ['Marches', 'Marches.DetailsMarches', 'TypesPVs','Documents']
        ]);

        
         $this->loadModel('Documents');
        $documents = $this->Documents->find()->select()->where('Documents.id = \''.$pv['document_id'].'\'')->first();
        $this->set(compact('documents'));

        $this->set('pv', $pv);
        $this->set('_serialize', ['pv']);
    }

    public function listeTypes(){
        $types = $this->Pvs->TypesPVs->find();
        $this->set('types', $types);
        $this->set('_serialize', ['types']);
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
        $typepv = $this->Pvs->TypesPVs->newEntity();
        $pv = $this->Pvs->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datePV'); 
            $marche_id = $this->Pvs->Marches->DetailsMarches->get($this->request->data['details_marche_id'])->marche_id;
            $pv = $this->Pvs->patchEntity($pv, $this->request->data);

              /******************************* sauvgarde de document  ****************************/
             $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Pvs-'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Pvs';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle=$this->request->data['libelle'];
                                if ($this->Documents->save($Documents)){
                                    $tags="Pvs";
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
                                      $pv->document_id=$Documents->id;
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


            $pv->marche_id = $marche_id; 
            if ($this->Pvs->save($pv)) {
                $this->Flash->success(__('The {0} has been saved.', 'Pv'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Pv'));
            }
        }
        $detailsMarches = $this->Pvs->Marches->DetailsMarches->find('list')
                        ->select()
                        ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $marches = $this->Pvs->Marches->find('list', ['limit' => 200]);
        $typesPVs = $this->Pvs->TypesPVs->find('list', ['limit' => 200]);
        $this->set(compact('pv', 'marches', 'typesPVs', 'detailsMarches', 'typepv'));
        $this->set('_serialize', ['pv']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pv id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pv = $this->Pvs->get($id, [
            'contain' => ['Marches', 'Marches.DetailsMarches']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datePV'); 
            $pv = $this->Pvs->patchEntity($pv, $this->request->data);
              /******************************* sauvgarde de document  ****************************/
             $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Pvs-'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Pvs';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle=$this->request->data['libelle'];
                                if ($this->Documents->save($Documents)){
                                    $tags="Pvs";
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
                                      $pv->document_id=$Documents->id;
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
            if ($this->Pvs->save($pv)) {
                $this->Flash->success(__('The {0} has been saved.', 'Pv'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Pv'));
            }
        }
        $detailsMarches = $this->Pvs->Marches->DetailsMarches->find('list')
                        ->select()
                        ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $marches = $this->Pvs->Marches->find('list', ['limit' => 200]);
        $typesPVs = $this->Pvs->TypesPVs->find('list', ['limit' => 200]);
        $this->set(compact('pv', 'marches', 'typesPVs', 'detailsMarches'));
        $this->set('_serialize', ['pv']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pv id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pv = $this->Pvs->get($id);
        if ($this->Pvs->delete($pv)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Pv'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Pv'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
