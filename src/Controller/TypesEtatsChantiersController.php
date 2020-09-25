<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesEtatsChantiers Controller
 *
 * @property \App\Model\Table\TypesEtatsChantiersTable $TypesEtatsChantiers
 *
 * @method \App\Model\Entity\TypesEtatsChantier[] paginate($object = null, array $settings = [])
 */
class TypesEtatsChantiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesEtatsChantiers = $this->paginate($this->TypesEtatsChantiers);

        $this->set(compact('typesEtatsChantiers'));
        $this->set('_serialize', ['typesEtatsChantiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Etats Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesEtatsChantier = $this->TypesEtatsChantiers->get($id, [
            'contain' => ['EtatsChantiers']
        ]);

        $this->set('typesEtatsChantier', $typesEtatsChantier);
        $this->set('_serialize', ['typesEtatsChantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesEtatsChantier = $this->TypesEtatsChantiers->newEntity();
        if ($this->request->is('post')) {
            $typesEtatsChantier = $this->TypesEtatsChantiers->patchEntity($typesEtatsChantier, $this->request->data);
            if ($this->TypesEtatsChantiers->save($typesEtatsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Etats Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Etats Chantier'));
            }
        }
        $this->set(compact('typesEtatsChantier'));
        $this->set('_serialize', ['typesEtatsChantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Etats Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesEtatsChantier = $this->TypesEtatsChantiers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesEtatsChantier = $this->TypesEtatsChantiers->patchEntity($typesEtatsChantier, $this->request->data);
            if ($this->TypesEtatsChantiers->save($typesEtatsChantier)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Etats Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Etats Chantier'));
            }
        }
        $this->set(compact('typesEtatsChantier'));
        $this->set('_serialize', ['typesEtatsChantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Etats Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesEtatsChantier = $this->TypesEtatsChantiers->get($id);
        if ($this->TypesEtatsChantiers->delete($typesEtatsChantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Etats Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Etats Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
