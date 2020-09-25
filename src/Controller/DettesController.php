<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dettes Controller
 *
 * @property \App\Model\Table\DettesTable $Dettes
 *
 * @method \App\Model\Entity\Dette[] paginate($object = null, array $settings = [])
 */
class DettesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Achats']
        ];
        $dettes = $this->paginate($this->Dettes);

        $this->set(compact('dettes'));
        $this->set('_serialize', ['dettes']);
    }

    /**
     * View method
     *
     * @param string|null $id Dette id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dette = $this->Dettes->get($id, [
            'contain' => ['Achats', 'Versements']
        ]);

        $this->set('dette', $dette);
        $this->set('_serialize', ['dette']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dette = $this->Dettes->newEntity();
        if ($this->request->is('post')) {
            $dette = $this->Dettes->patchEntity($dette, $this->request->data);
            if ($this->Dettes->save($dette)) {
                $this->Flash->success(__('The {0} has been saved.', 'Dette'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Dette'));
            }
        }
        $achats = $this->Dettes->Achats->find('list', ['limit' => 200]);
        $this->set(compact('dette', 'achats'));
        $this->set('_serialize', ['dette']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dette id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dette = $this->Dettes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dette = $this->Dettes->patchEntity($dette, $this->request->data);
            if ($this->Dettes->save($dette)) {
                $this->Flash->success(__('The {0} has been saved.', 'Dette'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Dette'));
            }
        }
        $achats = $this->Dettes->Achats->find('list', ['limit' => 200]);
        $this->set(compact('dette', 'achats'));
        $this->set('_serialize', ['dette']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dette id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dette = $this->Dettes->get($id);
        if ($this->Dettes->delete($dette)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Dette'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Dette'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
