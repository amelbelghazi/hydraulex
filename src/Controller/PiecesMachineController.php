<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PiecesMachine Controller
 *
 * @property \App\Model\Table\PiecesMachineTable $PiecesMachine
 *
 * @method \App\Model\Entity\PiecesMachine[] paginate($object = null, array $settings = [])
 */
class PiecesMachineController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Machines', 'Pieces']
        ];
        $piecesMachine = $this->paginate($this->PiecesMachine);

        $this->set(compact('piecesMachine'));
        $this->set('_serialize', ['piecesMachine']);
    }

    /**
     * View method
     *
     * @param string|null $id Pieces Machine id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $piecesMachine = $this->PiecesMachine->get($id, [
            'contain' => ['Machines', 'Pieces']
        ]);

        $this->set('piecesMachine', $piecesMachine);
        $this->set('_serialize', ['piecesMachine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $piecesMachine = $this->PiecesMachine->newEntity();
        if ($this->request->is('post')) {
            $piecesMachine = $this->PiecesMachine->patchEntity($piecesMachine, $this->request->data);
            if ($this->PiecesMachine->save($piecesMachine)) {
                $this->Flash->success(__('The {0} has been saved.', 'Pieces Machine'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Pieces Machine'));
            }
        }
        $machines = $this->PiecesMachine->Machines->find('list', ['limit' => 200]);
        $pieces = $this->PiecesMachine->Pieces->find('list', ['limit' => 200]);
        $this->set(compact('piecesMachine', 'machines', 'pieces'));
        $this->set('_serialize', ['piecesMachine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pieces Machine id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $piecesMachine = $this->PiecesMachine->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $piecesMachine = $this->PiecesMachine->patchEntity($piecesMachine, $this->request->data);
            if ($this->PiecesMachine->save($piecesMachine)) {
                $this->Flash->success(__('The {0} has been saved.', 'Pieces Machine'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Pieces Machine'));
            }
        }
        $machines = $this->PiecesMachine->Machines->find('list', ['limit' => 200]);
        $pieces = $this->PiecesMachine->Pieces->find('list', ['limit' => 200]);
        $this->set(compact('piecesMachine', 'machines', 'pieces'));
        $this->set('_serialize', ['piecesMachine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pieces Machine id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $piecesMachine = $this->PiecesMachine->get($id);
        if ($this->PiecesMachine->delete($piecesMachine)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Pieces Machine'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Pieces Machine'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
