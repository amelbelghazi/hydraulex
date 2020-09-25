<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EtatsAffaires Controller
 *
 * @property \App\Model\Table\EtatsAffairesTable $EtatsAffaires
 *
 * @method \App\Model\Entity\EtatsAffaire[] paginate($object = null, array $settings = [])
 */
class EtatsAffairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => []
        ];

        $etatsAffaires = $this->paginate($this->EtatsAffaires);
        $this->set(compact('etatsAffaires'));
        $this->set('_serialize', ['etatsAffaires']);
    }

    /**
     * View method
     *
     * @param string|null $id Etats Affaire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etatsAffaire = $this->EtatsAffaires->get($id, [
            'contain' => ['Affaires', 'Etats']
        ]);

        $this->set('etatsAffaire', $etatsAffaire);
        $this->set('_serialize', ['etatsAffaire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etatsAffaire = $this->EtatsAffaires->newEntity();
        $etat = $this->EtatsAffaires->Etats->newEntity();
        if ($this->request->is('post')) {
            $etatsAffaire = $this->EtatsAffaires->patchEntity($etatsAffaire, $this->request->data);
            if ($this->EtatsAffaires->save($etatsAffaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Affaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Affaire'));
            }
        }
        $affaires = $this->EtatsAffaires->Affaires->find('list', ['limit' => 200]);
        $etats = $this->EtatsAffaires->Etats->find('list', ['limit' => 200]);
        $this->set(compact('etatsAffaire', 'affaires', 'etats', 'etat'));
        $this->set('_serialize', ['etatsAffaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etats Affaire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etatsAffaire = $this->EtatsAffaires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etatsAffaire = $this->EtatsAffaires->patchEntity($etatsAffaire, $this->request->data);
            if ($this->EtatsAffaires->save($etatsAffaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Affaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Affaire'));
            }
        }
        $affaires = $this->EtatsAffaires->Affaires->find('list', ['limit' => 200]);
        $etats = $this->EtatsAffaires->Etats->find('list', ['limit' => 200]);
        $this->set(compact('etatsAffaire', 'affaires', 'etats'));
        $this->set('_serialize', ['etatsAffaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etats Affaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etatsAffaire = $this->EtatsAffaires->get($id);
        if ($this->EtatsAffaires->delete($etatsAffaire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Etats Affaire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Etats Affaire'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
