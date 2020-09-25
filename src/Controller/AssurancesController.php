<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Assurances Controller
 *
 * @property \App\Model\Table\AssurancesTable $Assurances
 *
 * @method \App\Model\Entity\Assurance[] paginate($object = null, array $settings = [])
 */
class AssurancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypesAssurances']
        ];
        $assurances = $this->paginate($this->Assurances);

        $this->set(compact('assurances'));
        $this->set('_serialize', ['assurances']);
    }

    /**
     * View method
     *
     * @param string|null $id Assurance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assurance = $this->Assurances->get($id, [
            'contain' => ['TypesAssurances', 'Personnels']
        ]);

        $this->set('assurance', $assurance);
        $this->set('_serialize', ['assurance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $assurance = $this->Assurances->newEntity();
        if ($this->request->is('post')) {
            $assurance = $this->Assurances->patchEntity($assurance, $this->request->data);
            if ($this->Assurances->save($assurance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assurance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assurance'));
            }
        }
        $typesAssurances = $this->Assurances->TypesAssurances->find('list', ['limit' => 200]);
        $personnels = $this->Assurances->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('assurance', 'typesAssurances', 'personnels'));
        $this->set('_serialize', ['assurance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Assurance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assurance = $this->Assurances->get($id, [
            'contain' => ['Personnels']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assurance = $this->Assurances->patchEntity($assurance, $this->request->data);
            if ($this->Assurances->save($assurance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Assurance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Assurance'));
            }
        }
        $typesAssurances = $this->Assurances->TypesAssurances->find('list', ['limit' => 200]);
        $personnels = $this->Assurances->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('assurance', 'typesAssurances', 'personnels'));
        $this->set('_serialize', ['assurance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Assurance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assurance = $this->Assurances->get($id);
        if ($this->Assurances->delete($assurance)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Assurance'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Assurance'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
