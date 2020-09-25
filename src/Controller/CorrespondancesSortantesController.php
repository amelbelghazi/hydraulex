<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CorrespondancesSortantes Controller
 *
 * @property \App\Model\Table\CorrespondancesSortantesTable $CorrespondancesSortantes
 *
 * @method \App\Model\Entity\CorrespondancesSortante[] paginate($object = null, array $settings = [])
 */
class CorrespondancesSortantesController extends AppController
{

    /**
     * Index method 
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        if($this->request->data){

            $rech = $this->request->data['search'];
            
            if ($this->request->data['critere']=='destinataire') {
                $correspondancesSortante = $this->CorrespondancesSortantes->find()->innerJoinWith('destinataires')->select()->where('Destinataires.nom LIKE "%'.$rech.'%"');
            } else{
                if ($this->request->data['critere']=='datecorrespondance'){

                        $time = substr($rech, 6, 4).
                                substr($rech, 2, 4).
                                substr($rech, 0, 2);
                        $rech = $time;
                        $correspondancesSortante = $this->CorrespondancesSortantes->find()->select()->where('CorrespondancesSortantes.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }else{
                        $correspondancesSortante = $this->CorrespondancesSortantes->find()->select()->where('CorrespondancesSortantes.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }
            }
        }else{
            $correspondancesSortante=$this->CorrespondancesSortantes;
             
        }

        $this->paginate = [
            'contain' => ['Destinataires']
        ];
        $correspondancesSortantes = $this->paginate($correspondancesSortante);

        $this->set(compact('correspondancesSortantes'));
        $this->set('_serialize', ['correspondancesSortantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Correspondances Sortante id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $correspondancesSortante = $this->CorrespondancesSortantes->get($id, [
            'contain' => ['Destinataires']
        ]);

        $this->set('correspondancesSortante', $correspondancesSortante);
        $this->set('_serialize', ['correspondancesSortante']);
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
        $correspondancesSortante = $this->CorrespondancesSortantes->newEntity();
         $destinataire = $this->CorrespondancesSortantes->Destinataires->newEntity();
        if ($this->request->is('post')) {
          
           //*********************************************
            
            if (!empty($this->request->data['fichier']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['fichier']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['fichier']['size'];
                if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc'))) {
                    $file = 'file-Sortante-'.time() . '.' . $extension;
                    $path = WWW_ROOT . 'img' . DS . 'Correspondances' . DS . 'Sortantes';
                    if (move_uploaded_file($this->request->data['fichier']['tmp_name'], $path . DS . $file)) {
                        $this->toValideTime('datecorrespondance'); 
                        $this->request->data['fichier'] = $file;
                        //debug($this->request->data); die(); 
                          $correspondancesSortante = $this->CorrespondancesSortantes->patchEntity($correspondancesSortante, $this->request->data);
                          //debug($correspondancesSortante);die();
                         //debug($correspondancesSortante);die();
                        if ($this->CorrespondancesSortantes->save($correspondancesSortante)) {
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

                    $correspondancesSortante = $this->CorrespondancesSortantes->patchEntity($correspondancesSortante, $this->request->data);
                    if ($this->CorrespondancesSortantes->save($correspondancesSortante)) 
                    {
                        $this->Flash->success(__('The {0} has been saved.', 'Correspondances Entrante'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Correspondances Entrante'));
                    }
            }
            //*********************
        }
        $destinataires = $this->CorrespondancesSortantes->Destinataires->find('list', ['limit' => 200]);
        $this->set(compact('correspondancesSortante', 'destinataires','destinataire'));
        $this->set('_serialize', ['correspondancesSortante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Correspondances Sortante id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $correspondancesSortante = $this->CorrespondancesSortantes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $correspondancesSortante = $this->CorrespondancesSortantes->patchEntity($correspondancesSortante, $this->request->data);
            if ($this->CorrespondancesSortantes->save($correspondancesSortante)) {
                $this->Flash->success(__('The {0} has been saved.', 'Correspondances Sortante'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Correspondances Sortante'));
            }
        }
        $destinataires = $this->CorrespondancesSortantes->Destinataires->find('list', ['limit' => 200]);
        $this->set(compact('correspondancesSortante', 'destinataires'));
        $this->set('_serialize', ['correspondancesSortante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Correspondances Sortante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $correspondancesSortante = $this->CorrespondancesSortantes->get($id);
        if ($this->CorrespondancesSortantes->delete($correspondancesSortante)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Correspondances Sortante'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Correspondances Sortante'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
