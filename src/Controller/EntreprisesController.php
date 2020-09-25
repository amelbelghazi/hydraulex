<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Entreprises Controller
 *
 * @property \App\Model\Table\EntreprisesTable $Entreprises
 *
 * @method \App\Model\Entity\Entreprise[] paginate($object = null, array $settings = [])
 */
class EntreprisesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $entreprises = $this->paginate($this->Entreprises);

        $this->set(compact('entreprises'));
        $this->set('_serialize', ['entreprises']);
    }

    /**
     * View method
     *
     * @param string|null $id Entreprise id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entreprise = $this->Entreprises->get($id, [
            'contain' => ['Destinataires', 'Expediteurs', 'Fournisseurs', 'Gerants', 'Locataires', 'MaitresOeuvres', 'MaitresOuvrages', 'Marques', 'Proprietaires', 'Reparateurs', 'Societes', 'Soumissionnaires', 'Soustraitants']
        ]);

        $this->set('entreprise', $entreprise);
        $this->set('_serialize', ['entreprise']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entreprise = $this->Entreprises->newEntity();
        if ($this->request->is('post')) {
            $entreprise = $this->Entreprises->patchEntity($entreprise, $this->request->data);
            if ($this->Entreprises->save($entreprise)) {
                $this->Flash->success(__('The {0} has been saved.', 'Entreprise'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Entreprise'));
            }
        }
        $this->set(compact('entreprise'));
        $this->set('_serialize', ['entreprise']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Entreprise id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entreprise = $this->Entreprises->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entreprise = $this->Entreprises->patchEntity($entreprise, $this->request->data);
            if ($this->Entreprises->save($entreprise)) {
                $this->Flash->success(__('The {0} has been saved.', 'Entreprise'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Entreprise'));
            }
        }
        $this->set(compact('entreprise'));
        $this->set('_serialize', ['entreprise']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Entreprise id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entreprise = $this->Entreprises->get($id);
        if ($this->Entreprises->delete($entreprise)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Entreprise'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Entreprise'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
