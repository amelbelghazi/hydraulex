<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AssurancesPersonnels Controller
 *
 * @property \App\Model\Table\AssurancesPersonnelsTable $AssurancesPersonnels
 *
 * @method \App\Model\Entity\AssurancesPersonnel[] paginate($object = null, array $settings = [])
 */
class AssurancesPersonnelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Assurances', 'Personnels']
        ];
        $assurancesPersonnels = $this->paginate($this->AssurancesPersonnels);

        $this->set(compact('assurancesPersonnels'));
        $this->set('_serialize', ['assurancesPersonnels']);
    }

    /**
     * View method
     *
     * @param string|null $id Assurances Personnel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assurancesPersonnel = $this->AssurancesPersonnels->get($id, [
            'contain' => ['Assurances', 'Personnels']
        ]);

        $this->set('assurancesPersonnel', $assurancesPersonnel);
        $this->set('_serialize', ['assurancesPersonnel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assurancesPersonnel = $this->AssurancesPersonnels->newEntity();
        if ($this->request->is('post')) {
            $assurancesPersonnel = $this->AssurancesPersonnels->patchEntity($assurancesPersonnel, $this->request->data);
            if ($this->AssurancesPersonnels->save($assurancesPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assurances Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assurances Personnel'));
            }
        }
        $assurances = $this->AssurancesPersonnels->Assurances->find('list', ['limit' => 200]);
        $personnels = $this->AssurancesPersonnels->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('assurancesPersonnel', 'assurances', 'personnels'));
        $this->set('_serialize', ['assurancesPersonnel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assurances Personnel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assurancesPersonnel = $this->AssurancesPersonnels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assurancesPersonnel = $this->AssurancesPersonnels->patchEntity($assurancesPersonnel, $this->request->data);
            if ($this->AssurancesPersonnels->save($assurancesPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assurances Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assurances Personnel'));
            }
        }
        $assurances = $this->AssurancesPersonnels->Assurances->find('list', ['limit' => 200]);
        $personnels = $this->AssurancesPersonnels->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('assurancesPersonnel', 'assurances', 'personnels'));
        $this->set('_serialize', ['assurancesPersonnel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assurances Personnel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assurancesPersonnel = $this->AssurancesPersonnels->get($id);
        if ($this->AssurancesPersonnels->delete($assurancesPersonnel)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Assurances Personnel'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Assurances Personnel'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
