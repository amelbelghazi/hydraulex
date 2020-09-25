<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetailsBonCommande Controller
 *
 * @property \App\Model\Table\DetailsBonCommandeTable $DetailsBonCommande
 *
 * @method \App\Model\Entity\DetailsBonCommande[] paginate($object = null, array $settings = [])
 */
class DetailsBonCommandeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['BonsCommandes', 'Unites', 'Produits']
        ];
        $detailsBonCommande = $this->paginate($this->DetailsBonCommande);

        $this->set(compact('detailsBonCommande'));
        $this->set('_serialize', ['detailsBonCommande']);
    }

    /**
     * View method
     *
     * @param string|null $id Details Bon Commande id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsBonCommande = $this->DetailsBonCommande->get($id, [
            'contain' => ['BonsCommandes', 'Unites', 'Produits']
        ]);

        $this->set('detailsBonCommande', $detailsBonCommande);
        $this->set('_serialize', ['detailsBonCommande']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsBonCommande = $this->DetailsBonCommande->newEntity();
        if ($this->request->is('post')) {
            $detailsBonCommande = $this->DetailsBonCommande->patchEntity($detailsBonCommande, $this->request->data);
            if ($this->DetailsBonCommande->save($detailsBonCommande)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Bon Commande'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Bon Commande'));
            }
        }
        $bonsCommandes = $this->DetailsBonCommande->BonsCommandes->find('list', ['limit' => 200]);
        $unites = $this->DetailsBonCommande->Unites->find('list', ['limit' => 200]);
        $produits = $this->DetailsBonCommande->Produits->find('list', ['limit' => 200]);
        $this->set(compact('detailsBonCommande', 'bonsCommandes', 'unites', 'produits'));
        $this->set('_serialize', ['detailsBonCommande']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Details Bon Commande id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsBonCommande = $this->DetailsBonCommande->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsBonCommande = $this->DetailsBonCommande->patchEntity($detailsBonCommande, $this->request->data);
            if ($this->DetailsBonCommande->save($detailsBonCommande)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Bon Commande'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Bon Commande'));
            }
        }
        $bonsCommandes = $this->DetailsBonCommande->BonsCommandes->find('list', ['limit' => 200]);
        $unites = $this->DetailsBonCommande->Unites->find('list', ['limit' => 200]);
        $produits = $this->DetailsBonCommande->Produits->find('list', ['limit' => 200]);
        $this->set(compact('detailsBonCommande', 'bonsCommandes', 'unites', 'produits'));
        $this->set('_serialize', ['detailsBonCommande']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Details Bon Commande id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsBonCommande = $this->DetailsBonCommande->get($id);
        if ($this->DetailsBonCommande->delete($detailsBonCommande)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Details Bon Commande'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Details Bon Commande'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
