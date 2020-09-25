<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Produits Controller
 *
 * @property \App\Model\Table\ProduitsTable $Produits
 *
 * @method \App\Model\Entity\Produit[] paginate($object = null, array $settings = [])
 */
class ProduitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if($this->request->data){
            
            $rech = $this->request->data['search'];
            $produits = $this->Produits->find()->select()->where('Produits.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
              
        }else{
            $produits=$this->Produits; 
        }
        $this->paginate = [
            'contain' => ['Unites', 'TypesProduits', 'Stocks']
        ];
        $produits = $this->paginate($produits);

        $this->set(compact('produits'));
        $this->set('_serialize', ['produits']);
    }

    /**
     * View method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produit = $this->Produits->get($id, [
            'contain' => ['Unites', 'TypesProduits', 'DetailsBonCommande', 'DetailsBonReception', 'Stocks']
        ]);

        $this->set('produit', $produit);
        $this->set('_serialize', ['produit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produit = $this->Produits->newEntity();
        if ($this->request->is('post')) {
            $produit = $this->Produits->patchEntity($produit, $this->request->data);
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Produit'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Produit'));
            }
        }
        $unites = $this->Produits->Unites->find('list', ['limit' => 200]);
        $typesProduits = $this->Produits->TypesProduits->find('list', ['limit' => 200]);
        $this->set(compact('produit', 'unites', 'typesProduits'));
        $this->set('_serialize', ['produit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produit = $this->Produits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produit = $this->Produits->patchEntity($produit, $this->request->data);
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Produit'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Produit'));
            }
        }
        $unites = $this->Produits->Unites->find('list', ['limit' => 200]);
        $typesProduits = $this->Produits->TypesProduits->find('list', ['limit' => 200]);
        $this->set(compact('produit', 'unites', 'typesProduits'));
        $this->set('_serialize', ['produit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produit = $this->Produits->get($id);
        if ($this->Produits->delete($produit)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Produit'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Produit'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
