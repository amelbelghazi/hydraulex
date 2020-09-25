<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesAvertissement Controller
 *
 * @property \App\Model\Table\TypesAvertissementTable $TypesAvertissement
 *
 * @method \App\Model\Entity\TypesAvertissement[] paginate($object = null, array $settings = [])
 */
class TypesAvertissementController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesAvertissement = $this->paginate($this->TypesAvertissement);

        $this->set(compact('typesAvertissement'));
        $this->set('_serialize', ['typesAvertissement']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Avertissement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesAvertissement = $this->TypesAvertissement->get($id, [
            'contain' => []
        ]);

        $this->set('typesAvertissement', $typesAvertissement);
        $this->set('_serialize', ['typesAvertissement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesAvertissement = $this->TypesAvertissement->newEntity();
        if ($this->request->is('post')) {
            $typesAvertissement = $this->TypesAvertissement->patchEntity($typesAvertissement, $this->request->data);
            if ($this->TypesAvertissement->save($typesAvertissement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Avertissement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Avertissement'));
            }
        }
        $this->set(compact('typesAvertissement'));
        $this->set('_serialize', ['typesAvertissement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Avertissement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesAvertissement = $this->TypesAvertissement->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesAvertissement = $this->TypesAvertissement->patchEntity($typesAvertissement, $this->request->data);
            if ($this->TypesAvertissement->save($typesAvertissement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Avertissement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Avertissement'));
            }
        }
        $this->set(compact('typesAvertissement'));
        $this->set('_serialize', ['typesAvertissement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Avertissement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesAvertissement = $this->TypesAvertissement->get($id);
        if ($this->TypesAvertissement->delete($typesAvertissement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Avertissement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Avertissement'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
