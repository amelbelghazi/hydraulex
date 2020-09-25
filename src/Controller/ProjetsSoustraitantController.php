<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjetsSoustraitant Controller
 *
 * @property \App\Model\Table\ProjetsSoustraitantTable $ProjetsSoustraitant
 *
 * @method \App\Model\Entity\ProjetsSoustraitant[] paginate($object = null, array $settings = [])
 */
class ProjetsSoustraitantController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Marches', 'Soustraitants']
        ];
        $projetsSoustraitant = $this->paginate($this->ProjetsSoustraitant);

        $this->set(compact('projetsSoustraitant'));
        $this->set('_serialize', ['projetsSoustraitant']);
    }

    /**
     * View method
     *
     * @param string|null $id Projets Soustraitant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projetsSoustraitant = $this->ProjetsSoustraitant->get($id, [
            'contain' => ['Marches', 'Soustraitants']
        ]);

        $this->set('projetsSoustraitant', $projetsSoustraitant);
        $this->set('_serialize', ['projetsSoustraitant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projetsSoustraitant = $this->ProjetsSoustraitant->newEntity();
        if ($this->request->is('post')) {
            $projetsSoustraitant = $this->ProjetsSoustraitant->patchEntity($projetsSoustraitant, $this->request->data);
            if ($this->ProjetsSoustraitant->save($projetsSoustraitant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Projets Soustraitant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Projets Soustraitant'));
            }
        }
        $marches = $this->ProjetsSoustraitant->Marches->find('list', ['limit' => 200]);
        $soustraitants = $this->ProjetsSoustraitant->Soustraitants->find('list', ['limit' => 200]);
        $this->set(compact('projetsSoustraitant', 'marches', 'soustraitants'));
        $this->set('_serialize', ['projetsSoustraitant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Projets Soustraitant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projetsSoustraitant = $this->ProjetsSoustraitant->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projetsSoustraitant = $this->ProjetsSoustraitant->patchEntity($projetsSoustraitant, $this->request->data);
            if ($this->ProjetsSoustraitant->save($projetsSoustraitant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Projets Soustraitant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Projets Soustraitant'));
            }
        }
        $marches = $this->ProjetsSoustraitant->Marches->find('list', ['limit' => 200]);
        $soustraitants = $this->ProjetsSoustraitant->Soustraitants->find('list', ['limit' => 200]);
        $this->set(compact('projetsSoustraitant', 'marches', 'soustraitants'));
        $this->set('_serialize', ['projetsSoustraitant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Projets Soustraitant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projetsSoustraitant = $this->ProjetsSoustraitant->get($id);
        if ($this->ProjetsSoustraitant->delete($projetsSoustraitant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Projets Soustraitant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Projets Soustraitant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
