<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContratsSoustraitant Controller
 *
 * @property \App\Model\Table\ContratsSoustraitantTable $ContratsSoustraitant
 *
 * @method \App\Model\Entity\ContratsSoustraitant[] paginate($object = null, array $settings = [])
 */
class ContratsSoustraitantController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contrats', 'ProjetSoustraitants']
        ];
        $contratsSoustraitant = $this->paginate($this->ContratsSoustraitant);

        $this->set(compact('contratsSoustraitant'));
        $this->set('_serialize', ['contratsSoustraitant']);
    }

    /**
     * View method
     *
     * @param string|null $id Contrats Soustraitant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contratsSoustraitant = $this->ContratsSoustraitant->get($id, [
            'contain' => ['Contrats', 'ProjetSoustraitants']
        ]);

        $this->set('contratsSoustraitant', $contratsSoustraitant);
        $this->set('_serialize', ['contratsSoustraitant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contratsSoustraitant = $this->ContratsSoustraitant->newEntity();
        if ($this->request->is('post')) {
            $contratsSoustraitant = $this->ContratsSoustraitant->patchEntity($contratsSoustraitant, $this->request->data);
            if ($this->ContratsSoustraitant->save($contratsSoustraitant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contrats Soustraitant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contrats Soustraitant'));
            }
        }
        $contrats = $this->ContratsSoustraitant->Contrats->find('list', ['limit' => 200]);
        $projetSoustraitants = $this->ContratsSoustraitant->ProjetSoustraitants->find('list', ['limit' => 200]);
        $this->set(compact('contratsSoustraitant', 'contrats', 'projetSoustraitants'));
        $this->set('_serialize', ['contratsSoustraitant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contrats Soustraitant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contratsSoustraitant = $this->ContratsSoustraitant->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contratsSoustraitant = $this->ContratsSoustraitant->patchEntity($contratsSoustraitant, $this->request->data);
            if ($this->ContratsSoustraitant->save($contratsSoustraitant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contrats Soustraitant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contrats Soustraitant'));
            }
        }
        $contrats = $this->ContratsSoustraitant->Contrats->find('list', ['limit' => 200]);
        $projetSoustraitants = $this->ContratsSoustraitant->ProjetSoustraitants->find('list', ['limit' => 200]);
        $this->set(compact('contratsSoustraitant', 'contrats', 'projetSoustraitants'));
        $this->set('_serialize', ['contratsSoustraitant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contrats Soustraitant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contratsSoustraitant = $this->ContratsSoustraitant->get($id);
        if ($this->ContratsSoustraitant->delete($contratsSoustraitant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Contrats Soustraitant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Contrats Soustraitant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
