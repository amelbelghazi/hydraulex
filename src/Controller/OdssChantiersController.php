<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OdssChantiers Controller
 *
 * @property \App\Model\Table\OdssChantiersTable $OdssChantiers
 *
 * @method \App\Model\Entity\OdssChantier[] paginate($object = null, array $settings = [])
 */
class OdssChantiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ODSs', 'Chantiers']
        ];
        $odssChantiers = $this->paginate($this->OdssChantiers);

        $this->set(compact('odssChantiers'));
        $this->set('_serialize', ['odssChantiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Odss Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $odssChantier = $this->OdssChantiers->get($id, [
            'contain' => ['ODSs', 'Chantiers']
        ]);

        $this->set('odssChantier', $odssChantier);
        $this->set('_serialize', ['odssChantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $odssChantier = $this->OdssChantiers->newEntity();
        if ($this->request->is('post')) {
            $odssChantier = $this->OdssChantiers->patchEntity($odssChantier, $this->request->data);
            if ($this->OdssChantiers->save($odssChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Odss Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Odss Chantier'));
            }
        }
        $oDSs = $this->OdssChantiers->ODSs->find('list', ['limit' => 200]);
        $chantiers = $this->OdssChantiers->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('odssChantier', 'oDSs', 'chantiers'));
        $this->set('_serialize', ['odssChantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Odss Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $odssChantier = $this->OdssChantiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $odssChantier = $this->OdssChantiers->patchEntity($odssChantier, $this->request->data);
            if ($this->OdssChantiers->save($odssChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Odss Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Odss Chantier'));
            }
        }
        $oDSs = $this->OdssChantiers->ODSs->find('list', ['limit' => 200]);
        $chantiers = $this->OdssChantiers->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('odssChantier', 'oDSs', 'chantiers'));
        $this->set('_serialize', ['odssChantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Odss Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $odssChantier = $this->OdssChantiers->get($id);
        if ($this->OdssChantiers->delete($odssChantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Odss Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Odss Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
