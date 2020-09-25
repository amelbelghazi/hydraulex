<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Versements Controller
 *
 * @property \App\Model\Table\VersementsTable $Versements
 *
 * @method \App\Model\Entity\Versement[] paginate($object = null, array $settings = [])
 */
class VersementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dettes']
        ];
        $versements = $this->paginate($this->Versements);

        $this->set(compact('versements'));
        $this->set('_serialize', ['versements']);
    }

    /**
     * View method
     *
     * @param string|null $id Versement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $versement = $this->Versements->get($id, [
            'contain' => ['Dettes']
        ]);

        $this->set('versement', $versement);
        $this->set('_serialize', ['versement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $versement = $this->Versements->newEntity();
        if ($this->request->is('post')) {
            $versement = $this->Versements->patchEntity($versement, $this->request->data);
            if ($this->Versements->save($versement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Versement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Versement'));
            }
        }
        $dettes = $this->Versements->Dettes->find('list', ['limit' => 200]);
        $this->set(compact('versement', 'dettes'));
        $this->set('_serialize', ['versement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Versement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $versement = $this->Versements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $versement = $this->Versements->patchEntity($versement, $this->request->data);
            if ($this->Versements->save($versement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Versement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Versement'));
            }
        }
        $dettes = $this->Versements->Dettes->find('list', ['limit' => 200]);
        $this->set(compact('versement', 'dettes'));
        $this->set('_serialize', ['versement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Versement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $versement = $this->Versements->get($id);
        if ($this->Versements->delete($versement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Versement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Versement'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
