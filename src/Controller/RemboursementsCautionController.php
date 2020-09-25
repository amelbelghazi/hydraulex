<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RemboursementsCaution Controller
 *
 * @property \App\Model\Table\RemboursementsCautionTable $RemboursementsCaution
 *
 * @method \App\Model\Entity\RemboursementsCaution[] paginate($object = null, array $settings = [])
 */
class RemboursementsCautionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cautions']
        ];
        $remboursementsCaution = $this->paginate($this->RemboursementsCaution);

        $this->set(compact('remboursementsCaution'));
        $this->set('_serialize', ['remboursementsCaution']);
    }

    /**
     * View method
     *
     * @param string|null $id Remboursements Caution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $remboursementsCaution = $this->RemboursementsCaution->get($id, [
            'contain' => ['Cautions']
        ]);

        $this->set('remboursementsCaution', $remboursementsCaution);
        $this->set('_serialize', ['remboursementsCaution']);
    }
   public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }
    /** 
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $remboursementsCaution = $this->RemboursementsCaution->newEntity();
        if ($this->request->is(['post', 'ajax'])) {
            $this->toValideTime('dateremboursement'); 
            $remboursementsCaution = $this->RemboursementsCaution->patchEntity($remboursementsCaution, $this->request->data);
            if ($this->RemboursementsCaution->save($remboursementsCaution)) {
                $this->Flash->success(__('The {0} has been saved.', 'Remboursements Caution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Remboursements Caution'));
            }
        }
        $cautions = $this->RemboursementsCaution->Cautions->find('list', ['limit' => 200]);
        $this->set(compact('remboursementsCaution', 'cautions'));
        $this->set('_serialize', ['remboursementsCaution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Remboursements Caution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $remboursementsCaution = $this->RemboursementsCaution->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $remboursementsCaution = $this->RemboursementsCaution->patchEntity($remboursementsCaution, $this->request->data);
            if ($this->RemboursementsCaution->save($remboursementsCaution)) {
                $this->Flash->success(__('The {0} has been saved.', 'Remboursements Caution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Remboursements Caution'));
            }
        }
        $cautions = $this->RemboursementsCaution->Cautions->find('list', ['limit' => 200]);
        $this->set(compact('remboursementsCaution', 'cautions'));
        $this->set('_serialize', ['remboursementsCaution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Remboursements Caution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $remboursementsCaution = $this->RemboursementsCaution->get($id);
        if ($this->RemboursementsCaution->delete($remboursementsCaution)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Remboursements Caution'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Remboursements Caution'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
