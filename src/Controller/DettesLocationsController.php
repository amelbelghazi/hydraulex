<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DettesLocations Controller
 *
 * @property \App\Model\Table\DettesLocationsTable $DettesLocations
 *
 * @method \App\Model\Entity\DettesLocation[] paginate($object = null, array $settings = [])
 */
class DettesLocationsController extends AppController
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
        $dettesLocations = $this->paginate($this->DettesLocations);

        $this->set(compact('dettesLocations'));
        $this->set('_serialize', ['dettesLocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Dettes Location id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dettesLocation = $this->DettesLocations->get($id, [
            'contain' => ['Locations', 'VersementsLocations']
        ]);

        $this->set('dettesLocation', $dettesLocation);
        $this->set('_serialize', ['dettesLocation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dettesLocation = $this->DettesLocations->newEntity();
        if ($this->request->is('post')) {
            $dettesLocation = $this->DettesLocations->patchEntity($dettesLocation, $this->request->data);
            if ($this->DettesLocations->save($dettesLocation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Dettes Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Dettes Location'));
            }
        }
        $locations = $this->DettesLocations->Locations->find('list', ['limit' => 200]);
        $this->set(compact('dettesLocation', 'locations'));
        $this->set('_serialize', ['dettesLocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dettes Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dettesLocation = $this->DettesLocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dettesLocation = $this->DettesLocations->patchEntity($dettesLocation, $this->request->data);
            if ($this->DettesLocations->save($dettesLocation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Dettes Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Dettes Location'));
            }
        }
        $locations = $this->DettesLocations->Locations->find('list', ['limit' => 200]);
        $this->set(compact('dettesLocation', 'locations'));
        $this->set('_serialize', ['dettesLocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dettes Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dettesLocation = $this->DettesLocations->get($id);
        if ($this->DettesLocations->delete($dettesLocation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Dettes Location'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Dettes Location'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
