<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesPvs Controller
 *
 * @property \App\Model\Table\TypesPvsTable $TypesPvs
 *
 * @method \App\Model\Entity\TypesPv[] paginate($object = null, array $settings = [])
 */
class TypesPvsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesPvs = $this->paginate($this->TypesPvs);

        $this->set(compact('typesPvs'));
        $this->set('_serialize', ['typesPvs']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Pv id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesPv = $this->TypesPvs->get($id, [
            'contain' => []
        ]);

        $this->set('typesPv', $typesPv);
        $this->set('_serialize', ['typesPv']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesPv = $this->TypesPvs->newEntity();
        if ($this->request->is('post')) {
            $typesPv = $this->TypesPvs->patchEntity($typesPv, $this->request->data);
            if ($this->TypesPvs->save($typesPv)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Pv'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Pv'));
            }
        }
        $this->set(compact('typesPv'));
        $this->set('_serialize', ['typesPv']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Pv id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesPv = $this->TypesPvs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesPv = $this->TypesPvs->patchEntity($typesPv, $this->request->data);
            if ($this->TypesPvs->save($typesPv)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Pv'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Pv'));
            }
        }
        $this->set(compact('typesPv'));
        $this->set('_serialize', ['typesPv']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Pv id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesPv = $this->TypesPvs->get($id);
        if ($this->TypesPvs->delete($typesPv)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Pv'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Pv'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
