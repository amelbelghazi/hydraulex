<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EquipesPersonnel Controller
 *
 * @property \App\Model\Table\EquipesPersonnelTable $EquipesPersonnel
 *
 * @method \App\Model\Entity\EquipesPersonnel[] paginate($object = null, array $settings = [])
 */
class EquipesPersonnelController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels', 'Equipes']
        ];
        $equipesPersonnel = $this->paginate($this->EquipesPersonnel);

        $this->set(compact('equipesPersonnel'));
        $this->set('_serialize', ['equipesPersonnel']);
    }

    /**
     * View method
     *
     * @param string|null $id Equipes Personnel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipesPersonnel = $this->EquipesPersonnel->get($id, [
            'contain' => ['Personnels', 'Equipes']
        ]);

        $this->set('equipesPersonnel', $equipesPersonnel);
        $this->set('_serialize', ['equipesPersonnel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipesPersonnel = $this->EquipesPersonnel->newEntity();
        if ($this->request->is('post')) {
            $equipesPersonnel = $this->EquipesPersonnel->patchEntity($equipesPersonnel, $this->request->data);
            if ($this->EquipesPersonnel->save($equipesPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Equipes Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Equipes Personnel'));
            }
        }
        $personnels = $this->EquipesPersonnel->Personnels->find('list', ['limit' => 200]);
        $equipes = $this->EquipesPersonnel->Equipes->find('list', ['limit' => 200]);
        $this->set(compact('equipesPersonnel', 'personnels', 'equipes'));
        $this->set('_serialize', ['equipesPersonnel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipes Personnel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipesPersonnel = $this->EquipesPersonnel->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipesPersonnel = $this->EquipesPersonnel->patchEntity($equipesPersonnel, $this->request->data);
            if ($this->EquipesPersonnel->save($equipesPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Equipes Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Equipes Personnel'));
            }
        }
        $personnels = $this->EquipesPersonnel->Personnels->find('list', ['limit' => 200]);
        $equipes = $this->EquipesPersonnel->Equipes->find('list', ['limit' => 200]);
        $this->set(compact('equipesPersonnel', 'personnels', 'equipes'));
        $this->set('_serialize', ['equipesPersonnel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipes Personnel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipesPersonnel = $this->EquipesPersonnel->get($id);
        if ($this->EquipesPersonnel->delete($equipesPersonnel)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Equipes Personnel'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Equipes Personnel'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
