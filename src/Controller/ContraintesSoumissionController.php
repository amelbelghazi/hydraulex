<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContraintesSoumission Controller
 *
 * @property \App\Model\Table\ContraintesSoumissionTable $ContraintesSoumission
 *
 * @method \App\Model\Entity\ContraintesSoumission[] paginate($object = null, array $settings = [])
 */
class ContraintesSoumissionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Unites']
        ];
        $contraintesSoumission = $this->paginate($this->ContraintesSoumission);

        $this->set(compact('contraintesSoumission'));
        $this->set('_serialize', ['contraintesSoumission']);
    }

    /**
     * View method
     *
     * @param string|null $id Contraintes Soumission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contraintesSoumission = $this->ContraintesSoumission->get($id, [
            'contain' => ['Unites']
        ]);

        $this->set('contraintesSoumission', $contraintesSoumission);
        $this->set('_serialize', ['contraintesSoumission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contraintesSoumission = $this->ContraintesSoumission->newEntity();
        if ($this->request->is('post')) {
            $contraintesSoumission = $this->ContraintesSoumission->patchEntity($contraintesSoumission, $this->request->data);
            if ($this->ContraintesSoumission->save($contraintesSoumission)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contraintes Soumission'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contraintes Soumission'));
            }
        }
        $unites = $this->ContraintesSoumission->Unites->find('list', ['limit' => 200]);
        $this->set(compact('contraintesSoumission', 'unites'));
        $this->set('_serialize', ['contraintesSoumission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contraintes Soumission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contraintesSoumission = $this->ContraintesSoumission->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contraintesSoumission = $this->ContraintesSoumission->patchEntity($contraintesSoumission, $this->request->data);
            if ($this->ContraintesSoumission->save($contraintesSoumission)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contraintes Soumission'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contraintes Soumission'));
            }
        }
        $unites = $this->ContraintesSoumission->Unites->find('list', ['limit' => 200]);
        $this->set(compact('contraintesSoumission', 'unites'));
        $this->set('_serialize', ['contraintesSoumission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contraintes Soumission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contraintesSoumission = $this->ContraintesSoumission->get($id);
        if ($this->ContraintesSoumission->delete($contraintesSoumission)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Contraintes Soumission'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Contraintes Soumission'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
