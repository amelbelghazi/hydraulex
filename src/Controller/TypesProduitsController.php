<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesProduits Controller
 *
 * @property \App\Model\Table\TypesProduitsTable $TypesProduits
 *
 * @method \App\Model\Entity\TypesProduit[] paginate($object = null, array $settings = [])
 */
class TypesProduitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesProduits = $this->paginate($this->TypesProduits);

        $this->set(compact('typesProduits'));
        $this->set('_serialize', ['typesProduits']);
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
        $typesProduit = $this->TypesProduits->get($id, [
            'contain' => ['TypesProduits', 'Produits']
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
        $typesProduit = $this->TypesProduits->newEntity();
        if ($this->request->is('post')) {
            $typesProduit = $this->TypesProduits->patchEntity($typesProduit, $this->request->data);
            if ($this->TypesProduits->save($typesProduit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Produit'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Produit'));
            }
        }
        $this->set(compact('typesProduit'));
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
        $typesProduit = $this->TypesProduits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesProduit = $this->TypesProduits->patchEntity($typesProduit, $this->request->data);
            if ($this->TypesProduits->save($typesProduit)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Produit'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Produit'));
            }
        }
        $this->set(compact('typesProduit'));
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
        $typesProduit = $this->TypesProduits->get($id);
        if ($this->TypesProduits->delete($typesProduit)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Produit'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Produit'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
