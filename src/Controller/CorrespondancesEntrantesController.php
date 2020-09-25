<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CorrespondancesEntrantes Controller
 *
 * @property \App\Model\Table\CorrespondancesEntrantesTable $CorrespondancesEntrantes
 *
 * @method \App\Model\Entity\CorrespondancesEntrante[] paginate($object = null, array $settings = [])
 */
class CorrespondancesEntrantesController extends AppController
{
 
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {$this->loadModel('Expediteurs'); 
        if($this->request->data){

            $rech = $this->request->data['search'];
            
            if ($this->request->data['critere']=='expediteur') {
                $correspondancesEntrante = $this->CorrespondancesEntrantes->find()->innerJoinWith('expediteurs')->select()->where('expediteurs.nom LIKE "%'.$rech.'%"');
            } else{
                if ($this->request->data['critere']=='dateenvoi'){

                        $time = substr($rech, 6, 4).
                                substr($rech, 2, 4).
                                substr($rech, 0, 2);
                        $rech = $time;
                        $correspondancesEntrante = $this->CorrespondancesEntrantes->find()->select()->where('CorrespondancesEntrantes.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }else{
                        $correspondancesEntrante = $this->CorrespondancesEntrantes->find()->select()->where('CorrespondancesEntrantes.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }
            }
        }else{
            $correspondancesEntrante=$this->CorrespondancesEntrantes;
             
        }
       
        $this->paginate = [
                    'contain' => ['Expediteurs']
                ];
        
        $correspondancesEntrantes = $this->paginate($correspondancesEntrante);
        // debug($correspondancesEntrantes);

        $this->set(compact('correspondancesEntrantes'));
        $this->set('_serialize', ['correspondancesEntrantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Correspondances Entrante id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $correspondancesEntrante = $this->CorrespondancesEntrantes->get($id, [
            'contain' => ['Expediteurs']
        ]);

        $this->set('correspondancesEntrante', $correspondancesEntrante);
        $this->set('_serialize', ['correspondancesEntrante']);
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
        $correspondancesEntrante = $this->CorrespondancesEntrantes->newEntity();
        $expediteur = $this->CorrespondancesEntrantes->Expediteurs->newEntity();
        if ($this->request->is('post')) {
            //*********************************************
           //debug($this->request->data);die();

            if (!empty($this->request->data['fichier']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['fichier']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['fichier']['size'];
                if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc'))) {
                    $file = 'file-entrantes-'.time() . '.' . $extension;
                    $path = WWW_ROOT . 'img' . DS . 'Correspondances' . DS . 'Entrantes';
                    if (move_uploaded_file($this->request->data['fichier']['tmp_name'], $path . DS . $file)) {
                        $this->toValideTime('dateenvoi'); 
                        $this->request->data['fichier'] = $file;

                          $correspondancesEntrante = $this->CorrespondancesEntrantes->patchEntity($correspondancesEntrante, $this->request->data);
                         //debug($correspondancesEntrante);die();
                        if ($this->CorrespondancesEntrantes->save($correspondancesEntrante)) {
                            $this->Flash->success(__('The {0} has been saved.', 'User'));
                                return $this->redirect(['action' => 'index']);
                            } 
                            else {
                                $this->Flash->error(__('5 The {0} could not be saved. Please, try again.', 'User'));
                            }
                    }else {

                        $this->Flash->error(__('4 The {0} could not be saved. Please, try again.', 'User'));
                    }
                }else {

                    $this->Flash->error(__('3 The {0} could not be saved. Please, try again.', 'User'));
                }
            }else {

                    $correspondancesEntrante = $this->CorrespondancesEntrantes->patchEntity($correspondancesEntrante, $this->request->data);
                    if ($this->CorrespondancesEntrantes->save($correspondancesEntrante)) 
                    {
                        $this->Flash->success(__('The {0} has been saved.', 'Correspondances Entrante'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Correspondances Entrante'));
                    }
            }
            //*********************
            
        }
        $expediteurs = $this->CorrespondancesEntrantes->Expediteurs->find('list', ['limit' => 200]);

        $this->set(compact('correspondancesEntrante', 'expediteurs','expediteur'));
        $this->set('_serialize', ['correspondancesEntrante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Correspondances Entrante id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $correspondancesEntrante = $this->CorrespondancesEntrantes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $correspondancesEntrante = $this->CorrespondancesEntrantes->patchEntity($correspondancesEntrante, $this->request->data);
            if ($this->CorrespondancesEntrantes->save($correspondancesEntrante)) {
                $this->Flash->success(__('The {0} has been saved.', 'Correspondances Entrante'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Correspondances Entrante'));
            }
        }
        $expediteurs = $this->CorrespondancesEntrantes->Expediteurs->find('list', ['limit' => 200]);
        $this->set(compact('correspondancesEntrante', 'expediteurs'));
        $this->set('_serialize', ['correspondancesEntrante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Correspondances Entrante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $correspondancesEntrante = $this->CorrespondancesEntrantes->get($id);
        if ($this->CorrespondancesEntrantes->delete($correspondancesEntrante)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Correspondances Entrante'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Correspondances Entrante'));
        }
        return $this->redirect(['action' => 'index']);
    }

   
    public function download($id=null) { 
         $file = $this->CorrespondancesEntrantes->get($id);
         $file = $file->fichier;
        $filePath = WWW_ROOT .'img' . DS . 'Correspondances' . DS . 'Entrantes'. DS . $file ;
      
      $response= $this->response->file($filePath ,
        array('download'=> true, 'name'=> 'file name'));
     debug($response);die();

    // Retourne la réponse pour éviter que le controller n'essaie de
    // rendre la vue
  
    return $response;
    
}


}