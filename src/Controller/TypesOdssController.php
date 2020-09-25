<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesOdss Controller
 *
 * @property \App\Model\Table\TypesOdssTable $TypesOdss
 *
 * @method \App\Model\Entity\TypesOds[] paginate($object = null, array $settings = [])
 */
class TypesOdssController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesOdss = $this->paginate($this->TypesOdss);

        $this->set(compact('typesOdss'));
        $this->set('_serialize', ['typesOdss']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Ods id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesOds = $this->TypesOdss->get($id, [
            'contain' => []
        ]);

        $this->set('typesOds', $typesOds);
        $this->set('_serialize', ['typesOds']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesOds = $this->TypesOdss->newEntity();
        if ($this->request->is('post')) {
            $typesOds = $this->TypesOdss->patchEntity($typesOds, $this->request->data);
            if ($this->TypesOdss->save($typesOds)) {
               // $this->Flash->success(__('The {0} has been saved.', 'Types Ods'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Ods'));
            }
        }
        $this->set(compact('typesOds'));
        $this->set('_serialize', ['typesOds']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Ods id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesOds = $this->TypesOdss->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesOds = $this->TypesOdss->patchEntity($typesOds, $this->request->data);
            if ($this->TypesOdss->save($typesOds)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Ods'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Ods'));
            }
        }
        $this->set(compact('typesOds'));
        $this->set('_serialize', ['typesOds']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Ods id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesOds = $this->TypesOdss->get($id);
        if ($this->TypesOdss->delete($typesOds)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Ods'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Ods'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
