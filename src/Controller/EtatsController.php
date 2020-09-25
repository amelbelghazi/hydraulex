<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Etats Controller
 *
 * @property \App\Model\Table\EtatsTable $Etats
 *
 * @method \App\Model\Entity\Etat[] paginate($object = null, array $settings = [])
 */
class EtatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $etats = $this->paginate($this->Etats);

        $this->set(compact('etats'));
        $this->set('_serialize', ['etats']);
    }

    /**
     * View method
     *
     * @param string|null $id Etat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etat = $this->Etats->get($id, [
            'contain' => ['EtatsRessource', 'EtatsCommision', 'EtatsMarche', 'Soumissions']
        ]);

        $this->set('etat', $etat);
        $this->set('_serialize', ['etat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etat = $this->Etats->newEntity();
        if ($this->request->is('post')) {
            $etat = $this->Etats->patchEntity($etat, $this->request->data);
            if ($this->Etats->save($etat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etat'));
            }
        }
        $etatsRessource = $this->Etats->EtatsRessource->find('list', ['limit' => 200]);
        $this->set(compact('etat', 'etatsRessource'));
        $this->set('_serialize', ['etat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etat = $this->Etats->get($id, [
            'contain' => ['EtatsRessource']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etat = $this->Etats->patchEntity($etat, $this->request->data);
            if ($this->Etats->save($etat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etat'));
            }
        }
        $etatsRessource = $this->Etats->EtatsRessource->find('list', ['limit' => 200]);
        $this->set(compact('etat', 'etatsRessource'));
        $this->set('_serialize', ['etat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etat = $this->Etats->get($id);
        if ($this->Etats->delete($etat)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Etat'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Etat'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
