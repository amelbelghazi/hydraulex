<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ResponsablesParcs Controller
 *
 * @property \App\Model\Table\ResponsablesParcsTable $ResponsablesParcs
 *
 * @method \App\Model\Entity\ResponsablesParc[] paginate($object = null, array $settings = [])
 */
class ResponsablesParcsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Parcs', 'Responsables']
        ];
        $responsablesParcs = $this->paginate($this->ResponsablesParcs);

        $this->set(compact('responsablesParcs'));
        $this->set('_serialize', ['responsablesParcs']);
    }

    /**
     * View method
     *
     * @param string|null $id Responsables Parc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $responsablesParc = $this->ResponsablesParcs->get($id, [
            'contain' => ['Parcs', 'Responsables']
        ]);

        $this->set('responsablesParc', $responsablesParc);
        $this->set('_serialize', ['responsablesParc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $responsablesParc = $this->ResponsablesParcs->newEntity();
        if ($this->request->is('post')) {
            $responsablesParc = $this->ResponsablesParcs->patchEntity($responsablesParc, $this->request->data);
            if ($this->ResponsablesParcs->save($responsablesParc)) {
                $this->Flash->success(__('The {0} has been saved.', 'Responsables Parc'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Responsables Parc'));
            }
        }
        $parcs = $this->ResponsablesParcs->Parcs->find('list', ['limit' => 200]);
        $responsables = $this->ResponsablesParcs->Responsables->find('list', ['limit' => 200]);
        $this->set(compact('responsablesParc', 'parcs', 'responsables'));
        $this->set('_serialize', ['responsablesParc']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Responsables Parc id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $responsablesParc = $this->ResponsablesParcs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $responsablesParc = $this->ResponsablesParcs->patchEntity($responsablesParc, $this->request->data);
            if ($this->ResponsablesParcs->save($responsablesParc)) {
                $this->Flash->success(__('The {0} has been saved.', 'Responsables Parc'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Responsables Parc'));
            }
        }
        $parcs = $this->ResponsablesParcs->Parcs->find('list', ['limit' => 200]);
        $responsables = $this->ResponsablesParcs->Responsables->find('list', ['limit' => 200]);
        $this->set(compact('responsablesParc', 'parcs', 'responsables'));
        $this->set('_serialize', ['responsablesParc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Responsables Parc id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $responsablesParc = $this->ResponsablesParcs->get($id);
        if ($this->ResponsablesParcs->delete($responsablesParc)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Responsables Parc'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Responsables Parc'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
