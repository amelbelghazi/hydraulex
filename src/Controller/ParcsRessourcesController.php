<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ParcsRessources Controller
 *
 * @property \App\Model\Table\ParcsRessourcesTable $ParcsRessources
 *
 * @method \App\Model\Entity\ParcsRessource[] paginate($object = null, array $settings = [])
 */
class ParcsRessourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Parcs', 'Ressources']
        ];
        $parcsRessources = $this->paginate($this->ParcsRessources);

        $this->set(compact('parcsRessources'));
        $this->set('_serialize', ['parcsRessources']);
    }

    /**
     * View method
     *
     * @param string|null $id Parcs Ressource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parcsRessource = $this->ParcsRessources->get($id, [
            'contain' => ['Parcs', 'Ressources']
        ]);

        $this->set('parcsRessource', $parcsRessource);
        $this->set('_serialize', ['parcsRessource']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parcsRessource = $this->ParcsRessources->newEntity();
        if ($this->request->is('post')) {
            $parcsRessource = $this->ParcsRessources->patchEntity($parcsRessource, $this->request->data);
            if ($this->ParcsRessources->save($parcsRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Parcs Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Parcs Ressource'));
            }
        }
        $parcs = $this->ParcsRessources->Parcs->find('list', ['limit' => 200]);
        $ressources = $this->ParcsRessources->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('parcsRessource', 'parcs', 'ressources'));
        $this->set('_serialize', ['parcsRessource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parcs Ressource id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parcsRessource = $this->ParcsRessources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parcsRessource = $this->ParcsRessources->patchEntity($parcsRessource, $this->request->data);
            if ($this->ParcsRessources->save($parcsRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Parcs Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Parcs Ressource'));
            }
        }
        $parcs = $this->ParcsRessources->Parcs->find('list', ['limit' => 200]);
        $ressources = $this->ParcsRessources->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('parcsRessource', 'parcs', 'ressources'));
        $this->set('_serialize', ['parcsRessource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parcs Ressource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parcsRessource = $this->ParcsRessources->get($id);
        if ($this->ParcsRessources->delete($parcsRessource)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Parcs Ressource'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Parcs Ressource'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
