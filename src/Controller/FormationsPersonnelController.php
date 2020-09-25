<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationsPersonnel Controller
 *
 * @property \App\Model\Table\FormationsPersonnelTable $FormationsPersonnel
 *
 * @method \App\Model\Entity\FormationsPersonnel[] paginate($object = null, array $settings = [])
 */
class FormationsPersonnelController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Formations', 'Personnels']
        ];
        $formationsPersonnel = $this->paginate($this->FormationsPersonnel);

        $this->set(compact('formationsPersonnel'));
        $this->set('_serialize', ['formationsPersonnel']);
    }

    /**
     * View method
     *
     * @param string|null $id Formations Personnel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationsPersonnel = $this->FormationsPersonnel->get($id, [
            'contain' => ['Formations', 'Personnels']
        ]);

        $this->set('formationsPersonnel', $formationsPersonnel);
        $this->set('_serialize', ['formationsPersonnel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationsPersonnel = $this->FormationsPersonnel->newEntity();
        if ($this->request->is('post')) {
            $formationsPersonnel = $this->FormationsPersonnel->patchEntity($formationsPersonnel, $this->request->data);
            if ($this->FormationsPersonnel->save($formationsPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Formations Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Formations Personnel'));
            }
        }
        $formations = $this->FormationsPersonnel->Formations->find('list', ['limit' => 200]);
        $personnels = $this->FormationsPersonnel->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('formationsPersonnel', 'formations', 'personnels'));
        $this->set('_serialize', ['formationsPersonnel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formations Personnel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationsPersonnel = $this->FormationsPersonnel->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationsPersonnel = $this->FormationsPersonnel->patchEntity($formationsPersonnel, $this->request->data);
            if ($this->FormationsPersonnel->save($formationsPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Formations Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Formations Personnel'));
            }
        }
        $formations = $this->FormationsPersonnel->Formations->find('list', ['limit' => 200]);
        $personnels = $this->FormationsPersonnel->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('formationsPersonnel', 'formations', 'personnels'));
        $this->set('_serialize', ['formationsPersonnel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formations Personnel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationsPersonnel = $this->FormationsPersonnel->get($id);
        if ($this->FormationsPersonnel->delete($formationsPersonnel)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Formations Personnel'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Formations Personnel'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
