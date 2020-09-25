<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paies Controller
 *
 * @property \App\Model\Table\PaiesTable $Paies
 *
 * @method \App\Model\Entity\Paie[] paginate($object = null, array $settings = [])
 */
class PaiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Salaires']
        ];
        $paies = $this->paginate($this->Paies);

        $this->set(compact('paies'));
        $this->set('_serialize', ['paies']);
    }

    /**
     * View method
     *
     * @param string|null $id Paie id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paie = $this->Paies->get($id, [
            'contain' => ['Salaires']
        ]);

        $this->set('paie', $paie);
        $this->set('_serialize', ['paie']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paie = $this->Paies->newEntity();
        if ($this->request->is('post')) {
            $paie = $this->Paies->patchEntity($paie, $this->request->data);
            if ($this->Paies->save($paie)) {
                $this->Flash->success(__('The {0} has been saved.', 'Paie'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Paie'));
            }
        }
        $salaires = $this->Paies->Salaires->find('list', ['limit' => 200]);
        $this->set(compact('paie', 'salaires'));
        $this->set('_serialize', ['paie']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Paie id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paie = $this->Paies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paie = $this->Paies->patchEntity($paie, $this->request->data);
            if ($this->Paies->save($paie)) {
                $this->Flash->success(__('The {0} has been saved.', 'Paie'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Paie'));
            }
        }
        $salaires = $this->Paies->Salaires->find('list', ['limit' => 200]);
        $this->set(compact('paie', 'salaires'));
        $this->set('_serialize', ['paie']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paie id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paie = $this->Paies->get($id);
        if ($this->Paies->delete($paie)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Paie'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Paie'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
