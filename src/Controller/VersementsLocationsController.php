<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VersementsLocations Controller
 *
 * @property \App\Model\Table\VersementsLocationsTable $VersementsLocations
 *
 * @method \App\Model\Entity\VersementsLocation[] paginate($object = null, array $settings = [])
 */
class VersementsLocationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DettesLocations']
        ];
        $versementsLocations = $this->paginate($this->VersementsLocations);

        $this->set(compact('versementsLocations'));
        $this->set('_serialize', ['versementsLocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Versements Location id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $versementsLocation = $this->VersementsLocations->get($id, [
            'contain' => ['DettesLocations']
        ]);

        $this->set('versementsLocation', $versementsLocation);
        $this->set('_serialize', ['versementsLocation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $versementsLocation = $this->VersementsLocations->newEntity();
        if ($this->request->is('post')) {
            $versementsLocation = $this->VersementsLocations->patchEntity($versementsLocation, $this->request->data);
            if ($this->VersementsLocations->save($versementsLocation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Versements Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Versements Location'));
            }
        }
        $dettesLocations = $this->VersementsLocations->DettesLocations->find('list', ['limit' => 200]);
        $this->set(compact('versementsLocation', 'dettesLocations'));
        $this->set('_serialize', ['versementsLocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Versements Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $versementsLocation = $this->VersementsLocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $versementsLocation = $this->VersementsLocations->patchEntity($versementsLocation, $this->request->data);
            if ($this->VersementsLocations->save($versementsLocation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Versements Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Versements Location'));
            }
        }
        $dettesLocations = $this->VersementsLocations->DettesLocations->find('list', ['limit' => 200]);
        $this->set(compact('versementsLocation', 'dettesLocations'));
        $this->set('_serialize', ['versementsLocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Versements Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $versementsLocation = $this->VersementsLocations->get($id);
        if ($this->VersementsLocations->delete($versementsLocation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Versements Location'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Versements Location'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
