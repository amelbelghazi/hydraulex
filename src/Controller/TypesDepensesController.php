<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesDepenses Controller
 *
 * @property \App\Model\Table\TypesDepensesTable $TypesDepenses
 *
 * @method \App\Model\Entity\TypesDepense[] paginate($object = null, array $settings = [])
 */
class TypesDepensesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesDepenses = $this->paginate($this->TypesDepenses);

        $this->set(compact('typesDepenses'));
        $this->set('_serialize', ['typesDepenses']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Depense id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesDepense = $this->TypesDepenses->get($id, [
            'contain' => ['Depenses']
        ]);

        $this->set('typesDepense', $typesDepense);
        $this->set('_serialize', ['typesDepense']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesDepense = $this->TypesDepenses->newEntity();
        if ($this->request->is('post')) {
            $typesDepense = $this->TypesDepenses->patchEntity($typesDepense, $this->request->data);
            if ($this->TypesDepenses->save($typesDepense)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Depense'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Depense'));
            }
        }
        $this->set(compact('typesDepense'));
        $this->set('_serialize', ['typesDepense']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Depense id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesDepense = $this->TypesDepenses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesDepense = $this->TypesDepenses->patchEntity($typesDepense, $this->request->data);
            if ($this->TypesDepenses->save($typesDepense)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Depense'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Depense'));
            }
        }
        $this->set(compact('typesDepense'));
        $this->set('_serialize', ['typesDepense']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Depense id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesDepense = $this->TypesDepenses->get($id);
        if ($this->TypesDepenses->delete($typesDepense)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Depense'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Depense'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
