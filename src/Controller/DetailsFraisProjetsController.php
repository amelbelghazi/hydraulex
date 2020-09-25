<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetailsFraisProjets Controller
 *
 * @property \App\Model\Table\DetailsFraisProjetsTable $DetailsFraisProjets
 *
 * @method \App\Model\Entity\DetailsFraisProjet[] paginate($object = null, array $settings = [])
 */
class DetailsFraisProjetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypesFrais', 'FraisProjets']
        ];
        $detailsFraisProjets = $this->paginate($this->DetailsFraisProjets);

        $this->set(compact('detailsFraisProjets'));
        $this->set('_serialize', ['detailsFraisProjets']);
    }

    /**
     * View method
     *
     * @param string|null $id Details Frais Projet id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsFraisProjet = $this->DetailsFraisProjets->get($id, [
            'contain' => ['TypesFrais', 'FraisProjets']
        ]);

        $this->set('detailsFraisProjet', $detailsFraisProjet);
        $this->set('_serialize', ['detailsFraisProjet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsFraisProjet = $this->DetailsFraisProjets->newEntity();
        if ($this->request->is('post')) {
            $detailsFraisProjet = $this->DetailsFraisProjets->patchEntity($detailsFraisProjet, $this->request->data);
            if ($this->DetailsFraisProjets->save($detailsFraisProjet)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Frais Projet'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Frais Projet'));
            }
        }
        $typesFrais = $this->DetailsFraisProjets->TypesFrais->find('list', ['limit' => 200]);
        $fraisProjets = $this->DetailsFraisProjets->FraisProjets->find('list', ['limit' => 200]);
        $this->set(compact('detailsFraisProjet', 'typesFrais', 'fraisProjets'));
        $this->set('_serialize', ['detailsFraisProjet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Details Frais Projet id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsFraisProjet = $this->DetailsFraisProjets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsFraisProjet = $this->DetailsFraisProjets->patchEntity($detailsFraisProjet, $this->request->data);
            if ($this->DetailsFraisProjets->save($detailsFraisProjet)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Frais Projet'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Frais Projet'));
            }
        }
        $typesFrais = $this->DetailsFraisProjets->TypesFrais->find('list', ['limit' => 200]);
        $fraisProjets = $this->DetailsFraisProjets->FraisProjets->find('list', ['limit' => 200]);
        $this->set(compact('detailsFraisProjet', 'typesFrais', 'fraisProjets'));
        $this->set('_serialize', ['detailsFraisProjet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Details Frais Projet id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsFraisProjet = $this->DetailsFraisProjets->get($id);
        if ($this->DetailsFraisProjets->delete($detailsFraisProjet)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Details Frais Projet'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Details Frais Projet'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
