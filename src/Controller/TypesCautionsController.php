<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesCautions Controller
 *
 * @property \App\Model\Table\TypesCautionsTable $TypesCautions
 *
 * @method \App\Model\Entity\TypesCaution[] paginate($object = null, array $settings = [])
 */
class TypesCautionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesCautions = $this->paginate($this->TypesCautions);

        $this->set(compact('typesCautions'));
        $this->set('_serialize', ['typesCautions']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Caution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesCaution = $this->TypesCautions->get($id, [
            'contain' => ['Cautions']
        ]);

        $this->set('typesCaution', $typesCaution);
        $this->set('_serialize', ['typesCaution']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesCaution = $this->TypesCautions->newEntity();
        if ($this->request->is('post')) {
            $typesCaution = $this->TypesCautions->patchEntity($typesCaution, $this->request->data);
            if ($this->TypesCautions->save($typesCaution)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Caution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Caution'));
            }
        }
        $this->set(compact('typesCaution'));
        $this->set('_serialize', ['typesCaution']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Caution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesCaution = $this->TypesCautions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesCaution = $this->TypesCautions->patchEntity($typesCaution, $this->request->data);
            if ($this->TypesCautions->save($typesCaution)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Caution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Caution'));
            }
        }
        $this->set(compact('typesCaution'));
        $this->set('_serialize', ['typesCaution']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Caution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesCaution = $this->TypesCautions->get($id);
        if ($this->TypesCautions->delete($typesCaution)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Caution'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Caution'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
