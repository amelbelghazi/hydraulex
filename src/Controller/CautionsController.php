<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cautions Controller
 *
 * @property \App\Model\Table\CautionsTable $Cautions
 *
 * @method \App\Model\Entity\Caution[] paginate($object = null, array $settings = [])
 */
class CautionsController extends AppController
{ 
 
    /** 
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {   
        $this->loadModel('DetailsMarches');
        $this->loadModel('RemboursementsCaution');

         if($this->request->data){
            //debug($this->request->data);
            $rech = $this->request->data['search'];
            if (($this->request->data['critere']=='marche_id')) {
                 $cautions = $this->Cautions->find()->innerJoinWith('Marches')->innerJoinWith('Marches.DetailsMarches')->select()->where('DetailsMarches.intitule LIKE "%'.$rech.'%" and DetailsMarches.id = (select id from details_marches M1 where id = M1.id order by M1.id DESC limit 1 )');

            } else {
                if (($this->request->data['critere']=='types_caution_id')) {
               
               $cautions = $this->Cautions->find()->innerJoinWith('TypesCautions')->select()->where('TypesCautions.libelle LIKE "%'.$rech.'%"');
                } else {
                        $cautions = $this->Cautions->find()->select()->where('Cautions.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                
                 
                }
        }else{
            $cautions=$this->Cautions; 
        }

        $this->paginate = [
            'contain' => ['Marches','Marches.DetailsMarches', 'TypesCautions','RemboursementsCaution']
        ]; 
        $RemboursementsCaution = $this->RemboursementsCaution->find('all');
        $cautions = $this->paginate($cautions);

        $this->set(compact('cautions','RemboursementsCaution'));
        $this->set('_serialize', ['cautions']);

    }

    /**
     * View method
     *
     * @param string|null $id Caution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caution = $this->Cautions->get($id, [
            'contain' => ['Marches', 'TypesCautions','Marches.DetailsMarches','RemboursementsCaution','Documents']
        ]);
        $this->loadModel('Documents');
        $documents = $this->Documents->find()->select()->where('Documents.id = \''.$caution['document_id'].'\'')->first();
        $this->set(compact('documents'));
        $this->set('caution', $caution);
        $this->set('_serialize', ['caution']);
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
        $caution = $this->Cautions->newEntity();
         $typesCaution = $this->Cautions->TypesCautions->newEntity();
        if ($this->request->is('post')) {
            //debug($this->request->data);die();
            //$this->toValideTime('dateremboursement');
            

            $detailsmarches_id = $this->request->data['details_marche_id'];
            $marche_id = $this->Cautions->Marches->DetailsMarches->get($detailsmarches_id)->marche_id; 
            $caution = $this->Cautions->patchEntity($caution, $this->request->data);

              /******************************* sauvgarde de document  ****************************/
        $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Cautions-'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Cautions';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle='Cautions-'.$this->request->data['numero'];
                                if ($this->Documents->save($Documents)){
                                    $tags="Cautions";
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
                                      $caution->document_id=$Documents->id;
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



            $caution->marche_id = $marche_id; 
            $caution->etat = 'Non Rembourser';
             
            if ($this->Cautions->save($caution)) {
                $this->Flash->success(__('The {0} has been saved.', 'Caution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Caution'));
            } 
        }
 
        $typesCautions = $this->Cautions->TypesCautions->find('list', ['limit' => 200]);
        $detailsmarches = $this->Cautions->Marches->DetailsMarches->find('list')
                               ->select()
                               ->where('id = (select id from details_marches d1 where id = id order by d1.id DESC limit 1)');
        //debug($typesCautions);die();
        $this->set(compact('caution', 'marches', 'typesCautions','detailsmarches','typesCaution'));
        $this->set('_serialize', ['caution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caution = $this->Cautions->get($id, [
            'contain' => ['Marches', 'TypesCautions','Marches.DetailsMarches','RemboursementsCaution']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $caution = $this->Cautions->patchEntity($caution, $this->request->data);
             /******************************* sauvgarde de document  ****************************/
             $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Cautions-'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Cautions';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle='Cautions-'.$this->request->data['numero'];
                                if ($this->Documents->save($Documents)){
                                    $tags="Cautions";
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
                                      $caution->document_id=$Documents->id;
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
            if ($this->Cautions->save($caution)) {
                $this->Flash->success(__('The {0} has been saved.', 'Caution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Caution'));
            }
        }
        $marches = $this->Cautions->Marches->find('list', ['limit' => 200]);
        $typesCautions = $this->Cautions->TypesCautions->find('list', ['limit' => 200]);
        $detailsMarches = $this->Cautions->Marches->DetailsMarches->find('list')
                               ->select()
                               ->where('id = (select id from details_marches d1 where id = id order by d1.id DESC limit 1)');
        $this->set(compact('caution', 'marches', 'typesCautions','detailsmarches'));
        $this->set('_serialize', ['caution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Caution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caution = $this->Cautions->get($id);
        if ($this->Cautions->delete($caution)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Caution'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Caution'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function TotalMontants($idmarche = null)
    {
        $iddetails = $this->request->params['pass'][0]; 
      
        $this->loadModel('detailsmarches'); 
        $TotalMontants = $this->Cautions->Marches->DetailsMarches->get($iddetails)->montant;
                          /*  ->find()
                            ->select('montant')
                            ->where('DetailsMarches.id = '.$iddetails.' order by DetailsMarches.id DESC limit 1');*/
      
           $this->set('TotalMontants', $TotalMontants);
           $this->set('_serialize', ['TotalMontants']);
          
    }
    public function pourcentagesCautions($idtypecaution = null)
    {
        $idtypecaution = $this->request->params['pass'][0]; 
        $this->loadModel('TypesCautions'); 
        $TypesCautions = $this->Cautions->TypesCautions
                            ->find()
                            ->select('pourcentage')
                            ->where('TypesCautions.id = '.$idtypecaution);
    
           $this->set('TypesCautions', $TypesCautions);
           $this->set('_serialize', ['TypesCautions']);
       
    }
    
}
