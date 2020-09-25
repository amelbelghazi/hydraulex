<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LocationsMachine Controller
 *
 * @property \App\Model\Table\LocationsMachineTable $LocationsMachine
 *
 * @method \App\Model\Entity\LocationsMachine[] paginate($object = null, array $settings = [])
 */
class LocationsMachineController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Machines', 'Locataires']
        ];
        $locationsMachine = $this->paginate($this->LocationsMachine);

        $this->set(compact('locationsMachine'));
        $this->set('_serialize', ['locationsMachine']);
    }

    /**
     * View method
     *
     * @param string|null $id Locations Machine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locationsMachine = $this->LocationsMachine->get($id, [
            'contain' => ['Machines', 'Locataires']
        ]);

        $this->set('locationsMachine', $locationsMachine);
        $this->set('_serialize', ['locationsMachine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locationsMachine = $this->LocationsMachine->newEntity();
        if ($this->request->is('post')) {
            $locationsMachine = $this->LocationsMachine->patchEntity($locationsMachine, $this->request->data);
            if ($this->LocationsMachine->save($locationsMachine)) {
                $this->Flash->success(__('The {0} has been saved.', 'Locations Machine'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Locations Machine'));
            }
        }
        $machines = $this->LocationsMachine->Machines->find('list', ['limit' => 200]);
        $locataires = $this->LocationsMachine->Locataires->find('list', ['limit' => 200]);
        $this->set(compact('locationsMachine', 'machines', 'locataires'));
        $this->set('_serialize', ['locationsMachine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Locations Machine id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locationsMachine = $this->LocationsMachine->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationsMachine = $this->LocationsMachine->patchEntity($locationsMachine, $this->request->data);
            if ($this->LocationsMachine->save($locationsMachine)) {
                $this->Flash->success(__('The {0} has been saved.', 'Locations Machine'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Locations Machine'));
            }
        }
        $machines = $this->LocationsMachine->Machines->find('list', ['limit' => 200]);
        $locataires = $this->LocationsMachine->Locataires->find('list', ['limit' => 200]);
        $this->set(compact('locationsMachine', 'machines', 'locataires'));
        $this->set('_serialize', ['locationsMachine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Locations Machine id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locationsMachine = $this->LocationsMachine->get($id);
        if ($this->LocationsMachine->delete($locationsMachine)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Locations Machine'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Locations Machine'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
