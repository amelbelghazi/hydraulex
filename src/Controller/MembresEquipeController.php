<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MembresEquipe Controller
 *
 * @property \App\Model\Table\MembresEquipeTable $MembresEquipe
 *
 * @method \App\Model\Entity\MembresEquipe[] paginate($object = null, array $settings = [])
 */
class MembresEquipeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Membres', 'Equipes']
        ];
        $membresEquipe = $this->paginate($this->MembresEquipe);

        $this->set(compact('membresEquipe'));
        $this->set('_serialize', ['membresEquipe']);
    }

    /**
     * View method
     *
     * @param string|null $id Membres Equipe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membresEquipe = $this->MembresEquipe->get($id, [
            'contain' => ['Membres', 'Equipes']
        ]);

        $this->set('membresEquipe', $membresEquipe);
        $this->set('_serialize', ['membresEquipe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membresEquipe = $this->MembresEquipe->newEntity();
        if ($this->request->is('post')) {
            $membresEquipe = $this->MembresEquipe->patchEntity($membresEquipe, $this->request->data);
            if ($this->MembresEquipe->save($membresEquipe)) {
                $this->Flash->success(__('The {0} has been saved.', 'Membres Equipe'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Membres Equipe'));
            }
        }
        $membres = $this->MembresEquipe->Membres->find('list', ['limit' => 200]);
        $equipes = $this->MembresEquipe->Equipes->find('list', ['limit' => 200]);
        $this->set(compact('membresEquipe', 'membres', 'equipes'));
        $this->set('_serialize', ['membresEquipe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Membres Equipe id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membresEquipe = $this->MembresEquipe->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membresEquipe = $this->MembresEquipe->patchEntity($membresEquipe, $this->request->data);
            if ($this->MembresEquipe->save($membresEquipe)) {
                $this->Flash->success(__('The {0} has been saved.', 'Membres Equipe'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Membres Equipe'));
            }
        }
        $membres = $this->MembresEquipe->Membres->find('list', ['limit' => 200]);
        $equipes = $this->MembresEquipe->Equipes->find('list', ['limit' => 200]);
        $this->set(compact('membresEquipe', 'membres', 'equipes'));
        $this->set('_serialize', ['membresEquipe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Membres Equipe id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membresEquipe = $this->MembresEquipe->get($id);
        if ($this->MembresEquipe->delete($membresEquipe)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Membres Equipe'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Membres Equipe'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
