<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FonctionsChantiers Controller
 *
 * @property \App\Model\Table\FonctionsChantiersTable $FonctionsChantiers
 *
 * @method \App\Model\Entity\FonctionsChantier[] paginate($object = null, array $settings = [])
 */
class FonctionsChantiersController extends AppController
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
        $fonctionsChantiers = $this->paginate($this->FonctionsChantiers);

        $this->set(compact('fonctionsChantiers'));
        $this->set('_serialize', ['fonctionsChantiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Fonctions Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fonctionsChantier = $this->FonctionsChantiers->get($id, [
            'contain' => ['Fonctions']
        ]);

        $this->set('fonctionsChantier', $fonctionsChantier);
        $this->set('_serialize', ['fonctionsChantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fonctionsChantier = $this->FonctionsChantiers->newEntity();
        if ($this->request->is('post')) {
            $fonctionsChantier = $this->FonctionsChantiers->patchEntity($fonctionsChantier, $this->request->data);
            if ($this->FonctionsChantiers->save($fonctionsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Fonctions Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fonctions Chantier'));
            }
        }
        $fonctions = $this->FonctionsChantiers->Fonctions->find('list', ['limit' => 200]);
        $this->set(compact('fonctionsChantier', 'fonctions'));
        $this->set('_serialize', ['fonctionsChantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fonctions Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fonctionsChantier = $this->FonctionsChantiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fonctionsChantier = $this->FonctionsChantiers->patchEntity($fonctionsChantier, $this->request->data);
            if ($this->FonctionsChantiers->save($fonctionsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Fonctions Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fonctions Chantier'));
            }
        }
        $fonctions = $this->FonctionsChantiers->Fonctions->find('list', ['limit' => 200]);
        $this->set(compact('fonctionsChantier', 'fonctions'));
        $this->set('_serialize', ['fonctionsChantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fonctions Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fonctionsChantier = $this->FonctionsChantiers->get($id);
        if ($this->FonctionsChantiers->delete($fonctionsChantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Fonctions Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Fonctions Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
