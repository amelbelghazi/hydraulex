<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PartiesAvenants Controller
 *
 * @property \App\Model\Table\PartiesAvenantsTable $PartiesAvenants
 *
 * @method \App\Model\Entity\PartiesAvenant[] paginate($object = null, array $settings = [])
 */
class PartiesAvenantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['LotsAvenants']
        ];
        $partiesAvenants = $this->paginate($this->PartiesAvenants);

        $this->set(compact('partiesAvenants'));
        $this->set('_serialize', ['partiesAvenants']);
    }

    /**
     * View method
     *
     * @param string|null $id Parties Avenant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $partiesAvenant = $this->PartiesAvenants->get($id, [
            'contain' => ['LotsAvenants', 'ArticlesAvenants']
        ]);

        $this->set('partiesAvenant', $partiesAvenant);
        $this->set('_serialize', ['partiesAvenant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partiesAvenant = $this->PartiesAvenants->newEntity();
        if ($this->request->is('post')) {
            $partiesAvenant = $this->PartiesAvenants->patchEntity($partiesAvenant, $this->request->data);
            if ($this->PartiesAvenants->save($partiesAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Parties Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Parties Avenant'));
            }
        }
        $lotsAvenants = $this->PartiesAvenants->LotsAvenants->find('list', ['limit' => 200]);
        $this->set(compact('partiesAvenant', 'lotsAvenants'));
        $this->set('_serialize', ['partiesAvenant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parties Avenant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partiesAvenant = $this->PartiesAvenants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partiesAvenant = $this->PartiesAvenants->patchEntity($partiesAvenant, $this->request->data);
            if ($this->PartiesAvenants->save($partiesAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Parties Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Parties Avenant'));
            }
        }
        $lotsAvenants = $this->PartiesAvenants->LotsAvenants->find('list', ['limit' => 200]);
        $this->set(compact('partiesAvenant', 'lotsAvenants'));
        $this->set('_serialize', ['partiesAvenant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parties Avenant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partiesAvenant = $this->PartiesAvenants->get($id);
        if ($this->PartiesAvenants->delete($partiesAvenant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Parties Avenant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Parties Avenant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
