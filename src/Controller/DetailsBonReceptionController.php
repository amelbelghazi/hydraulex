<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetailsBonReception Controller
 *
 * @property \App\Model\Table\DetailsBonReceptionTable $DetailsBonReception
 *
 * @method \App\Model\Entity\DetailsBonReception[] paginate($object = null, array $settings = [])
 */
class DetailsBonReceptionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BonsReceptions', 'Produits']
        ];
        $detailsBonReception = $this->paginate($this->DetailsBonReception);

        $this->set(compact('detailsBonReception'));
        $this->set('_serialize', ['detailsBonReception']);
    }

    /**
     * View method
     *
     * @param string|null $id Details Bon Reception id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsBonReception = $this->DetailsBonReception->get($id, [
            'contain' => ['BonsReceptions', 'Produits']
        ]);

        $this->set('detailsBonReception', $detailsBonReception);
        $this->set('_serialize', ['detailsBonReception']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsBonReception = $this->DetailsBonReception->newEntity();
        if ($this->request->is('post')) {
            $detailsBonReception = $this->DetailsBonReception->patchEntity($detailsBonReception, $this->request->data);
            if ($this->DetailsBonReception->save($detailsBonReception)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Bon Reception'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Bon Reception'));
            }
        }
        $bonsReceptions = $this->DetailsBonReception->BonsReceptions->find('list', ['limit' => 200]);
        $produits = $this->DetailsBonReception->Produits->find('list', ['limit' => 200]);
        $this->set(compact('detailsBonReception', 'bonsReceptions', 'produits'));
        $this->set('_serialize', ['detailsBonReception']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Details Bon Reception id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsBonReception = $this->DetailsBonReception->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsBonReception = $this->DetailsBonReception->patchEntity($detailsBonReception, $this->request->data);
            if ($this->DetailsBonReception->save($detailsBonReception)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Bon Reception'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Bon Reception'));
            }
        }
        $bonsReceptions = $this->DetailsBonReception->BonsReceptions->find('list', ['limit' => 200]);
        $produits = $this->DetailsBonReception->Produits->find('list', ['limit' => 200]);
        $this->set(compact('detailsBonReception', 'bonsReceptions', 'produits'));
        $this->set('_serialize', ['detailsBonReception']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Details Bon Reception id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsBonReception = $this->DetailsBonReception->get($id);
        if ($this->DetailsBonReception->delete($detailsBonReception)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Details Bon Reception'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Details Bon Reception'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
