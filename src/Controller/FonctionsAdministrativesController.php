<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FonctionsAdministratives Controller
 *
 * @property \App\Model\Table\FonctionsAdministrativesTable $FonctionsAdministratives
 *
 * @method \App\Model\Entity\FonctionsAdministrative[] paginate($object = null, array $settings = [])
 */
class FonctionsAdministrativesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fonctions']
        ];
        $fonctionsAdministratives = $this->paginate($this->FonctionsAdministratives);

        $this->set(compact('fonctionsAdministratives'));
        $this->set('_serialize', ['fonctionsAdministratives']);
    }

    /**
     * View method
     *
     * @param string|null $id Fonctions Administrative id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fonctionsAdministrative = $this->FonctionsAdministratives->get($id, [
            'contain' => ['Fonctions']
        ]);

        $this->set('fonctionsAdministrative', $fonctionsAdministrative);
        $this->set('_serialize', ['fonctionsAdministrative']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fonctionsAdministrative = $this->FonctionsAdministratives->newEntity();
        if ($this->request->is('post')) {
            $fonctionsAdministrative = $this->FonctionsAdministratives->patchEntity($fonctionsAdministrative, $this->request->data);
            if ($this->FonctionsAdministratives->save($fonctionsAdministrative)) {
                $this->Flash->success(__('The {0} has been saved.', 'Fonctions Administrative'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fonctions Administrative'));
            }
        }
        $fonctions = $this->FonctionsAdministratives->Fonctions->find('list', ['limit' => 200]);
        $this->set(compact('fonctionsAdministrative', 'fonctions'));
        $this->set('_serialize', ['fonctionsAdministrative']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fonctions Administrative id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fonctionsAdministrative = $this->FonctionsAdministratives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fonctionsAdministrative = $this->FonctionsAdministratives->patchEntity($fonctionsAdministrative, $this->request->data);
            if ($this->FonctionsAdministratives->save($fonctionsAdministrative)) {
                $this->Flash->success(__('The {0} has been saved.', 'Fonctions Administrative'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fonctions Administrative'));
            }
        }
        $fonctions = $this->FonctionsAdministratives->Fonctions->find('list', ['limit' => 200]);
        $this->set(compact('fonctionsAdministrative', 'fonctions'));
        $this->set('_serialize', ['fonctionsAdministrative']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fonctions Administrative id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fonctionsAdministrative = $this->FonctionsAdministratives->get($id);
        if ($this->FonctionsAdministratives->delete($fonctionsAdministrative)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Fonctions Administrative'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Fonctions Administrative'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
