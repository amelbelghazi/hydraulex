<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoriesAffaires Controller
 *
 * @property \App\Model\Table\CategoriesAffairesTable $CategoriesAffaires
 *
 * @method \App\Model\Entity\CategoriesAffaire[] paginate($object = null, array $settings = [])
 */
class CategoriesAffairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $categoriesAffaires = $this->paginate($this->CategoriesAffaires);

        $this->set(compact('categoriesAffaires'));
        $this->set('_serialize', ['categoriesAffaires']);
    }

    /**
     * View method
     *
     * @param string|null $id Categories Affaire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriesAffaire = $this->CategoriesAffaires->get($id, [
            'contain' => ['Affaires']
        ]);

        $this->set('categoriesAffaire', $categoriesAffaire);
        $this->set('_serialize', ['categoriesAffaire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriesAffaire = $this->CategoriesAffaires->newEntity();
        if ($this->request->is('post')) {
            $categoriesAffaire = $this->CategoriesAffaires->patchEntity($categoriesAffaire, $this->request->data);
            if ($this->CategoriesAffaires->save($categoriesAffaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Categories Affaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Categories Affaire'));
            }
        }
        $this->set(compact('categoriesAffaire'));
        $this->set('_serialize', ['categoriesAffaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categories Affaire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriesAffaire = $this->CategoriesAffaires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriesAffaire = $this->CategoriesAffaires->patchEntity($categoriesAffaire, $this->request->data);
            if ($this->CategoriesAffaires->save($categoriesAffaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Categories Affaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Categories Affaire'));
            }
        }
        $this->set(compact('categoriesAffaire'));
        $this->set('_serialize', ['categoriesAffaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categories Affaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriesAffaire = $this->CategoriesAffaires->get($id);
        if ($this->CategoriesAffaires->delete($categoriesAffaire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Categories Affaire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Categories Affaire'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
