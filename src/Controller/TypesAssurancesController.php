<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesAssurances Controller
 *
 * @property \App\Model\Table\TypesAssurancesTable $TypesAssurances
 *
 * @method \App\Model\Entity\TypesAssurance[] paginate($object = null, array $settings = [])
 */
class TypesAssurancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesAssurances = $this->paginate($this->TypesAssurances);

        $this->set(compact('typesAssurances'));
        $this->set('_serialize', ['typesAssurances']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Assurance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesAssurance = $this->TypesAssurances->get($id, [
            'contain' => ['Assurances']
        ]);

        $this->set('typesAssurance', $typesAssurance);
        $this->set('_serialize', ['typesAssurance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesAssurance = $this->TypesAssurances->newEntity();
        if ($this->request->is('post')) {
            $typesAssurance = $this->TypesAssurances->patchEntity($typesAssurance, $this->request->data);
            if ($this->TypesAssurances->save($typesAssurance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Assurance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Assurance'));
            }
        }
        $this->set(compact('typesAssurance'));
        $this->set('_serialize', ['typesAssurance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Assurance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesAssurance = $this->TypesAssurances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesAssurance = $this->TypesAssurances->patchEntity($typesAssurance, $this->request->data);
            if ($this->TypesAssurances->save($typesAssurance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Assurance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Assurance'));
            }
        }
        $this->set(compact('typesAssurance'));
        $this->set('_serialize', ['typesAssurance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Assurance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesAssurance = $this->TypesAssurances->get($id);
        if ($this->TypesAssurances->delete($typesAssurance)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Assurance'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Assurance'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
