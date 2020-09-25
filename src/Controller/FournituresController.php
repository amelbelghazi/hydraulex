<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fournitures Controller
 *
 * @property \App\Model\Table\FournituresTable $Fournitures
 *
 * @method \App\Model\Entity\Fourniture[] paginate($object = null, array $settings = [])
 */
class FournituresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departements', 'Stocks']
        ];
        $fournitures = $this->paginate($this->Fournitures);

        $this->set(compact('fournitures'));
        $this->set('_serialize', ['fournitures']);
    }

    /**
     * View method
     *
     * @param string|null $id Fourniture id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fourniture = $this->Fournitures->get($id, [
            'contain' => ['Departements', 'Stocks']
        ]);

        $this->set('fourniture', $fourniture);
        $this->set('_serialize', ['fourniture']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fourniture = $this->Fournitures->newEntity();
        if ($this->request->is('post')) {
            $fourniture = $this->Fournitures->patchEntity($fourniture, $this->request->data);
            if ($this->Fournitures->save($fourniture)) {
                $this->Flash->success(__('The {0} has been saved.', 'Fourniture'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fourniture'));
            }
        }
        $departements = $this->Fournitures->Departements->find('list', ['limit' => 200]);
        $stocks = $this->Fournitures->Stocks->find('list', ['limit' => 200]);
        $this->set(compact('fourniture', 'departements', 'stocks'));
        $this->set('_serialize', ['fourniture']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fourniture id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fourniture = $this->Fournitures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fourniture = $this->Fournitures->patchEntity($fourniture, $this->request->data);
            if ($this->Fournitures->save($fourniture)) {
                $this->Flash->success(__('The {0} has been saved.', 'Fourniture'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fourniture'));
            }
        }
        $departements = $this->Fournitures->Departements->find('list', ['limit' => 200]);
        $stocks = $this->Fournitures->Stocks->find('list', ['limit' => 200]);
        $this->set(compact('fourniture', 'departements', 'stocks'));
        $this->set('_serialize', ['fourniture']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fourniture id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fourniture = $this->Fournitures->get($id);
        if ($this->Fournitures->delete($fourniture)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Fourniture'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Fourniture'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
