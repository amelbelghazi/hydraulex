<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attachements Controller
 *
 * @property \App\Model\Table\AttachementsTable $Attachements
 *
 * @method \App\Model\Entity\Attachement[] paginate($object = null, array $settings = [])
 */
class AttachementsController extends AppController
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
            if (($this->request->data['critere']=='devi_id')) {
              $attachementsTravaux = $this->AttachementsTravaux->find()->innerJoinWith('Devis')->select()->where('Devis.intitule LIKE "%'.$rech.'%"');

            } else {
                if (($this->request->data['critere']=='dateattachement')) {
                  $time = substr($rech, 6, 4).
                            substr($rech, 2, 4).
                            substr($rech, 0, 2);
                        $rech = $time;
                  $attachementsTravaux = $this->AttachementsTravaux->find()->select()->where('AttachementsTravaux.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                
                } else {
                        $attachementsTravaux = $this->AttachementsTravaux->find()->select()->where('AttachementsTravaux.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                
                 
                }
        }else{
            $attachementsTravaux=$this->AttachementsTravaux; 
        }
        $this->paginate = [
            'contain' => ['Devis']
        ];
        $attachementsTravaux = $this->paginate($attachementsTravaux);

        $this->set(compact('attachementsTravaux'));
        $this->set('_serialize', ['attachementsTravaux']);
    }

    /**
     * View method
     *
     * @param string|null $id Attachement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attachement = $this->Attachements->get($id, [
            'contain' => ['Emails', 'Documents']
        ]);

        $this->set('attachement', $attachement);
        $this->set('_serialize', ['attachement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attachement = $this->Attachements->newEntity();
        if ($this->request->is('post')) {
            $attachement = $this->Attachements->patchEntity($attachement, $this->request->data);
            if ($this->Attachements->save($attachement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attachement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attachement'));
            }
        }
        $emails = $this->Attachements->Emails->find('list', ['limit' => 200]);
        $documents = $this->Attachements->Documents->find('list', ['limit' => 200]);
        $this->set(compact('attachement', 'emails', 'documents'));
        $this->set('_serialize', ['attachement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachement = $this->Attachements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attachement = $this->Attachements->patchEntity($attachement, $this->request->data);
            if ($this->Attachements->save($attachement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attachement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attachement'));
            }
        }
        $emails = $this->Attachements->Emails->find('list', ['limit' => 200]);
        $documents = $this->Attachements->Documents->find('list', ['limit' => 200]);
        $this->set(compact('attachement', 'emails', 'documents'));
        $this->set('_serialize', ['attachement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachement = $this->Attachements->get($id);
        if ($this->Attachements->delete($attachement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attachement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attachement'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
