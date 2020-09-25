<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Positions Controller
 *
 * @property \App\Model\Table\PositionsTable $Positions
 *
 * @method \App\Model\Entity\Position[] paginate($object = null, array $settings = [])
 */
class PositionsController extends AppController
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
        $positions = $this->paginate($this->Positions);

        $this->set(compact('positions'));
        $this->set('_serialize', ['positions']);
    }

    /**
     * View method
     *
     * @param string|null $id Position id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $position = $this->Positions->get($id, [
            'contain' => ['Personnels', 'Chantiers', 'PositionsAdministratives']
        ]);

        $this->set('position', $position);
        $this->set('_serialize', ['position']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $position = $this->Positions->newEntity();
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The {0} has been saved.', 'Position'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Position'));
            }
        }
        $personnels = $this->Positions->Personnels->find('list', ['limit' => 200]);
        $chantiers = $this->Positions->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('position', 'personnels', 'chantiers'));
        $this->set('_serialize', ['position']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $position = $this->Positions->get($id, [
            'contain' => ['Chantiers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $position = $this->Positions->patchEntity($position, $this->request->data);
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The {0} has been saved.', 'Position'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Position'));
            }
        }
        $personnels = $this->Positions->Personnels->find('list', ['limit' => 200]);
        $chantiers = $this->Positions->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('position', 'personnels', 'chantiers'));
        $this->set('_serialize', ['position']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Position id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $position = $this->Positions->get($id);
        if ($this->Positions->delete($position)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Position'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Position'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
