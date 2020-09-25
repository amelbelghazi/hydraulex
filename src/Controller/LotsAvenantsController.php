<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LotsAvenants Controller
 *
 * @property \App\Model\Table\LotsAvenantsTable $LotsAvenants
 *
 * @method \App\Model\Entity\LotsAvenant[] paginate($object = null, array $settings = [])
 */
class LotsAvenantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Avenants']
        ];
        $lotsAvenants = $this->paginate($this->LotsAvenants);

        $this->set(compact('lotsAvenants'));
        $this->set('_serialize', ['lotsAvenants']);
    }

    /**
     * View method
     *
     * @param string|null $id Lots Avenant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lotsAvenant = $this->LotsAvenants->get($id, [
            'contain' => ['Avenants', 'PartiesAvenants']
        ]);

        $this->set('lotsAvenant', $lotsAvenant);
        $this->set('_serialize', ['lotsAvenant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lotsAvenant = $this->LotsAvenants->newEntity();
        if ($this->request->is('post')) {
            $lotsAvenant = $this->LotsAvenants->patchEntity($lotsAvenant, $this->request->data);
            if ($this->LotsAvenants->save($lotsAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Lots Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Lots Avenant'));
            }
        }
        $avenants = $this->LotsAvenants->Avenants->find('list', ['limit' => 200]);
        $this->set(compact('lotsAvenant', 'avenants'));
        $this->set('_serialize', ['lotsAvenant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lots Avenant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lotsAvenant = $this->LotsAvenants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lotsAvenant = $this->LotsAvenants->patchEntity($lotsAvenant, $this->request->data);
            if ($this->LotsAvenants->save($lotsAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Lots Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Lots Avenant'));
            }
        }
        $avenants = $this->LotsAvenants->Avenants->find('list', ['limit' => 200]);
        $this->set(compact('lotsAvenant', 'avenants'));
        $this->set('_serialize', ['lotsAvenant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lots Avenant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lotsAvenant = $this->LotsAvenants->get($id);
        if ($this->LotsAvenants->delete($lotsAvenant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Lots Avenant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Lots Avenant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
