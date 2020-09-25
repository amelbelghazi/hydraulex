<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parties Controller
 *
 * @property \App\Model\Table\PartiesTable $Parties
 *
 * @method \App\Model\Entity\Party[] paginate($object = null, array $settings = [])
 */
class PartiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lots']
        ];
        $parties = $this->paginate($this->Parties);

        $this->set(compact('parties'));
        $this->set('_serialize', ['parties']);
    }

    /**
     * View method
     *
     * @param string|null $id Party id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $party = $this->Parties->get($id, [
            'contain' => ['Lots']
        ]);

        $this->set('party', $party);
        $this->set('_serialize', ['party']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $party = $this->Parties->newEntity();
        if ($this->request->is('post')) {
            $party = $this->Parties->patchEntity($party, $this->request->data);
            if ($this->Parties->save($party)) {
                $this->Flash->success(__('The {0} has been saved.', 'Party'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Party'));
            }
        }
        $lots = $this->Parties->Lots->find('list', ['limit' => 200]);
        $this->set(compact('party', 'lots'));
        $this->set('_serialize', ['party']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Party id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $party = $this->Parties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $party = $this->Parties->patchEntity($party, $this->request->data);
            if ($this->Parties->save($party)) {
                $this->Flash->success(__('The {0} has been saved.', 'Party'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Party'));
            }
        }
        $lots = $this->Parties->Lots->find('list', ['limit' => 200]);
        $this->set(compact('party', 'lots'));
        $this->set('_serialize', ['party']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Party id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $party = $this->Parties->get($id);
        if ($this->Parties->delete($party)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Party'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Party'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
