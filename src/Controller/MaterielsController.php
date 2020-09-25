<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Materiels Controller
 *
 * @property \App\Model\Table\MaterielsTable $Materiels
 *
 * @method \App\Model\Entity\Materiel[] paginate($object = null, array $settings = [])
 */
class MaterielsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ressources']
        ];
        $materiels = $this->paginate($this->Materiels);

        $this->set(compact('materiels'));
        $this->set('_serialize', ['materiels']);
    }

    /**
     * View method
     *
     * @param string|null $id Materiel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materiel = $this->Materiels->get($id, [
            'contain' => ['Ressources', 'ReparationsMateriel']
        ]);

        $this->set('materiel', $materiel);
        $this->set('_serialize', ['materiel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materiel = $this->Materiels->newEntity();
        if ($this->request->is('post')) {
            $materiel = $this->Materiels->patchEntity($materiel, $this->request->data);
            if ($this->Materiels->save($materiel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Materiel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Materiel'));
            }
        }
        $ressources = $this->Materiels->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('materiel', 'ressources'));
        $this->set('_serialize', ['materiel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Materiel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materiel = $this->Materiels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materiel = $this->Materiels->patchEntity($materiel, $this->request->data);
            if ($this->Materiels->save($materiel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Materiel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Materiel'));
            }
        }
        $ressources = $this->Materiels->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('materiel', 'ressources'));
        $this->set('_serialize', ['materiel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Materiel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materiel = $this->Materiels->get($id);
        if ($this->Materiels->delete($materiel)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Materiel'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Materiel'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
