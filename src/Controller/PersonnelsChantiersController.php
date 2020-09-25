<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PersonnelsChantiers Controller
 *
 * @property \App\Model\Table\PersonnelsChantiersTable $PersonnelsChantiers
 *
 * @method \App\Model\Entity\PersonnelsChantier[] paginate($object = null, array $settings = [])
 */
class PersonnelsChantiersController extends AppController
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
        $personnelsChantiers = $this->paginate($this->PersonnelsChantiers);

        $this->set(compact('personnelsChantiers'));
        $this->set('_serialize', ['personnelsChantiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Personnels Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personnelsChantier = $this->PersonnelsChantiers->get($id, [
            'contain' => ['Personnels']
        ]);

        $this->set('personnelsChantier', $personnelsChantier);
        $this->set('_serialize', ['personnelsChantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personnelsChantier = $this->PersonnelsChantiers->newEntity();
        if ($this->request->is('post')) {
            $personnelsChantier = $this->PersonnelsChantiers->patchEntity($personnelsChantier, $this->request->data);
            if ($this->PersonnelsChantiers->save($personnelsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Personnels Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personnels Chantier'));
            }
        }
        $personnels = $this->PersonnelsChantiers->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('personnelsChantier', 'personnels'));
        $this->set('_serialize', ['personnelsChantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Personnels Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personnelsChantier = $this->PersonnelsChantiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personnelsChantier = $this->PersonnelsChantiers->patchEntity($personnelsChantier, $this->request->data);
            if ($this->PersonnelsChantiers->save($personnelsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Personnels Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personnels Chantier'));
            }
        }
        $personnels = $this->PersonnelsChantiers->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('personnelsChantier', 'personnels'));
        $this->set('_serialize', ['personnelsChantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Personnels Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personnelsChantier = $this->PersonnelsChantiers->get($id);
        if ($this->PersonnelsChantiers->delete($personnelsChantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Personnels Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Personnels Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
