<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cheques Controller
 *
 * @property \App\Model\Table\ChequesTable $Cheques
 *
 * @method \App\Model\Entity\Cheque[] paginate($object = null, array $settings = [])
 */
class ChequesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Achats']
        ];
        $cheques = $this->paginate($this->Cheques);

        $this->set(compact('cheques'));
        $this->set('_serialize', ['cheques']);
    }

    /**
     * View method
     *
     * @param string|null $id Cheque id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cheque = $this->Cheques->get($id, [
            'contain' => ['Achats']
        ]);

        $this->set('cheque', $cheque);
        $this->set('_serialize', ['cheque']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cheque = $this->Cheques->newEntity();
        if ($this->request->is('post')) {
            $cheque = $this->Cheques->patchEntity($cheque, $this->request->data);
            if ($this->Cheques->save($cheque)) {
                $this->Flash->success(__('The {0} has been saved.', 'Cheque'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Cheque'));
            }
        }
        $achats = $this->Cheques->Achats->find('list', ['limit' => 200]);
        $this->set(compact('cheque', 'achats'));
        $this->set('_serialize', ['cheque']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cheque id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cheque = $this->Cheques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cheque = $this->Cheques->patchEntity($cheque, $this->request->data);
            if ($this->Cheques->save($cheque)) {
                $this->Flash->success(__('The {0} has been saved.', 'Cheque'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Cheque'));
            }
        }
        $achats = $this->Cheques->Achats->find('list', ['limit' => 200]);
        $this->set(compact('cheque', 'achats'));
        $this->set('_serialize', ['cheque']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cheque id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cheque = $this->Cheques->get($id);
        if ($this->Cheques->delete($cheque)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Cheque'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Cheque'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
