<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AffectationsAdministration Controller
 *
 * @property \App\Model\Table\AffectationsAdministrationTable $AffectationsAdministration
 *
 * @method \App\Model\Entity\AffectationsAdministration[] paginate($object = null, array $settings = [])
 */
class AffectationsAdministrationController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels', 'Affectations', 'Chantiers', 'Departements']
        ];
        $affectationsAdministration = $this->paginate($this->AffectationsAdministration);

        $this->set(compact('affectationsAdministration'));
        $this->set('_serialize', ['affectationsAdministration']);
    }

    /**
     * View method
     *
     * @param string|null $id Affectations Administration id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $affectationsAdministration = $this->AffectationsAdministration->get($id, [
            'contain' => ['Personnels', 'Affectations', 'Chantiers', 'Departements']
        ]);

        $this->set('affectationsAdministration', $affectationsAdministration);
        $this->set('_serialize', ['affectationsAdministration']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $affectationsAdministration = $this->AffectationsAdministration->newEntity();
        if ($this->request->is('post')) {
            $affectationsAdministration = $this->AffectationsAdministration->patchEntity($affectationsAdministration, $this->request->data);
            if ($this->AffectationsAdministration->save($affectationsAdministration)) {
                $this->Flash->success(__('The {0} has been saved.', 'Affectations Administration'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Affectations Administration'));
            }
        }
        $personnels = $this->AffectationsAdministration->Personnels->find('list', ['limit' => 200]);
        $affectations = $this->AffectationsAdministration->Affectations->find('list', ['limit' => 200]);
        $chantiers = $this->AffectationsAdministration->Chantiers->find('list', ['limit' => 200]);
        $departements = $this->AffectationsAdministration->Departements->find('list', ['limit' => 200]);
        $this->set(compact('affectationsAdministration', 'personnels', 'affectations', 'chantiers', 'departements'));
        $this->set('_serialize', ['affectationsAdministration']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Affectations Administration id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $affectationsAdministration = $this->AffectationsAdministration->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $affectationsAdministration = $this->AffectationsAdministration->patchEntity($affectationsAdministration, $this->request->data);
            if ($this->AffectationsAdministration->save($affectationsAdministration)) {
                $this->Flash->success(__('The {0} has been saved.', 'Affectations Administration'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Affectations Administration'));
            }
        }
        $personnels = $this->AffectationsAdministration->Personnels->find('list', ['limit' => 200]);
        $affectations = $this->AffectationsAdministration->Affectations->find('list', ['limit' => 200]);
        $chantiers = $this->AffectationsAdministration->Chantiers->find('list', ['limit' => 200]);
        $departements = $this->AffectationsAdministration->Departements->find('list', ['limit' => 200]);
        $this->set(compact('affectationsAdministration', 'personnels', 'affectations', 'chantiers', 'departements'));
        $this->set('_serialize', ['affectationsAdministration']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Affectations Administration id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $affectationsAdministration = $this->AffectationsAdministration->get($id);
        if ($this->AffectationsAdministration->delete($affectationsAdministration)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Affectations Administration'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Affectations Administration'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
