<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Gardiens Controller
 *
 * @property \App\Model\Table\GardiensTable $Gardiens
 *
 * @method \App\Model\Entity\Gardien[] paginate($object = null, array $settings = [])
 */
class GardiensController extends AppController
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
        $gardiens = $this->paginate($this->Gardiens);

        $this->set(compact('gardiens'));
        $this->set('_serialize', ['gardiens']);
    }

    /**
     * View method
     *
     * @param string|null $id Gardien id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gardien = $this->Gardiens->get($id, [
            'contain' => ['Personnels', 'Parcs']
        ]);

        $this->set('gardien', $gardien);
        $this->set('_serialize', ['gardien']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gardien = $this->Gardiens->newEntity();
        if ($this->request->is('post')) {
            $gardien = $this->Gardiens->patchEntity($gardien, $this->request->data);
            if ($this->Gardiens->save($gardien)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gardien'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gardien'));
            }
        }
        $personnels = $this->Gardiens->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('gardien', 'personnels'));
        $this->set('_serialize', ['gardien']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gardien id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gardien = $this->Gardiens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gardien = $this->Gardiens->patchEntity($gardien, $this->request->data);
            if ($this->Gardiens->save($gardien)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gardien'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gardien'));
            }
        }
        $personnels = $this->Gardiens->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('gardien', 'personnels'));
        $this->set('_serialize', ['gardien']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gardien id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gardien = $this->Gardiens->get($id);
        if ($this->Gardiens->delete($gardien)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Gardien'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Gardien'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
