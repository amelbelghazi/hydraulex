<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoriesMachine Controller
 *
 * @property \App\Model\Table\CategoriesMachineTable $CategoriesMachine
 *
 * @method \App\Model\Entity\CategoriesMachine[] paginate($object = null, array $settings = [])
 */
class CategoriesMachineController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $categoriesMachine = $this->paginate($this->CategoriesMachine);

        $this->set(compact('categoriesMachine'));
        $this->set('_serialize', ['categoriesMachine']);
    }

    /**
     * View method
     *
     * @param string|null $id Categories Machine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriesMachine = $this->CategoriesMachine->get($id, [
            'contain' => []
        ]);

        $this->set('categoriesMachine', $categoriesMachine);
        $this->set('_serialize', ['categoriesMachine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriesMachine = $this->CategoriesMachine->newEntity();
        if ($this->request->is('post')) {
            $categoriesMachine = $this->CategoriesMachine->patchEntity($categoriesMachine, $this->request->data);
            if ($this->CategoriesMachine->save($categoriesMachine)) {
                $this->Flash->success(__('The {0} has been saved.', 'Categories Machine'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Categories Machine'));
            }
        }
        $this->set(compact('categoriesMachine'));
        $this->set('_serialize', ['categoriesMachine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categories Machine id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriesMachine = $this->CategoriesMachine->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriesMachine = $this->CategoriesMachine->patchEntity($categoriesMachine, $this->request->data);
            if ($this->CategoriesMachine->save($categoriesMachine)) {
                $this->Flash->success(__('The {0} has been saved.', 'Categories Machine'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Categories Machine'));
            }
        }
        $this->set(compact('categoriesMachine'));
        $this->set('_serialize', ['categoriesMachine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categories Machine id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriesMachine = $this->CategoriesMachine->get($id);
        if ($this->CategoriesMachine->delete($categoriesMachine)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Categories Machine'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Categories Machine'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
