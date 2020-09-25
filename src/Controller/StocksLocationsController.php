<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StocksLocations Controller
 *
 * @property \App\Model\Table\StocksLocationsTable $StocksLocations
 *
 * @method \App\Model\Entity\StocksLocation[] paginate($object = null, array $settings = [])
 */
class StocksLocationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Depots', 'Produits', 'Stocks', 'Locations']
        ];
        $stocksLocations = $this->paginate($this->StocksLocations);

        $this->set(compact('stocksLocations'));
        $this->set('_serialize', ['stocksLocations']);
    }

    /**
     * View method
     *
     * @param string|null $id Stocks Location id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stocksLocation = $this->StocksLocations->get($id, [
            'contain' => ['Depots', 'Produits', 'Stocks', 'Locations', 'LocationsDetails']
        ]);

        $this->set('stocksLocation', $stocksLocation);
        $this->set('_serialize', ['stocksLocation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stocksLocation = $this->StocksLocations->newEntity();
        if ($this->request->is('post')) {
            $stocksLocation = $this->StocksLocations->patchEntity($stocksLocation, $this->request->data);
            if ($this->StocksLocations->save($stocksLocation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stocks Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stocks Location'));
            }
        }
        $depots = $this->StocksLocations->Depots->find('list', ['limit' => 200]);
        $produits = $this->StocksLocations->Produits->find('list', ['limit' => 200]);
        $stocks = $this->StocksLocations->Stocks->find('list', ['limit' => 200]);
        $locations = $this->StocksLocations->Locations->find('list', ['limit' => 200]);
        $this->set(compact('stocksLocation', 'depots', 'produits', 'stocks', 'locations'));
        $this->set('_serialize', ['stocksLocation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stocks Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stocksLocation = $this->StocksLocations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stocksLocation = $this->StocksLocations->patchEntity($stocksLocation, $this->request->data);
            if ($this->StocksLocations->save($stocksLocation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stocks Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stocks Location'));
            }
        }
        $depots = $this->StocksLocations->Depots->find('list', ['limit' => 200]);
        $produits = $this->StocksLocations->Produits->find('list', ['limit' => 200]);
        $stocks = $this->StocksLocations->Stocks->find('list', ['limit' => 200]);
        $locations = $this->StocksLocations->Locations->find('list', ['limit' => 200]);
        $this->set(compact('stocksLocation', 'depots', 'produits', 'stocks', 'locations'));
        $this->set('_serialize', ['stocksLocation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stocks Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stocksLocation = $this->StocksLocations->get($id);
        if ($this->StocksLocations->delete($stocksLocation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Stocks Location'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Stocks Location'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
