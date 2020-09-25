<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PiecesIdentites Controller
 *
 * @property \App\Model\Table\PiecesIdentitesTable $PiecesIdentites
 *
 * @method \App\Model\Entity\PiecesIdentite[] paginate($object = null, array $settings = [])
 */
class PiecesIdentitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypePieceentites', 'Documents']
        ];
        $piecesIdentites = $this->paginate($this->PiecesIdentites);

        $this->set(compact('piecesIdentites'));
        $this->set('_serialize', ['piecesIdentites']);
    }

    /**
     * View method
     *
     * @param string|null $id Pieces Identite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $piecesIdentite = $this->PiecesIdentites->get($id, [
            'contain' => ['TypePieceentites', 'Documents']
        ]);

        $this->set('piecesIdentite', $piecesIdentite);
        $this->set('_serialize', ['piecesIdentite']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $piecesIdentite = $this->PiecesIdentites->newEntity();
        if ($this->request->is('post')) {
            $piecesIdentite = $this->PiecesIdentites->patchEntity($piecesIdentite, $this->request->data);
            if ($this->PiecesIdentites->save($piecesIdentite)) {
                $this->Flash->success(__('The {0} has been saved.', 'Pieces Identite'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Pieces Identite'));
            }
        }
        $typePieceentites = $this->PiecesIdentites->TypePieceentites->find('list', ['limit' => 200]);
        $documents = $this->PiecesIdentites->Documents->find('list', ['limit' => 200]);
        $this->set(compact('piecesIdentite', 'typePieceentites', 'documents'));
        $this->set('_serialize', ['piecesIdentite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pieces Identite id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $piecesIdentite = $this->PiecesIdentites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $piecesIdentite = $this->PiecesIdentites->patchEntity($piecesIdentite, $this->request->data);
            if ($this->PiecesIdentites->save($piecesIdentite)) {
                $this->Flash->success(__('The {0} has been saved.', 'Pieces Identite'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Pieces Identite'));
            }
        }
        $typePieceentites = $this->PiecesIdentites->TypePieceentites->find('list', ['limit' => 200]);
        $documents = $this->PiecesIdentites->Documents->find('list', ['limit' => 200]);
        $this->set(compact('piecesIdentite', 'typePieceentites', 'documents'));
        $this->set('_serialize', ['piecesIdentite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pieces Identite id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $piecesIdentite = $this->PiecesIdentites->get($id);
        if ($this->PiecesIdentites->delete($piecesIdentite)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Pieces Identite'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Pieces Identite'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
