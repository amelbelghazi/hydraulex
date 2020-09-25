<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesPieceIdentite Controller
 *
 * @property \App\Model\Table\TypesPieceIdentiteTable $TypesPieceIdentite
 *
 * @method \App\Model\Entity\TypesPieceIdentite[] paginate($object = null, array $settings = [])
 */
class TypesPieceIdentiteController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesPieceIdentite = $this->paginate($this->TypesPieceIdentite);

        $this->set(compact('typesPieceIdentite'));
        $this->set('_serialize', ['typesPieceIdentite']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Piece Identite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesPieceIdentite = $this->TypesPieceIdentite->get($id, [
            'contain' => []
        ]);

        $this->set('typesPieceIdentite', $typesPieceIdentite);
        $this->set('_serialize', ['typesPieceIdentite']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesPieceIdentite = $this->TypesPieceIdentite->newEntity();
        if ($this->request->is('post')) {
            $typesPieceIdentite = $this->TypesPieceIdentite->patchEntity($typesPieceIdentite, $this->request->data);
            if ($this->TypesPieceIdentite->save($typesPieceIdentite)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Piece Identite'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Piece Identite'));
            }
        }
        $this->set(compact('typesPieceIdentite'));
        $this->set('_serialize', ['typesPieceIdentite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Piece Identite id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesPieceIdentite = $this->TypesPieceIdentite->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesPieceIdentite = $this->TypesPieceIdentite->patchEntity($typesPieceIdentite, $this->request->data);
            if ($this->TypesPieceIdentite->save($typesPieceIdentite)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Piece Identite'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Piece Identite'));
            }
        }
        $this->set(compact('typesPieceIdentite'));
        $this->set('_serialize', ['typesPieceIdentite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Piece Identite id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesPieceIdentite = $this->TypesPieceIdentite->get($id);
        if ($this->TypesPieceIdentite->delete($typesPieceIdentite)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Piece Identite'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Piece Identite'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
