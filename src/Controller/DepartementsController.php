<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Departements Controller
 *
 * @property \App\Model\Table\DepartementsTable $Departements
 *
 * @method \App\Model\Entity\Departement[] paginate($object = null, array $settings = [])
 */
class DepartementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Societes']
        ];
        $departements = $this->paginate($this->Departements);

        $this->set(compact('departements'));
        $this->set('_serialize', ['departements']);
    }

    /**
     * View method
     *
     * @param string|null $id Departement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departement = $this->Departements->get($id, [
            'contain' => ['Societes', 'Achats', 'BonsCommandes', 'Depenses', 'Fournitures', 'PositionsAdministratives']
        ]);

        $this->set('departement', $departement);
        $this->set('_serialize', ['departement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Societes');
        $departement = $this->Departements->newEntity();
        if ($this->request->is('post')) {
            debug($this->request->data);
            $departement = $this->Departements->patchEntity($departement, $this->request->data);
            if ($this->Departements->save($departement)) {
                $this->Flash->success(__('Le {0} a bien été ajouté.', 'departement'));
                return $this->redirect(['controller' => 'Societes', 'action' => 'view', $departement->societe_id]);
            } else {
                $this->Flash->error(__('Le {0} n\'a pas pu être ajouté, veuillez réessayer', 'departement'));
            }
        }
        $departement->societe_id = $this->request->params['pass'][0];
        $id = $departement->societe_id;
        $societes = $this->Societes->get($id, [
            'contain' => []
        ]);
        $this->set(compact('departement', 'societes'));
        $this->set('_serialize', ['departement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Departement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $departement = $this->Departements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $departement = $this->Departements->patchEntity($departement, $this->request->data);
            if ($this->Departements->save($departement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Departement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Departement'));
            }
        }
        $societes = $this->Departements->Societes->find('list', ['limit' => 200]);
        $this->set(compact('departement', 'societes'));
        $this->set('_serialize', ['departement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $departement = $this->Departements->get($id);
        if ($this->Departements->delete($departement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Departement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Departement'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
