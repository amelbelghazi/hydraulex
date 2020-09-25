<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EtatsCommissions Controller
 *
 * @property \App\Model\Table\EtatsCommissionsTable $EtatsCommissions
 *
 * @method \App\Model\Entity\EtatsCommission[] paginate($object = null, array $settings = [])
 */
class EtatsCommissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Commissions', 'Etats']
        ];
        $etatsCommissions = $this->paginate($this->EtatsCommissions);

        $this->set(compact('etatsCommissions'));
        $this->set('_serialize', ['etatsCommissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Etats Commission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etatsCommission = $this->EtatsCommissions->get($id, [
            'contain' => ['Commissions', 'Etats']
        ]);

        $this->set('etatsCommission', $etatsCommission);
        $this->set('_serialize', ['etatsCommission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etatsCommission = $this->EtatsCommissions->newEntity();
        if ($this->request->is('post')) {
            $etatsCommission = $this->EtatsCommissions->patchEntity($etatsCommission, $this->request->data);
            if ($this->EtatsCommissions->save($etatsCommission)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Commission'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Commission'));
            }
        }
        $commissions = $this->EtatsCommissions->Commissions->find('list', ['limit' => 200]);
        $etats = $this->EtatsCommissions->Etats->find('list', ['limit' => 200]);
        $this->set(compact('etatsCommission', 'commissions', 'etats'));
        $this->set('_serialize', ['etatsCommission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etats Commission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etatsCommission = $this->EtatsCommissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etatsCommission = $this->EtatsCommissions->patchEntity($etatsCommission, $this->request->data);
            if ($this->EtatsCommissions->save($etatsCommission)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Commission'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Commission'));
            }
        }
        $commissions = $this->EtatsCommissions->Commissions->find('list', ['limit' => 200]);
        $etats = $this->EtatsCommissions->Etats->find('list', ['limit' => 200]);
        $this->set(compact('etatsCommission', 'commissions', 'etats'));
        $this->set('_serialize', ['etatsCommission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etats Commission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etatsCommission = $this->EtatsCommissions->get($id);
        if ($this->EtatsCommissions->delete($etatsCommission)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Etats Commission'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Etats Commission'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
