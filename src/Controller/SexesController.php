<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sexes Controller
 *
 * @property \App\Model\Table\SexesTable $Sexes
 *
 * @method \App\Model\Entity\Sex[] paginate($object = null, array $settings = [])
 */
class SexesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sexes = $this->paginate($this->Sexes);

        $this->set(compact('sexes'));
        $this->set('_serialize', ['sexes']);
    }

    /**
     * View method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sex = $this->Sexes->get($id, [
            'contain' => []
        ]);

        $this->set('sex', $sex);
        $this->set('_serialize', ['sex']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sex = $this->Sexes->newEntity();
        if ($this->request->is('post')) {
            $sex = $this->Sexes->patchEntity($sex, $this->request->data);
            if ($this->Sexes->save($sex)) {
                $this->Flash->success(__('The {0} has been saved.', 'Sex'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Sex'));
            }
        }
        $this->set(compact('sex'));
        $this->set('_serialize', ['sex']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sex = $this->Sexes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sex = $this->Sexes->patchEntity($sex, $this->request->data);
            if ($this->Sexes->save($sex)) {
                $this->Flash->success(__('The {0} has been saved.', 'Sex'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Sex'));
            }
        }
        $this->set(compact('sex'));
        $this->set('_serialize', ['sex']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sex = $this->Sexes->get($id);
        if ($this->Sexes->delete($sex)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Sex'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Sex'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
