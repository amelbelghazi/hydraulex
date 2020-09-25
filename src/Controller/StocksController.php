<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stocks Controller
 *
 * @property \App\Model\Table\StocksTable $Stocks
 *
 * @method \App\Model\Entity\Stock[] paginate($object = null, array $settings = [])
 */
class StocksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Depots', 'AchatsDetails', 'Produits']
        ];
        $stocks = $this->paginate($this->Stocks);

        $this->set(compact('stocks'));
        $this->set('_serialize', ['stocks']);
    }

    /**
     * View method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => ['Depots', 'AchatsDetails', 'Produits', 'Fournitures', 'Ressources']
        ]);

        $this->set('stock', $stock);
        $this->set('_serialize', ['stock']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stock = $this->Stocks->newEntity();
        if ($this->request->is('post')) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->data);
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stock'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stock'));
            }
        }
        $depots = $this->Stocks->Depots->find('list', ['limit' => 200]);
        $achatsDetails = $this->Stocks->AchatsDetails->find('list', ['limit' => 200]);
        $produits = $this->Stocks->Produits->find('list', ['limit' => 200]);
        $this->set(compact('stock', 'depots', 'achatsDetails', 'produits'));
        $this->set('_serialize', ['stock']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->data);
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stock'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stock'));
            }
        }
        $depots = $this->Stocks->Depots->find('list', ['limit' => 200]);
        $achatsDetails = $this->Stocks->AchatsDetails->find('list', ['limit' => 200]);
        $produits = $this->Stocks->Produits->find('list', ['limit' => 200]);
        $this->set(compact('stock', 'depots', 'achatsDetails', 'produits'));
        $this->set('_serialize', ['stock']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stock = $this->Stocks->get($id);
        if ($this->Stocks->delete($stock)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Stock'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Stock'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
