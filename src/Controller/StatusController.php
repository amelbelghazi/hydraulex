<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Taskstatus Controller
 *
 * @property \App\Model\Table\TaskstatusTable $Taskstatus
 *
 * @method \App\Model\Entity\Taskstatus[] paginate($object = null, array $settings = [])
 */
class StatusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tasks', 'Status','TypesStatus']
        ];
        $status = $this->paginate($this->status);

        $this->set(compact('status'));
        $this->set('_serialize', ['Status']);
    }

    /**
     * View method
     *
     * @param string|null $id Taskstatus id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $status = $this->Status->get($id, [
            'contain' => ['Tasks', 'Status','TypesStatus']
        ]);

        $this->set('status', $status);
        $this->set('_serialize', ['Status']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $status = $this->Status->newEntity();
        if ($this->request->is('post')) {
            $status = $this->Status->patchEntity($status, $this->request->data);
            if ($this->Status->save($status)) {
                $this->Flash->success(__('The {0} has been saved.', 'Status'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Status'));
            }
        }
        $tasks = $this->Status->Tasks->find('list', ['limit' => 200]);
        $status = $this->Status->TypesStatus->find('list', ['limit' => 200]);
        $this->set(compact('status', 'tasks', 'types_status'));
        $this->set('_serialize', ['Status']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Taskstatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $status = $this->Status->get($id, [
            'contain' => ['Tasks','TypesStatus']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->Status->patchEntity($status, $this->request->data);
            if ($this->Status->save($status)) {
                $this->Flash->success(__('The {0} has been saved.', 'Status'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Status'));
            }
        }
        $tasks = $this->Status->Tasks->find('list', ['limit' => 200]);
        $status = $this->Status->TypesStatus->find('list', ['limit' => 200]);
        $this->set(compact('status', 'tasks', 'types_status'));
        $this->set('_serialize', ['Status']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Taskstatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $status = $this->Status->get($id);
        if ($this->Status->delete($status)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Status'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Status'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
