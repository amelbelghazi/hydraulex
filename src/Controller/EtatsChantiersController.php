<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EtatsChantiers Controller
 *
 * @property \App\Model\Table\EtatsChantiersTable $EtatsChantiers
 *
 * @method \App\Model\Entity\EtatsChantier[] paginate($object = null, array $settings = [])
 */
class EtatsChantiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypesEtatsChantiers']
        ];
        $etatsChantiers = $this->paginate($this->EtatsChantiers);

        $this->set(compact('etatsChantiers'));
        $this->set('_serialize', ['etatsChantiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Etats Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etatsChantier = $this->EtatsChantiers->get($id, [
            'contain' => ['TypesEtatsChantiers']
        ]);

        $this->set('etatsChantier', $etatsChantier);
        $this->set('_serialize', ['etatsChantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etatsChantier = $this->EtatsChantiers->newEntity();
        if ($this->request->is('post')) {
            $etatsChantier = $this->EtatsChantiers->patchEntity($etatsChantier, $this->request->data);
            if ($this->EtatsChantiers->save($etatsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Chantier'));
            }
        }
        $typesEtatsChantiers = $this->EtatsChantiers->TypesEtatsChantiers->find('list', ['limit' => 200]);
        $this->set(compact('etatsChantier', 'typesEtatsChantiers'));
        $this->set('_serialize', ['etatsChantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etats Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etatsChantier = $this->EtatsChantiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etatsChantier = $this->EtatsChantiers->patchEntity($etatsChantier, $this->request->data);
            if ($this->EtatsChantiers->save($etatsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Chantier'));
            }
        }
        $typesEtatsChantiers = $this->EtatsChantiers->TypesEtatsChantiers->find('list', ['limit' => 200]);
        $this->set(compact('etatsChantier', 'typesEtatsChantiers'));
        $this->set('_serialize', ['etatsChantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etats Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etatsChantier = $this->EtatsChantiers->get($id);
        if ($this->EtatsChantiers->delete($etatsChantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Etats Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Etats Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
