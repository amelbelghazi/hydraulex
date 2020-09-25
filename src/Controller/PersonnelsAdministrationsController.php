<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PersonnelsAdministrations Controller
 *
 * @property \App\Model\Table\PersonnelsAdministrationsTable $PersonnelsAdministrations
 *
 * @method \App\Model\Entity\PersonnelsAdministration[] paginate($object = null, array $settings = [])
 */
class PersonnelsAdministrationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels']
        ];
        $personnelsAdministrations = $this->paginate($this->PersonnelsAdministrations);

        $this->set(compact('personnelsAdministrations'));
        $this->set('_serialize', ['personnelsAdministrations']);
    }

    /**
     * View method
     *
     * @param string|null $id Personnels Administration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personnelsAdministration = $this->PersonnelsAdministrations->get($id, [
            'contain' => ['Personnels']
        ]);

        $this->set('personnelsAdministration', $personnelsAdministration);
        $this->set('_serialize', ['personnelsAdministration']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personnelsAdministration = $this->PersonnelsAdministrations->newEntity();
        if ($this->request->is('post')) {
            $personnelsAdministration = $this->PersonnelsAdministrations->patchEntity($personnelsAdministration, $this->request->data);
            if ($this->PersonnelsAdministrations->save($personnelsAdministration)) {
                $this->Flash->success(__('The {0} has been saved.', 'Personnels Administration'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personnels Administration'));
            }
        }
        $personnels = $this->PersonnelsAdministrations->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('personnelsAdministration', 'personnels'));
        $this->set('_serialize', ['personnelsAdministration']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Personnels Administration id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personnelsAdministration = $this->PersonnelsAdministrations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personnelsAdministration = $this->PersonnelsAdministrations->patchEntity($personnelsAdministration, $this->request->data);
            if ($this->PersonnelsAdministrations->save($personnelsAdministration)) {
                $this->Flash->success(__('The {0} has been saved.', 'Personnels Administration'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personnels Administration'));
            }
        }
        $personnels = $this->PersonnelsAdministrations->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('personnelsAdministration', 'personnels'));
        $this->set('_serialize', ['personnelsAdministration']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Personnels Administration id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personnelsAdministration = $this->PersonnelsAdministrations->get($id);
        if ($this->PersonnelsAdministrations->delete($personnelsAdministration)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Personnels Administration'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Personnels Administration'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
