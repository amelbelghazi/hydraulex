<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formations Controller
 *
 * @property \App\Model\Table\FormationsTable $Formations
 *
 * @method \App\Model\Entity\Formation[] paginate($object = null, array $settings = [])
 */
class FormationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $formations = $this->paginate($this->Formations);

        $this->set(compact('formations'));
        $this->set('_serialize', ['formations']);
    }

    /**
     * View method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formation = $this->Formations->get($id, [
            'contain' => ['FormationsPersonnel']
        ]);

        $this->set('formation', $formation);
        $this->set('_serialize', ['formation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formation = $this->Formations->newEntity();
        if ($this->request->is('post')) {
            $formation = $this->Formations->patchEntity($formation, $this->request->data);
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Formation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Formation'));
            }
        }
        $this->set(compact('formation'));
        $this->set('_serialize', ['formation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formation = $this->Formations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formation = $this->Formations->patchEntity($formation, $this->request->data);
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Formation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Formation'));
            }
        }
        $this->set(compact('formation'));
        $this->set('_serialize', ['formation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formation = $this->Formations->get($id);
        if ($this->Formations->delete($formation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Formation'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Formation'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
