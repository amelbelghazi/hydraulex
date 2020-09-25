<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Qualifications Controller
 *
 * @property \App\Model\Table\QualificationsTable $Qualifications
 *
 * @method \App\Model\Entity\Qualification[] paginate($object = null, array $settings = [])
 */
class QualificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Soumissionnaires']
        ];
        $qualifications = $this->paginate($this->Qualifications);

        $this->set(compact('qualifications'));
        $this->set('_serialize', ['qualifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Qualification id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qualification = $this->Qualifications->get($id, [
            'contain' => ['Soumissionnaires']
        ]);

        $this->set('qualification', $qualification);
        $this->set('_serialize', ['qualification']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qualification = $this->Qualifications->newEntity();
        if ($this->request->is('post')) {
            $qualification = $this->Qualifications->patchEntity($qualification, $this->request->data);
            if ($this->Qualifications->save($qualification)) {
                $this->Flash->success(__('The {0} has been saved.', 'Qualification'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Qualification'));
            }
        }
        $soumissionnaires = $this->Qualifications->Soumissionnaires->find('list', ['limit' => 200]);
        $this->set(compact('qualification', 'soumissionnaires'));
        $this->set('_serialize', ['qualification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Qualification id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qualification = $this->Qualifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qualification = $this->Qualifications->patchEntity($qualification, $this->request->data);
            if ($this->Qualifications->save($qualification)) {
                $this->Flash->success(__('The {0} has been saved.', 'Qualification'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Qualification'));
            }
        }
        $soumissionnaires = $this->Qualifications->Soumissionnaires->find('list', ['limit' => 200]);
        $this->set(compact('qualification', 'soumissionnaires'));
        $this->set('_serialize', ['qualification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Qualification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qualification = $this->Qualifications->get($id);
        if ($this->Qualifications->delete($qualification)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Qualification'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Qualification'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
