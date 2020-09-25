<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FraisChantiers Controller
 *
 * @property \App\Model\Table\FraisChantiersTable $FraisChantiers
 *
 * @method \App\Model\Entity\FraisChantier[] paginate($object = null, array $settings = [])
 */
class FraisChantiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypesFrais', 'Chantiers']
        ];
        $fraisChantiers = $this->paginate($this->FraisChantiers);

        $this->set(compact('fraisChantiers'));
        $this->set('_serialize', ['fraisChantiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Frais Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fraisChantier = $this->FraisChantiers->get($id, [
            'contain' => ['TypesFrais', 'Chantiers']
        ]);

        $this->set('fraisChantier', $fraisChantier);
        $this->set('_serialize', ['fraisChantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fraisChantier = $this->FraisChantiers->newEntity();
        if ($this->request->is('post')) {
            $fraisChantier = $this->FraisChantiers->patchEntity($fraisChantier, $this->request->data);
            if ($this->FraisChantiers->save($fraisChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Frais Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Frais Chantier'));
            }
        }
        $typesFrais = $this->FraisChantiers->TypesFrais->find('list', ['limit' => 200]);
        $chantiers = $this->FraisChantiers->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('fraisChantier', 'typesFrais', 'chantiers'));
        $this->set('_serialize', ['fraisChantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Frais Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fraisChantier = $this->FraisChantiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fraisChantier = $this->FraisChantiers->patchEntity($fraisChantier, $this->request->data);
            if ($this->FraisChantiers->save($fraisChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Frais Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Frais Chantier'));
            }
        }
        $typesFrais = $this->FraisChantiers->TypesFrais->find('list', ['limit' => 200]);
        $chantiers = $this->FraisChantiers->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('fraisChantier', 'typesFrais', 'chantiers'));
        $this->set('_serialize', ['fraisChantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Frais Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fraisChantier = $this->FraisChantiers->get($id);
        if ($this->FraisChantiers->delete($fraisChantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Frais Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Frais Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
