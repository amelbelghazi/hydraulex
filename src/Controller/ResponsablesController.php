<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Responsables Controller
 *
 * @property \App\Model\Table\ResponsablesTable $Responsables
 *
 * @method \App\Model\Entity\Responsable[] paginate($object = null, array $settings = [])
 */
class ResponsablesController extends AppController
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
        $responsables = $this->paginate($this->Responsables);

        $this->set(compact('responsables'));
        $this->set('_serialize', ['responsables']);
    }

    /**
     * View method
     *
     * @param string|null $id Responsable id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $responsable = $this->Responsables->get($id, [
            'contain' => ['Personnels', 'Chantiers']
        ]);

        $this->set('responsable', $responsable);
        $this->set('_serialize', ['responsable']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $responsable = $this->Responsables->newEntity();
        if ($this->request->is('post')) {
            $responsable = $this->Responsables->patchEntity($responsable, $this->request->data);
            if ($this->Responsables->save($responsable)) {
                $this->Flash->success(__('The {0} has been saved.', 'Responsable'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Responsable'));
            }
        }
        $personnels = $this->Responsables->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('responsable', 'personnels'));
        $this->set('_serialize', ['responsable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Responsable id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $responsable = $this->Responsables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $responsable = $this->Responsables->patchEntity($responsable, $this->request->data);
            if ($this->Responsables->save($responsable)) {
                $this->Flash->success(__('The {0} has been saved.', 'Responsable'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Responsable'));
            }
        }
        $personnels = $this->Responsables->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('responsable', 'personnels'));
        $this->set('_serialize', ['responsable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Responsable id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $responsable = $this->Responsables->get($id);
        if ($this->Responsables->delete($responsable)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Responsable'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Responsable'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
