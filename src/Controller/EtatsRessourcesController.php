<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EtatsRessources Controller
 *
 * @property \App\Model\Table\EtatsRessourcesTable $EtatsRessources
 *
 * @method \App\Model\Entity\EtatsRessource[] paginate($object = null, array $settings = [])
 */
class EtatsRessourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ressources', 'TypesEtatsRessources']
        ];
        $etatsRessources = $this->paginate($this->EtatsRessources);

        $this->set(compact('etatsRessources'));
        $this->set('_serialize', ['etatsRessources']);
    }

    /**
     * View method
     *
     * @param string|null $id Etats Ressource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etatsRessource = $this->EtatsRessources->get($id, [
            'contain' => ['Ressources', 'TypesEtatsRessources']
        ]);

        $this->set('etatsRessource', $etatsRessource);
        $this->set('_serialize', ['etatsRessource']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etatsRessource = $this->EtatsRessources->newEntity();
        if ($this->request->is('post')) {
            $etatsRessource = $this->EtatsRessources->patchEntity($etatsRessource, $this->request->data);
            if ($this->EtatsRessources->save($etatsRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Ressource'));
            }
        }
        $ressources = $this->EtatsRessources->Ressources->find('list', ['limit' => 200]);
        $typesEtatsRessources = $this->EtatsRessources->TypesEtatsRessources->find('list', ['limit' => 200]);
        $this->set(compact('etatsRessource', 'ressources', 'typesEtatsRessources'));
        $this->set('_serialize', ['etatsRessource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etats Ressource id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etatsRessource = $this->EtatsRessources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etatsRessource = $this->EtatsRessources->patchEntity($etatsRessource, $this->request->data);
            if ($this->EtatsRessources->save($etatsRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Ressource'));
            }
        }
        $ressources = $this->EtatsRessources->Ressources->find('list', ['limit' => 200]);
        $typesEtatsRessources = $this->EtatsRessources->TypesEtatsRessources->find('list', ['limit' => 200]);
        $this->set(compact('etatsRessource', 'ressources', 'typesEtatsRessources'));
        $this->set('_serialize', ['etatsRessource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etats Ressource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etatsRessource = $this->EtatsRessources->get($id);
        if ($this->EtatsRessources->delete($etatsRessource)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Etats Ressource'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Etats Ressource'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
