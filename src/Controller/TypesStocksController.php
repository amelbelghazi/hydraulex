<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesStocks Controller
 *
 * @property \App\Model\Table\TypesStocksTable $TypesStocks
 *
 * @method \App\Model\Entity\TypesStock[] paginate($object = null, array $settings = [])
 */
class TypesStocksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesStocks = $this->paginate($this->TypesStocks);

        $this->set(compact('typesStocks'));
        $this->set('_serialize', ['typesStocks']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Stock id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesStock = $this->TypesStocks->get($id, [
            'contain' => ['Stocks']
        ]);

        $this->set('typesStock', $typesStock);
        $this->set('_serialize', ['typesStock']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesStock = $this->TypesStocks->newEntity();
        if ($this->request->is('post')) {
            $typesStock = $this->TypesStocks->patchEntity($typesStock, $this->request->data);
            if ($this->TypesStocks->save($typesStock)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Stock'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Stock'));
            }
        }
        $this->set(compact('typesStock'));
        $this->set('_serialize', ['typesStock']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Stock id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesStock = $this->TypesStocks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesStock = $this->TypesStocks->patchEntity($typesStock, $this->request->data);
            if ($this->TypesStocks->save($typesStock)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Stock'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Stock'));
            }
        }
        $this->set(compact('typesStock'));
        $this->set('_serialize', ['typesStock']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Stock id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesStock = $this->TypesStocks->get($id);
        if ($this->TypesStocks->delete($typesStock)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Stock'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Stock'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
