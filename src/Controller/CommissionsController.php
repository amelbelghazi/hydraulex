<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Commissions Controller
 *
 * @property \App\Model\Table\CommissionsTable $Commissions
 *
 * @method \App\Model\Entity\Commission[] paginate($object = null, array $settings = [])
 */
class CommissionsController extends AppController
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

                 $commissions = $this->Commissions->find()->innerJoinWith('Affaires')->select()->where('Affaires.intitule LIKE "%'.$rech.'%"');

            } else {
                if (($this->request->data['critere']=='datecommission')) {
                $time = substr($rech, 6, 4).
                        substr($rech, 2, 4).
                        substr($rech, 0, 2);
                $rech = $time;
                $commissions = $this->Commissions->find()->select()->where('Commissions.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                } else {
                    $commissions = $this->Commissions->find()->select()->where('Affaires.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }
                
                
                 
                }
        }else{
            $commissions=$this->Commissions; 
        }
        $this->paginate = [
            'contain' => ['Affaires','Documents']
        ];
        $commissions = $this->paginate($commissions);

        $this->set(compact('commissions'));
        $this->set('_serialize', ['commissions']);

    }
    // }

    /**
     * View method
     *
     * @param string|null $id Commission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commission = $this->Commissions->get($id, [
            'contain' => ['Affaires', 'EtatsCommissions']
        ]);

        $this->set('commission', $commission);
        $this->set('_serialize', ['commission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commission = $this->Commissions->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datecommission');
            $commission = $this->Commissions->patchEntity($commission, $this->request->data);
          
             /******************************* sauvgarde de document  ****************************/

                $this->loadModel('Documents');
                $this->loadModel('DocumentsTags');
                  $Documents = $this->Documents->newEntity(); 
                   if (!empty($this->request->data['document']['tmp_name'])) {

                        $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                        $size = $this->request->data['document']['size'];

                            if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                                $file = 'Commissions-'.time().'.'. $extension;
                                $path = WWW_ROOT . 'files' . DS . 'Commissions';

                                    if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                        $this->request->data['document'] = $file;
                                        $Documents = $this->Documents->patchEntity($Documents, $this->request->data);
                                        $Documents->libelle='Commissions';
                                        if ($this->Documents->save($Documents)){
                                            $tags="Commissions";
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
                                            $commission->document_id=$Documents->id;
                                        } else {
                                            $this->Flash->error(__('Le {0} n\'a pas pu être enregistré1. Veuillez réessayer', 'documents'));
                                        } 

                                    }else{
                                        $this->Flash->error(__('4 The {0} could not be saved2. Please, try again.', 'documents'));
                                    }
                            }else{
                                    $this->Flash->error(__('Le {0} n\'a pas pu être enregistré3. Veuillez réessayer. 
                                Les fichiers autoriser sont " .jpg, .png, .jpeg,.pdf,.gif,.docx,.doc"', 'documents'));
                            }
                        }

            /*******************************************************************/
            
            
            if ($this->Commissions->save($commission)) {
                $this->Flash->success(__('The {0} has been saved.5', 'Commission'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved.9 Please, try again.', 'Commission'));
            }
        }
        $affaires = $this->Commissions->Affaires->find('list', ['limit' => 200]);
        $this->set(compact('commission', 'affaires'));
        $this->set('_serialize', ['commission']);
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
     * @param string|null $id Commission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commission = $this->Commissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

             $this->toValideTime('datecommission');
            // debug( $this->toValideTime('datecommission'));die();
             $commission = $this->Commissions->patchEntity($commission, $this->request->data);
            
             /******************************* sauvgarde de document  ****************************/

                $this->loadModel('Documents');
                $this->loadModel('DocumentsTags');
                  $Documents = $this->Documents->newEntity(); 
                   if (!empty($this->request->data['document']['tmp_name'])) {

                        $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                        $size = $this->request->data['document']['size'];

                            if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                                $file = 'Commissions-'.time().'.'. $extension;
                                $path = WWW_ROOT . 'files' . DS . 'Commissions';

                                    if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                        $this->request->data['document'] = $file;
                                        $Documents = $this->Documents->patchEntity($Documents, $this->request->data);
                                        $Documents->libelle='Commissions';
                                        if ($this->Documents->save($Documents)){
                                            $tags="Commissions";
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
                                            $commission->document_id=$Documents->id;
                                        } else {
                                            $this->Flash->error(__('Le {0} n\'a pas pu être enregistré1. Veuillez réessayer', 'documents'));
                                        } 

                                    }else{
                                        $this->Flash->error(__('4 The {0} could not be saved2. Please, try again.', 'documents'));
                                    }
                            }else{
                                    $this->Flash->error(__('Le {0} n\'a pas pu être enregistré3. Veuillez réessayer. 
                                Les fichiers autoriser sont " .jpg, .png, .jpeg,.pdf,.gif,.docx,.doc"', 'documents'));
                            }
                        }

            /*******************************************************************/

            
            if ($this->Commissions->save($commission)) {
                $this->Flash->success(__('The {0} has been saved.', 'Commission'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved3. Please, try again.', 'Commission'));
            }
        }
        $affaires = $this->Commissions->Affaires->find('list', ['limit' => 200]);
        $this->set(compact('commission', 'affaires'));
        $this->set('_serialize', ['commission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Commission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commission = $this->Commissions->get($id);
        if ($this->Commissions->delete($commission)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Commission'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Commission'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
