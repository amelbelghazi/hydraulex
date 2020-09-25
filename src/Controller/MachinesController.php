<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Machines Controller
 *
 * @property \App\Model\Table\MachinesTable $Machines
 *
 * @method \App\Model\Entity\Machine[] paginate($object = null, array $settings = [])
 */
class MachinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Proprietaires', 'Ressources', 'Marques']
        ];
        $machines = $this->paginate($this->Machines);

        $this->set(compact('machines'));
        $this->set('_serialize', ['machines']);
    }

    /**
     * View method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => ['Proprietaires', 'Ressources', 'Marques', 'EntretiensMachine', 'LocationsMachine', 'Pannes', 'PiecesMachine']
        ]);

        $this->set('machine', $machine);
        $this->set('_serialize', ['machine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $machine = $this->Machines->newEntity();
        if ($this->request->is('post')) {
            $machine = $this->Machines->patchEntity($machine, $this->request->data);
            if ($this->Machines->save($machine)) {
                $this->Flash->success(__('The {0} has been saved.', 'Machine'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Machine'));
            }
        }
        $proprietaires = $this->Machines->Proprietaires->find('list', ['limit' => 200]);
        $ressources = $this->Machines->Ressources->find('list', ['limit' => 200]);
        $marques = $this->Machines->Marques->find('list', ['limit' => 200]);
        $this->set(compact('machine', 'proprietaires', 'ressources', 'marques'));
        $this->set('_serialize', ['machine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machine = $this->Machines->patchEntity($machine, $this->request->data);
            if ($this->Machines->save($machine)) {
                $this->Flash->success(__('The {0} has been saved.', 'Machine'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Machine'));
            }
        }
        $proprietaires = $this->Machines->Proprietaires->find('list', ['limit' => 200]);
        $ressources = $this->Machines->Ressources->find('list', ['limit' => 200]);
        $marques = $this->Machines->Marques->find('list', ['limit' => 200]);
        $this->set(compact('machine', 'proprietaires', 'ressources', 'marques'));
        $this->set('_serialize', ['machine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machine = $this->Machines->get($id);
        if ($this->Machines->delete($machine)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Machine'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Machine'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
