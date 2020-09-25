<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesPersonnels Controller
 *
 * @property \App\Model\Table\TypesPersonnelsTable $TypesPersonnels
 *
 * @method \App\Model\Entity\TypesPersonnel[] paginate($object = null, array $settings = [])
 */
class TypesPersonnelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesPersonnels = $this->paginate($this->TypesPersonnels);

        $this->set(compact('typesPersonnels'));
        $this->set('_serialize', ['typesPersonnels']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Personnel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesPersonnel = $this->TypesPersonnels->get($id, [
            'contain' => ['Personnels']
        ]);

        $this->set('typesPersonnel', $typesPersonnel);
        $this->set('_serialize', ['typesPersonnel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesPersonnel = $this->TypesPersonnels->newEntity();
        if ($this->request->is('post')) {
            $typesPersonnel = $this->TypesPersonnels->patchEntity($typesPersonnel, $this->request->data);
            if ($this->TypesPersonnels->save($typesPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Personnel'));
            }
        }
        $this->set(compact('typesPersonnel'));
        $this->set('_serialize', ['typesPersonnel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Personnel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesPersonnel = $this->TypesPersonnels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesPersonnel = $this->TypesPersonnels->patchEntity($typesPersonnel, $this->request->data);
            if ($this->TypesPersonnels->save($typesPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Personnel'));
            }
        }
        $this->set(compact('typesPersonnel'));
        $this->set('_serialize', ['typesPersonnel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Personnel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesPersonnel = $this->TypesPersonnels->get($id);
        if ($this->TypesPersonnels->delete($typesPersonnel)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Personnel'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Personnel'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
