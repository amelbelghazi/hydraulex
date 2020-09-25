<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EtatsMarches Controller
 *
 * @property \App\Model\Table\EtatsMarchesTable $EtatsMarches
 *
 * @method \App\Model\Entity\Etatsmarche[] paginate($object = null, array $settings = [])
 */
class EtatsMarchesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Marches', 'ODSs', 'Etats']
        ];
        $etatsMarches = $this->paginate($this->EtatsMarches);

        $this->set(compact('etatsMarches'));
        $this->set('_serialize', ['etatsMarches']);
    }

    /**
     * View method
     *
     * @param string|null $id Etatsmarche id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etatsmarche = $this->EtatsMarches->get($id, [
            'contain' => ['Marches', 'ODSs', 'Etats']
        ]);

        $this->set('etatsmarche', $etatsmarche);
        $this->set('_serialize', ['etatsmarche']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etatsmarche = $this->EtatsMarches->newEntity();
        if ($this->request->is('post')) {
            $etatsmarche = $this->EtatsMarches->patchEntity($etatsmarche, $this->request->data);
            if ($this->EtatsMarches->save($etatsmarche)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etatsmarche'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etatsmarche'));
            }
        }
        $marches = $this->EtatsMarches->Marches->find('list', ['limit' => 200]);
        $oDSs = $this->EtatsMarches->ODSs->find('list', ['limit' => 200]);
        $etats = $this->EtatsMarches->Etats->find('list', ['limit' => 200]);
        $this->set(compact('etatsmarche', 'marches', 'oDSs', 'etats'));
        $this->set('_serialize', ['etatsmarche']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etatsmarche id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etatsmarche = $this->EtatsMarches->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etatsmarche = $this->EtatsMarches->patchEntity($etatsmarche, $this->request->data);
            if ($this->EtatsMarches->save($etatsmarche)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etatsmarche'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etatsmarche'));
            }
        }
        $marches = $this->EtatsMarches->Marches->find('list', ['limit' => 200]);
        $oDSs = $this->EtatsMarches->ODSs->find('list', ['limit' => 200]);
        $etats = $this->EtatsMarches->Etats->find('list', ['limit' => 200]);
        $this->set(compact('etatsmarche', 'marches', 'oDSs', 'etats'));
        $this->set('_serialize', ['etatsmarche']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etatsmarche id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etatsmarche = $this->EtatsMarches->get($id);
        if ($this->EtatsMarches->delete($etatsmarche)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Etatsmarche'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Etatsmarche'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
