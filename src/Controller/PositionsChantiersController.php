<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PositionsChantiers Controller
 *
 * @property \App\Model\Table\PositionsChantiersTable $PositionsChantiers
 *
 * @method \App\Model\Entity\PositionsChantier[] paginate($object = null, array $settings = [])
 */
class PositionsChantiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels', 'Fonctions', 'Chantiers']
        ];
        $positionsChantiers = $this->paginate($this->PositionsChantiers);

        $this->set(compact('positionsChantiers'));
        $this->set('_serialize', ['positionsChantiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Positions Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $positionsChantier = $this->PositionsChantiers->get($id, [
            'contain' => ['Personnels', 'Fonctions', 'Chantiers']
        ]);

        $this->set('positionsChantier', $positionsChantier);
        $this->set('_serialize', ['positionsChantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $positionsChantier = $this->PositionsChantiers->newEntity();
        if ($this->request->is('post')) {
            $positionsChantier = $this->PositionsChantiers->patchEntity($positionsChantier, $this->request->data);
            if ($this->PositionsChantiers->save($positionsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Positions Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Positions Chantier'));
            }
        }
        $personnels = $this->PositionsChantiers->Personnels->find('list', ['limit' => 200]);
        $fonctions = $this->PositionsChantiers->Fonctions->find('list', ['limit' => 200]);
        $chantiers = $this->PositionsChantiers->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('positionsChantier', 'personnels', 'fonctions', 'chantiers'));
        $this->set('_serialize', ['positionsChantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Positions Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $positionsChantier = $this->PositionsChantiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $positionsChantier = $this->PositionsChantiers->patchEntity($positionsChantier, $this->request->data);
            if ($this->PositionsChantiers->save($positionsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Positions Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Positions Chantier'));
            }
        }
        $personnels = $this->PositionsChantiers->Personnels->find('list', ['limit' => 200]);
        $fonctions = $this->PositionsChantiers->Fonctions->find('list', ['limit' => 200]);
        $chantiers = $this->PositionsChantiers->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('positionsChantier', 'personnels', 'fonctions', 'chantiers'));
        $this->set('_serialize', ['positionsChantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Positions Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $positionsChantier = $this->PositionsChantiers->get($id);
        if ($this->PositionsChantiers->delete($positionsChantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Positions Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Positions Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
