<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pieces Controller
 *
 * @property \App\Model\Table\PiecesTable $Pieces
 *
 * @method \App\Model\Entity\Piece[] paginate($object = null, array $settings = [])
 */
class PiecesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pieces = $this->paginate($this->Pieces);

        $this->set(compact('pieces'));
        $this->set('_serialize', ['pieces']);
    }

    /**
     * View method
     *
     * @param string|null $id Piece id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $piece = $this->Pieces->get($id, [
            'contain' => ['Ressources', 'EntretiensMachine', 'PiecesMachine']
        ]);

        $this->set('piece', $piece);
        $this->set('_serialize', ['piece']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $piece = $this->Pieces->newEntity();
        if ($this->request->is('post')) {
            $piece = $this->Pieces->patchEntity($piece, $this->request->data);
            if ($this->Pieces->save($piece)) {
                $this->Flash->success(__('The {0} has been saved.', 'Piece'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Piece'));
            }
        }
        $ressources = $this->Pieces->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('piece', 'ressources'));
        $this->set('_serialize', ['piece']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Piece id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $piece = $this->Pieces->get($id, [
            'contain' => ['Ressources']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $piece = $this->Pieces->patchEntity($piece, $this->request->data);
            if ($this->Pieces->save($piece)) {
                $this->Flash->success(__('The {0} has been saved.', 'Piece'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Piece'));
            }
        }
        $ressources = $this->Pieces->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('piece', 'ressources'));
        $this->set('_serialize', ['piece']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Piece id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $piece = $this->Pieces->get($id);
        if ($this->Pieces->delete($piece)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Piece'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Piece'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
