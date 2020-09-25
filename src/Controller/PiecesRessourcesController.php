<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PiecesRessources Controller
 *
 * @property \App\Model\Table\PiecesRessourcesTable $PiecesRessources
 *
 * @method \App\Model\Entity\PiecesRessource[] paginate($object = null, array $settings = [])
 */
class PiecesRessourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ressources', 'Pieces']
        ];
        $piecesRessources = $this->paginate($this->PiecesRessources);

        $this->set(compact('piecesRessources'));
        $this->set('_serialize', ['piecesRessources']);
    }

    /**
     * View method
     *
     * @param string|null $id Pieces Ressource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $piecesRessource = $this->PiecesRessources->get($id, [
            'contain' => ['Ressources', 'Pieces']
        ]);

        $this->set('piecesRessource', $piecesRessource);
        $this->set('_serialize', ['piecesRessource']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $piecesRessource = $this->PiecesRessources->newEntity();
        if ($this->request->is('post')) {
            $piecesRessource = $this->PiecesRessources->patchEntity($piecesRessource, $this->request->data);
            if ($this->PiecesRessources->save($piecesRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Pieces Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Pieces Ressource'));
            }
        }
        $ressources = $this->PiecesRessources->Ressources->find('list', ['limit' => 200]);
        $pieces = $this->PiecesRessources->Pieces->find('list', ['limit' => 200]);
        $this->set(compact('piecesRessource', 'ressources', 'pieces'));
        $this->set('_serialize', ['piecesRessource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pieces Ressource id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $piecesRessource = $this->PiecesRessources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $piecesRessource = $this->PiecesRessources->patchEntity($piecesRessource, $this->request->data);
            if ($this->PiecesRessources->save($piecesRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Pieces Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Pieces Ressource'));
            }
        }
        $ressources = $this->PiecesRessources->Ressources->find('list', ['limit' => 200]);
        $pieces = $this->PiecesRessources->Pieces->find('list', ['limit' => 200]);
        $this->set(compact('piecesRessource', 'ressources', 'pieces'));
        $this->set('_serialize', ['piecesRessource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pieces Ressource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $piecesRessource = $this->PiecesRessources->get($id);
        if ($this->PiecesRessources->delete($piecesRessource)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Pieces Ressource'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Pieces Ressource'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
