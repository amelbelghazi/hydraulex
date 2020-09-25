<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesAvances Controller
 *
 * @property \App\Model\Table\TypesAvancesTable $TypesAvances
 *
 * @method \App\Model\Entity\TypesAvance[] paginate($object = null, array $settings = [])
 */
class TypesAvancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesAvances = $this->paginate($this->TypesAvances);

        $this->set(compact('typesAvances'));
        $this->set('_serialize', ['typesAvances']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Avance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesAvance = $this->TypesAvances->get($id, [
            'contain' => ['Avances']
        ]);

        $this->set('typesAvance', $typesAvance);
        $this->set('_serialize', ['typesAvance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesAvance = $this->TypesAvances->newEntity();
        if ($this->request->is('post')) {
            $typesAvance = $this->TypesAvances->patchEntity($typesAvance, $this->request->data);
            if ($this->TypesAvances->save($typesAvance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Avance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Avance'));
            }
        }
        $this->set(compact('typesAvance'));
        $this->set('_serialize', ['typesAvance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Avance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesAvance = $this->TypesAvances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesAvance = $this->TypesAvances->patchEntity($typesAvance, $this->request->data);
            if ($this->TypesAvances->save($typesAvance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Avance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Avance'));
            }
        }
        $this->set(compact('typesAvance'));
        $this->set('_serialize', ['typesAvance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Avance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesAvance = $this->TypesAvances->get($id);
        if ($this->TypesAvances->delete($typesAvance)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Avance'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Avance'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
