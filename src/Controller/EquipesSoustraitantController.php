<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EquipesSoustraitant Controller
 *
 * @property \App\Model\Table\EquipesSoustraitantTable $EquipesSoustraitant
 *
 * @method \App\Model\Entity\EquipesSoustraitant[] paginate($object = null, array $settings = [])
 */
class EquipesSoustraitantController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Equipes', 'ProjetSoustraitants']
        ];
        $equipesSoustraitant = $this->paginate($this->EquipesSoustraitant);

        $this->set(compact('equipesSoustraitant'));
        $this->set('_serialize', ['equipesSoustraitant']);
    }

    /**
     * View method
     *
     * @param string|null $id Equipes Soustraitant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipesSoustraitant = $this->EquipesSoustraitant->get($id, [
            'contain' => ['Equipes', 'ProjetSoustraitants']
        ]);

        $this->set('equipesSoustraitant', $equipesSoustraitant);
        $this->set('_serialize', ['equipesSoustraitant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipesSoustraitant = $this->EquipesSoustraitant->newEntity();
        if ($this->request->is('post')) {
            $equipesSoustraitant = $this->EquipesSoustraitant->patchEntity($equipesSoustraitant, $this->request->data);
            if ($this->EquipesSoustraitant->save($equipesSoustraitant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Equipes Soustraitant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Equipes Soustraitant'));
            }
        }
        $equipes = $this->EquipesSoustraitant->Equipes->find('list', ['limit' => 200]);
        $projetSoustraitants = $this->EquipesSoustraitant->ProjetSoustraitants->find('list', ['limit' => 200]);
        $this->set(compact('equipesSoustraitant', 'equipes', 'projetSoustraitants'));
        $this->set('_serialize', ['equipesSoustraitant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipes Soustraitant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipesSoustraitant = $this->EquipesSoustraitant->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipesSoustraitant = $this->EquipesSoustraitant->patchEntity($equipesSoustraitant, $this->request->data);
            if ($this->EquipesSoustraitant->save($equipesSoustraitant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Equipes Soustraitant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Equipes Soustraitant'));
            }
        }
        $equipes = $this->EquipesSoustraitant->Equipes->find('list', ['limit' => 200]);
        $projetSoustraitants = $this->EquipesSoustraitant->ProjetSoustraitants->find('list', ['limit' => 200]);
        $this->set(compact('equipesSoustraitant', 'equipes', 'projetSoustraitants'));
        $this->set('_serialize', ['equipesSoustraitant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipes Soustraitant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipesSoustraitant = $this->EquipesSoustraitant->get($id);
        if ($this->EquipesSoustraitant->delete($equipesSoustraitant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Equipes Soustraitant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Equipes Soustraitant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
