<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ChequesLocations Controller
 *
 * @property \App\Model\Table\ChequesLocationsTable $ChequesLocations
 *
 * @method \App\Model\Entity\ChequesLocation[] paginate($object = null, array $settings = [])
 */
class ChequesLocationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $chequesLocations = $this->paginate($this->ChequesLocations);

        $this->set(compact('chequesLocations'));
        $this->set('_serialize', ['chequesLocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Cheques Location id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chequesLocation = $this->ChequesLocations->get($id, [
            'contain' => ['Locations']
        ]);

        $this->set('chequesLocation', $chequesLocation);
        $this->set('_serialize', ['chequesLocation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chequesLocation = $this->ChequesLocations->newEntity();
        if ($this->request->is('post')) {
            $chequesLocation = $this->ChequesLocations->patchEntity($chequesLocation, $this->request->data);
            if ($this->ChequesLocations->save($chequesLocation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Cheques Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Cheques Location'));
            }
        }
        $locations = $this->ChequesLocations->Locations->find('list', ['limit' => 200]);
        $this->set(compact('chequesLocation', 'locations'));
        $this->set('_serialize', ['chequesLocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cheques Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chequesLocation = $this->ChequesLocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chequesLocation = $this->ChequesLocations->patchEntity($chequesLocation, $this->request->data);
            if ($this->ChequesLocations->save($chequesLocation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Cheques Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Cheques Location'));
            }
        }
        $locations = $this->ChequesLocations->Locations->find('list', ['limit' => 200]);
        $this->set(compact('chequesLocation', 'locations'));
        $this->set('_serialize', ['chequesLocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cheques Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chequesLocation = $this->ChequesLocations->get($id);
        if ($this->ChequesLocations->delete($chequesLocation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Cheques Location'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Cheques Location'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
