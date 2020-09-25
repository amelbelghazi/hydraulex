<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StocksRessources Controller
 *
 * @property \App\Model\Table\StocksRessourcesTable $StocksRessources
 *
 * @method \App\Model\Entity\StocksRessource[] paginate($object = null, array $settings = [])
 */
class StocksRessourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stocks', 'Ressources']
        ];
        $stocksRessources = $this->paginate($this->StocksRessources);

        $this->set(compact('stocksRessources'));
        $this->set('_serialize', ['stocksRessources']);
    }

    /**
     * View method
     *
     * @param string|null $id Stocks Ressource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stocksRessource = $this->StocksRessources->get($id, [
            'contain' => ['Stocks', 'Ressources']
        ]);

        $this->set('stocksRessource', $stocksRessource);
        $this->set('_serialize', ['stocksRessource']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stocksRessource = $this->StocksRessources->newEntity();
        if ($this->request->is('post')) {
            $stocksRessource = $this->StocksRessources->patchEntity($stocksRessource, $this->request->data);
            if ($this->StocksRessources->save($stocksRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stocks Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stocks Ressource'));
            }
        }
        $stocks = $this->StocksRessources->Stocks->find('list', ['limit' => 200]);
        $ressources = $this->StocksRessources->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('stocksRessource', 'stocks', 'ressources'));
        $this->set('_serialize', ['stocksRessource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stocks Ressource id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stocksRessource = $this->StocksRessources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stocksRessource = $this->StocksRessources->patchEntity($stocksRessource, $this->request->data);
            if ($this->StocksRessources->save($stocksRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Stocks Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Stocks Ressource'));
            }
        }
        $stocks = $this->StocksRessources->Stocks->find('list', ['limit' => 200]);
        $ressources = $this->StocksRessources->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('stocksRessource', 'stocks', 'ressources'));
        $this->set('_serialize', ['stocksRessource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stocks Ressource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stocksRessource = $this->StocksRessources->get($id);
        if ($this->StocksRessources->delete($stocksRessource)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Stocks Ressource'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Stocks Ressource'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
