<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesPunition Controller
 *
 * @property \App\Model\Table\TypesPunitionTable $TypesPunition
 *
 * @method \App\Model\Entity\TypesPunition[] paginate($object = null, array $settings = [])
 */
class TypesPunitionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesPunition = $this->paginate($this->TypesPunition);

        $this->set(compact('typesPunition'));
        $this->set('_serialize', ['typesPunition']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Punition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesPunition = $this->TypesPunition->get($id, [
            'contain' => []
        ]);

        $this->set('typesPunition', $typesPunition);
        $this->set('_serialize', ['typesPunition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesPunition = $this->TypesPunition->newEntity();
        if ($this->request->is('post')) {
            $typesPunition = $this->TypesPunition->patchEntity($typesPunition, $this->request->data);
            if ($this->TypesPunition->save($typesPunition)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Punition'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Punition'));
            }
        }
        $this->set(compact('typesPunition'));
        $this->set('_serialize', ['typesPunition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Punition id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesPunition = $this->TypesPunition->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesPunition = $this->TypesPunition->patchEntity($typesPunition, $this->request->data);
            if ($this->TypesPunition->save($typesPunition)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Punition'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Punition'));
            }
        }
        $this->set(compact('typesPunition'));
        $this->set('_serialize', ['typesPunition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Punition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesPunition = $this->TypesPunition->get($id);
        if ($this->TypesPunition->delete($typesPunition)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Punition'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Punition'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
