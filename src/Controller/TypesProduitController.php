<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesProduit Controller
 *
 * @property \App\Model\Table\TypesProduitTable $TypesProduit
 *
 * @method \App\Model\Entity\TypesProduit[] paginate($object = null, array $settings = [])
 */
class TypesProduitController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypeProduits']
        ];
        $typesProduit = $this->paginate($this->TypesProduit);

        $this->set(compact('typesProduit'));
        $this->set('_serialize', ['typesProduit']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Produit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesProduit = $this->TypesProduit->get($id, [
            'contain' => ['TypeProduits']
        ]);

        $this->set('typesProduit', $typesProduit);
        $this->set('_serialize', ['typesProduit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesProduit = $this->TypesProduit->newEntity();
        if ($this->request->is('post')) {
            $typesProduit = $this->TypesProduit->patchEntity($typesProduit, $this->request->data);
            if ($this->TypesProduit->save($typesProduit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Produit'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Produit'));
            }
        }
        $typeProduits = $this->TypesProduit->TypeProduits->find('list', ['limit' => 200]);
        $this->set(compact('typesProduit', 'typeProduits'));
        $this->set('_serialize', ['typesProduit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Produit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesProduit = $this->TypesProduit->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesProduit = $this->TypesProduit->patchEntity($typesProduit, $this->request->data);
            if ($this->TypesProduit->save($typesProduit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Produit'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Produit'));
            }
        }
        $typeProduits = $this->TypesProduit->TypeProduits->find('list', ['limit' => 200]);
        $this->set(compact('typesProduit', 'typeProduits'));
        $this->set('_serialize', ['typesProduit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Produit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesProduit = $this->TypesProduit->get($id);
        if ($this->TypesProduit->delete($typesProduit)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Produit'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Produit'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
