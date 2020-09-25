<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesStatus Controller
 *
 * @property \App\Model\Table\TypesStatusTable $TypesStatus
 *
 * @method \App\Model\Entity\TypesStatus[] paginate($object = null, array $settings = [])
 */
class TypesStatusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $types_status = $this->paginate($this->types_status);

        $this->set(compact('types_status'));
        $this->set('_serialize', ['TypesStatus']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $types_status = $this->types_status->get($id, [
            'contain' => []
        ]);

        $this->set('types_status', $types_status);
        $this->set('_serialize', ['TypesStatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $types_status = $this->types_status->newEntity();
        if ($this->request->is('post')) {
            $types_status = $this->types_status->patchEntity($types_status, $this->request->data);
            if ($this->types_status->save($types_status)) {
                $this->Flash->success(__('The {0} has been saved.', 'TypesStatus'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'TypesStatus'));
            }
        }
        $this->set(compact('types_status'));
        $this->set('_serialize', ['TypesStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Status id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $types_status = $this->types_status->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $types_status = $this->types_status->patchEntity($types_status, $this->request->data);
            if ($this->types_status->save($types_status)) {
                $this->Flash->success(__('The {0} has been saved.', 'TypesStatus'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'TypesStatus'));
            }
        }
        $this->set(compact('types_status'));
        $this->set('_serialize', ['TypesStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Status id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $types_status = $this->types_status->get($id);
        if ($this->types_status->delete($types_status)) {
            $this->Flash->success(__('The {0} has been deleted.', 'TypesStatus'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'TypesStatus'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

