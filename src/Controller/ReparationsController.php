<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reparations Controller
 *
 * @property \App\Model\Table\ReparationsTable $Reparations
 *
 * @method \App\Model\Entity\Reparation[] paginate($object = null, array $settings = [])
 */
class ReparationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pannes', 'Garages']
        ];
        $reparations = $this->paginate($this->Reparations);

        $this->set(compact('reparations'));
        $this->set('_serialize', ['reparations']);
    }

    /**
     * View method
     *
     * @param string|null $id Reparation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reparation = $this->Reparations->get($id, [
            'contain' => ['Pannes', 'Garages']
        ]);

        $this->set('reparation', $reparation);
        $this->set('_serialize', ['reparation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reparation = $this->Reparations->newEntity();
        if ($this->request->is('post')) {
            $reparation = $this->Reparations->patchEntity($reparation, $this->request->data);
            if ($this->Reparations->save($reparation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Reparation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Reparation'));
            }
        }
        $pannes = $this->Reparations->Pannes->find('list', ['limit' => 200]);
        $garages = $this->Reparations->Garages->find('list', ['limit' => 200]);
        $this->set(compact('reparation', 'pannes', 'garages'));
        $this->set('_serialize', ['reparation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reparation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reparation = $this->Reparations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reparation = $this->Reparations->patchEntity($reparation, $this->request->data);
            if ($this->Reparations->save($reparation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Reparation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Reparation'));
            }
        }
        $pannes = $this->Reparations->Pannes->find('list', ['limit' => 200]);
        $garages = $this->Reparations->Garages->find('list', ['limit' => 200]);
        $this->set(compact('reparation', 'pannes', 'garages'));
        $this->set('_serialize', ['reparation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reparation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reparation = $this->Reparations->get($id);
        if ($this->Reparations->delete($reparation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Reparation'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Reparation'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
