<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wilayas Controller
 *
 * @property \App\Model\Table\WilayasTable $Wilayas
 *
 * @method \App\Model\Entity\Wilaya[] paginate($object = null, array $settings = [])
 */
class WilayasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $wilayas = $this->paginate($this->Wilayas);

        $this->set(compact('wilayas'));
        $this->set('_serialize', ['wilayas']);
    }

    /**
     * View method
     *
     * @param string|null $id Wilaya id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wilaya = $this->Wilayas->get($id, [
            'contain' => ['Affaires']
        ]);

        $this->set('wilaya', $wilaya);
        $this->set('_serialize', ['wilaya']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wilaya = $this->Wilayas->newEntity();
        if ($this->request->is('post')) {
            $wilaya = $this->Wilayas->patchEntity($wilaya, $this->request->data);
            if ($this->Wilayas->save($wilaya)) {
                $this->Flash->success(__('The {0} has been saved.', 'Wilaya'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Wilaya'));
            }
        }
        $this->set(compact('wilaya'));
        $this->set('_serialize', ['wilaya']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Wilaya id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wilaya = $this->Wilayas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wilaya = $this->Wilayas->patchEntity($wilaya, $this->request->data);
            if ($this->Wilayas->save($wilaya)) {
                $this->Flash->success(__('The {0} has been saved.', 'Wilaya'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Wilaya'));
            }
        }
        $this->set(compact('wilaya'));
        $this->set('_serialize', ['wilaya']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Wilaya id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wilaya = $this->Wilayas->get($id);
        if ($this->Wilayas->delete($wilaya)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Wilaya'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Wilaya'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
