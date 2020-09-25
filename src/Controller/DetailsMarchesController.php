<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetailsMarches Controller
 *
 * @property \App\Model\Table\DetailsMarchesTable $DetailsMarches
 *
 * @method \App\Model\Entity\Detailsmarche[] paginate($object = null, array $settings = [])
 */
class DetailsMarchesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Marches', 'Avenants']
        ];
        $detailsMarches = $this->paginate($this->DetailsMarches);

        $this->set(compact('detailsMarches'));
        $this->set('_serialize', ['detailsMarches']);
    }

    /**
     * View method
     *
     * @param string|null $id Detailsmarche id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsmarche = $this->DetailsMarches->get($id, [
            'contain' => ['Marches', 'Avenants']
        ]);

        $this->set('detailsmarche', $detailsmarche);
        $this->set('_serialize', ['detailsmarche']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsmarche = $this->DetailsMarches->newEntity();
        if ($this->request->is('post')) {
            $detailsmarche = $this->DetailsMarches->patchEntity($detailsmarche, $this->request->data);
            if ($this->DetailsMarches->save($detailsmarche)) {
                $this->Flash->success(__('The {0} has been saved.', 'Detailsmarche'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Detailsmarche'));
            }
        }
        $marches = $this->DetailsMarches->Marches->find('list', ['limit' => 200]);
        $avenants = $this->DetailsMarches->Avenants->find('list', ['limit' => 200]);
        $this->set(compact('detailsmarche', 'marches', 'avenants'));
        $this->set('_serialize', ['detailsmarche']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Detailsmarche id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsmarche = $this->DetailsMarches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsmarche = $this->DetailsMarches->patchEntity($detailsmarche, $this->request->data);
            if ($this->DetailsMarches->save($detailsmarche)) {
                $this->Flash->success(__('The {0} has been saved.', 'Detailsmarche'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Detailsmarche'));
            }
        }
        $marches = $this->DetailsMarches->Marches->find('list', ['limit' => 200]);
        $avenants = $this->DetailsMarches->Avenants->find('list', ['limit' => 200]);
        $this->set(compact('detailsmarche', 'marches', 'avenants'));
        $this->set('_serialize', ['detailsmarche']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Detailsmarche id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsmarche = $this->DetailsMarches->get($id);
        if ($this->DetailsMarches->delete($detailsmarche)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Detailsmarche'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Detailsmarche'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
