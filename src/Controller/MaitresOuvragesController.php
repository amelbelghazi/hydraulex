<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaitresOuvrages Controller
 *
 * @property \App\Model\Table\MaitresOuvragesTable $MaitresOuvrages
 *
 * @method \App\Model\Entity\MaitresOuvrage[] paginate($object = null, array $settings = [])
 */
class MaitresOuvragesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $maitresOuvrages = $this->paginate($this->MaitresOuvrages);

        $this->set(compact('maitresOuvrages'));
        $this->set('_serialize', ['maitresOuvrages']);
    }

    /**
     * View method
     *
     * @param string|null $id Maitres Ouvrage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maitresOuvrage = $this->MaitresOuvrages->get($id, [
            'contain' => []
        ]);

        $this->set('maitresOuvrage', $maitresOuvrage);
        $this->set('_serialize', ['maitresOuvrage']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maitresOuvrage = $this->MaitresOuvrages->newEntity();
        if ($this->request->is('post')) {
            $maitresOuvrage = $this->MaitresOuvrages->patchEntity($maitresOuvrage, $this->request->data);
            if ($this->MaitresOuvrages->save($maitresOuvrage)) {
                $this->Flash->success(__('The {0} has been saved.', 'Maitres Ouvrage'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Maitres Ouvrage'));
            }
        }
        $this->set(compact('maitresOuvrage'));
        $this->set('_serialize', ['maitresOuvrage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Maitres Ouvrage id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maitresOuvrage = $this->MaitresOuvrages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maitresOuvrage = $this->MaitresOuvrages->patchEntity($maitresOuvrage, $this->request->data);
            if ($this->MaitresOuvrages->save($maitresOuvrage)) {
                $this->Flash->success(__('The {0} has been saved.', 'Maitres Ouvrage'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Maitres Ouvrage'));
            }
        }
        $this->set(compact('maitresOuvrage'));
        $this->set('_serialize', ['maitresOuvrage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Maitres Ouvrage id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maitresOuvrage = $this->MaitresOuvrages->get($id);
        if ($this->MaitresOuvrages->delete($maitresOuvrage)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Maitres Ouvrage'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Maitres Ouvrage'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
