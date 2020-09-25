<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EtatsPersonnel Controller
 *
 * @property \App\Model\Table\EtatsPersonnelTable $EtatsPersonnel
 *
 * @method \App\Model\Entity\EtatsPersonnel[] paginate($object = null, array $settings = [])
 */
class EtatsPersonnelController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels']
        ];
        $etatsPersonnel = $this->paginate($this->EtatsPersonnel);

        $this->set(compact('etatsPersonnel'));
        $this->set('_serialize', ['etatsPersonnel']);
    }

    /**
     * View method
     *
     * @param string|null $id Etats Personnel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etatsPersonnel = $this->EtatsPersonnel->get($id, [
            'contain' => ['Personnels']
        ]);

        $this->set('etatsPersonnel', $etatsPersonnel);
        $this->set('_serialize', ['etatsPersonnel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etatsPersonnel = $this->EtatsPersonnel->newEntity();
        if ($this->request->is('post')) {
            $etatsPersonnel = $this->EtatsPersonnel->patchEntity($etatsPersonnel, $this->request->data);
            if ($this->EtatsPersonnel->save($etatsPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Personnel'));
            }
        }
        $personnels = $this->EtatsPersonnel->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('etatsPersonnel', 'personnels'));
        $this->set('_serialize', ['etatsPersonnel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etats Personnel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etatsPersonnel = $this->EtatsPersonnel->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etatsPersonnel = $this->EtatsPersonnel->patchEntity($etatsPersonnel, $this->request->data);
            if ($this->EtatsPersonnel->save($etatsPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Personnel'));
            }
        }
        $personnels = $this->EtatsPersonnel->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('etatsPersonnel', 'personnels'));
        $this->set('_serialize', ['etatsPersonnel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etats Personnel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etatsPersonnel = $this->EtatsPersonnel->get($id);
        if ($this->EtatsPersonnel->delete($etatsPersonnel)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Etats Personnel'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Etats Personnel'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
