<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Marques Controller
 *
 * @property \App\Model\Table\MarquesTable $Marques
 *
 * @method \App\Model\Entity\Marque[] paginate($object = null, array $settings = [])
 */
class MarquesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $marques = $this->paginate($this->Marques);

        $this->set(compact('marques'));
        $this->set('_serialize', ['marques']);
    }

    /**
     * View method
     *
     * @param string|null $id Marque id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marque = $this->Marques->get($id, [
            'contain' => ['Machines']
        ]);

        $this->set('marque', $marque);
        $this->set('_serialize', ['marque']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marque = $this->Marques->newEntity();
        if ($this->request->is('post')) {
            $marque = $this->Marques->patchEntity($marque, $this->request->data);
            if ($this->Marques->save($marque)) {
                $this->Flash->success(__('The {0} has been saved.', 'Marque'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Marque'));
            }
        }
        $this->set(compact('marque'));
        $this->set('_serialize', ['marque']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Marque id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marque = $this->Marques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marque = $this->Marques->patchEntity($marque, $this->request->data);
            if ($this->Marques->save($marque)) {
                $this->Flash->success(__('The {0} has been saved.', 'Marque'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Marque'));
            }
        }
        $this->set(compact('marque'));
        $this->set('_serialize', ['marque']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marque id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marque = $this->Marques->get($id);
        if ($this->Marques->delete($marque)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Marque'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Marque'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
