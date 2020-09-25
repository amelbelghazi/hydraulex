<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pannes Controller
 *
 * @property \App\Model\Table\PannesTable $Pannes
 *
 * @method \App\Model\Entity\Panne[] paginate($object = null, array $settings = [])
 */
class PannesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ressources']
        ];
        $pannes = $this->paginate($this->Pannes);

        $this->set(compact('pannes'));
        $this->set('_serialize', ['pannes']);
    }

    /**
     * View method
     *
     * @param string|null $id Panne id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $panne = $this->Pannes->get($id, [
            'contain' => ['Ressources', 'Reparations', 'ReparationsMachine']
        ]);

        $this->set('panne', $panne);
        $this->set('_serialize', ['panne']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $panne = $this->Pannes->newEntity();
        if ($this->request->is('post')) {
            $panne = $this->Pannes->patchEntity($panne, $this->request->data);
            if ($this->Pannes->save($panne)) {
                $this->Flash->success(__('The {0} has been saved.', 'Panne'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Panne'));
            }
        }
        $garages = $this->Pannes->Reparations->Garages->find('list', ['limit' => 200]); 
        $ressources = $this->Pannes->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('panne', 'ressources', 'garages'));
        $this->set('_serialize', ['panne']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Panne id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $panne = $this->Pannes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $panne = $this->Pannes->patchEntity($panne, $this->request->data);
            if ($this->Pannes->save($panne)) {
                $this->Flash->success(__('The {0} has been saved.', 'Panne'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Panne'));
            }
        }
        $ressources = $this->Pannes->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('panne', 'ressources'));
        $this->set('_serialize', ['panne']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Panne id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $panne = $this->Pannes->get($id);
        if ($this->Pannes->delete($panne)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Panne'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Panne'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
