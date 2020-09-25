<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RemboursementsAvance Controller
 *
 * @property \App\Model\Table\RemboursementsAvanceTable $RemboursementsAvance
 *
 * @method \App\Model\Entity\RemboursementsAvance[] paginate($object = null, array $settings = [])
 */
class RemboursementsAvanceController extends AppController
{
 
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Avances']
        ];
        $remboursementsAvance = $this->paginate($this->RemboursementsAvance);

        $this->set(compact('remboursementsAvance'));
        $this->set('_serialize', ['remboursementsAvance']);
    }

    /**
     * View method
     *
     * @param string|null $id Remboursements Avance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $remboursementsAvance = $this->RemboursementsAvance->get($id, [
            'contain' => ['Avances']
        ]);

        $this->set('remboursementsAvance', $remboursementsAvance);
        $this->set('_serialize', ['remboursementsAvance']);
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
        $remboursementsAvance = $this->RemboursementsAvance->newEntity();
        if ($this->request->is(['post', 'ajax'])) {
            $this->toValideTime('dateremboursement'); 
            $remboursementsAvance = $this->RemboursementsAvance->patchEntity($remboursementsAvance, $this->request->data);
            if ($this->RemboursementsAvance->save($remboursementsAvance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Remboursements Avance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Remboursements Avance'));
            }
        }
        $avances = $this->RemboursementsAvance->Avances->find('list', ['limit' => 200]);
        $this->set(compact('remboursementsAvance', 'avances'));
        $this->set('_serialize', ['remboursementsAvance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Remboursements Avance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $remboursementsAvance = $this->RemboursementsAvance->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('dateremboursement'); 
            $remboursementsAvance = $this->RemboursementsAvance->patchEntity($remboursementsAvance, $this->request->data);
            if ($this->RemboursementsAvance->save($remboursementsAvance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Remboursements Avance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Remboursements Avance'));
            }
        }
        $avances = $this->RemboursementsAvance->Avances->find('list', ['limit' => 200]);
        $this->set(compact('remboursementsAvance', 'avances'));
        $this->set('_serialize', ['remboursementsAvance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Remboursements Avance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $remboursementsAvance = $this->RemboursementsAvance->get($id);
        if ($this->RemboursementsAvance->delete($remboursementsAvance)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Remboursements Avance'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Remboursements Avance'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
