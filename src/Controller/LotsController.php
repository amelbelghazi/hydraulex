<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lots Controller
 *
 * @property \App\Model\Table\LotsTable $Lots
 *
 * @method \App\Model\Entity\Lot[] paginate($object = null, array $settings = [])
 */
class LotsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Devis']
        ];
        $lots = $this->paginate($this->Lots);

        $this->set(compact('lots'));
        $this->set('_serialize', ['lots']);
    }

    /**
     * View method
     *
     * @param string|null $id Lot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lot = $this->Lots->get($id, [
            'contain' => ['Devis', 'Parties']
        ]);

        $this->set('lot', $lot);
        $this->set('_serialize', ['lot']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lot = $this->Lots->newEntity();
        if ($this->request->is('post')) {
            $lot = $this->Lots->patchEntity($lot, $this->request->data);
            if ($this->Lots->save($lot)) {
                $this->Flash->success(__('The {0} has been saved.', 'Lot'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Lot'));
            }
        }
        $devis = $this->Lots->Devis->find('list', ['limit' => 200]);
        $this->set(compact('lot', 'devis'));
        $this->set('_serialize', ['lot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lot id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lot = $this->Lots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lot = $this->Lots->patchEntity($lot, $this->request->data);
            if ($this->Lots->save($lot)) {
                $this->Flash->success(__('The {0} has been saved.', 'Lot'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Lot'));
            }
        }
        $devis = $this->Lots->Devis->find('list', ['limit' => 200]);
        $this->set(compact('lot', 'devis'));
        $this->set('_serialize', ['lot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lot id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lot = $this->Lots->get($id);
        if ($this->Lots->delete($lot)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Lot'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Lot'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
