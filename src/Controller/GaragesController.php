<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Garages Controller
 *
 * @property \App\Model\Table\GaragesTable $Garages
 *
 * @method \App\Model\Entity\Garage[] paginate($object = null, array $settings = [])
 */
class GaragesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $garages = $this->paginate($this->Garages);

        $this->set(compact('garages'));
        $this->set('_serialize', ['garages']);
    }

    /**
     * View method
     *
     * @param string|null $id Garage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $garage = $this->Garages->get($id, [
            'contain' => ['ReparationsMachine']
        ]);

        $this->set('garage', $garage);
        $this->set('_serialize', ['garage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $garage = $this->Garages->newEntity();
        if ($this->request->is('post')) {
            $garage = $this->Garages->patchEntity($garage, $this->request->data);
            if ($this->Garages->save($garage)) {
                $this->Flash->success(__('The {0} has been saved.', 'Garage'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Garage'));
            }
        }
        $this->set(compact('garage'));
        $this->set('_serialize', ['garage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Garage id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $garage = $this->Garages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $garage = $this->Garages->patchEntity($garage, $this->request->data);
            if ($this->Garages->save($garage)) {
                $this->Flash->success(__('The {0} has been saved.', 'Garage'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Garage'));
            }
        }
        $this->set(compact('garage'));
        $this->set('_serialize', ['garage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Garage id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $garage = $this->Garages->get($id);
        if ($this->Garages->delete($garage)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Garage'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Garage'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
