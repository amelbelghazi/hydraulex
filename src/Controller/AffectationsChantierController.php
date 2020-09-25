<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AffectationsChantier Controller
 *
 * @property \App\Model\Table\AffectationsChantierTable $AffectationsChantier
 *
 * @method \App\Model\Entity\AffectationsChantier[] paginate($object = null, array $settings = [])
 */
class AffectationsChantierController extends AppController
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
        $affectationsChantier = $this->paginate($this->AffectationsChantier);

        $this->set(compact('affectationsChantier'));
        $this->set('_serialize', ['affectationsChantier']);
    }

    /**
     * View method
     *
     * @param string|null $id Affectations Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $affectationsChantier = $this->AffectationsChantier->get($id, [
            'contain' => ['Personnels', 'Affectations', 'Chantiers', 'Departements']
        ]);

        $this->set('affectationsChantier', $affectationsChantier);
        $this->set('_serialize', ['affectationsChantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $affectationsChantier = $this->AffectationsChantier->newEntity();
        if ($this->request->is('post')) {
            $affectationsChantier = $this->AffectationsChantier->patchEntity($affectationsChantier, $this->request->data);
            if ($this->AffectationsChantier->save($affectationsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Affectations Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Affectations Chantier'));
            }
        }
        $personnels = $this->AffectationsChantier->Personnels->find('list', ['limit' => 200]);
        $affectations = $this->AffectationsChantier->Affectations->find('list', ['limit' => 200]);
        $chantiers = $this->AffectationsChantier->Chantiers->find('list', ['limit' => 200]);
        $departements = $this->AffectationsChantier->Departements->find('list', ['limit' => 200]);
        $this->set(compact('affectationsChantier', 'personnels', 'affectations', 'chantiers', 'departements'));
        $this->set('_serialize', ['affectationsChantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Affectations Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $affectationsChantier = $this->AffectationsChantier->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $affectationsChantier = $this->AffectationsChantier->patchEntity($affectationsChantier, $this->request->data);
            if ($this->AffectationsChantier->save($affectationsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Affectations Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Affectations Chantier'));
            }
        }
        $personnels = $this->AffectationsChantier->Personnels->find('list', ['limit' => 200]);
        $affectations = $this->AffectationsChantier->Affectations->find('list', ['limit' => 200]);
        $chantiers = $this->AffectationsChantier->Chantiers->find('list', ['limit' => 200]);
        $departements = $this->AffectationsChantier->Departements->find('list', ['limit' => 200]);
        $this->set(compact('affectationsChantier', 'personnels', 'affectations', 'chantiers', 'departements'));
        $this->set('_serialize', ['affectationsChantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Affectations Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $affectationsChantier = $this->AffectationsChantier->get($id);
        if ($this->AffectationsChantier->delete($affectationsChantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Affectations Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Affectations Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
