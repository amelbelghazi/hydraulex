<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PositionsAdministratives Controller
 *
 * @property \App\Model\Table\PositionsAdministrativesTable $PositionsAdministratives
 *
 * @method \App\Model\Entity\PositionsAdministrative[] paginate($object = null, array $settings = [])
 */
class PositionsAdministrativesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels', 'Fonctions', 'Departements']
        ];
        $positionsAdministratives = $this->paginate($this->PositionsAdministratives);

        $this->set(compact('positionsAdministratives'));
        $this->set('_serialize', ['positionsAdministratives']);
    }

    /**
     * View method
     *
     * @param string|null $id Positions Administrative id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $positionsAdministrative = $this->PositionsAdministratives->get($id, [
            'contain' => ['Personnels', 'Fonctions', 'Departements']
        ]);

        $this->set('positionsAdministrative', $positionsAdministrative);
        $this->set('_serialize', ['positionsAdministrative']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $positionsAdministrative = $this->PositionsAdministratives->newEntity();
        if ($this->request->is('post')) {
            $positionsAdministrative = $this->PositionsAdministratives->patchEntity($positionsAdministrative, $this->request->data);
            if ($this->PositionsAdministratives->save($positionsAdministrative)) {
                $this->Flash->success(__('The {0} has been saved.', 'Positions Administrative'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Positions Administrative'));
            }
        }
        $personnels = $this->PositionsAdministratives->Personnels->find('list', ['limit' => 200]);
        $fonctions = $this->PositionsAdministratives->Fonctions->find('list', ['limit' => 200]);
        $departements = $this->PositionsAdministratives->Departements->find('list', ['limit' => 200]);
        $this->set(compact('positionsAdministrative', 'personnels', 'fonctions', 'departements'));
        $this->set('_serialize', ['positionsAdministrative']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Positions Administrative id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $positionsAdministrative = $this->PositionsAdministratives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $positionsAdministrative = $this->PositionsAdministratives->patchEntity($positionsAdministrative, $this->request->data);
            if ($this->PositionsAdministratives->save($positionsAdministrative)) {
                $this->Flash->success(__('The {0} has been saved.', 'Positions Administrative'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Positions Administrative'));
            }
        }
        $personnels = $this->PositionsAdministratives->Personnels->find('list', ['limit' => 200]);
        $fonctions = $this->PositionsAdministratives->Fonctions->find('list', ['limit' => 200]);
        $departements = $this->PositionsAdministratives->Departements->find('list', ['limit' => 200]);
        $this->set(compact('positionsAdministrative', 'personnels', 'fonctions', 'departements'));
        $this->set('_serialize', ['positionsAdministrative']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Positions Administrative id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $positionsAdministrative = $this->PositionsAdministratives->get($id);
        if ($this->PositionsAdministratives->delete($positionsAdministrative)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Positions Administrative'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Positions Administrative'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
