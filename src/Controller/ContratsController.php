<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contrats Controller
 *
 * @property \App\Model\Table\ContratsTable $Contrats
 *
 * @method \App\Model\Entity\Contrat[] paginate($object = null, array $settings = [])
 */
class ContratsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EtatsContrats']
        ];
        $contrats = $this->paginate($this->Contrats);

        $this->set(compact('contrats'));
        $this->set('_serialize', ['contrats']);
    }

    /**
     * View method
     *
     * @param string|null $id Contrat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contrat = $this->Contrats->get($id, [
            'contain' => ['EtatsContrats', 'Personnels', 'Etats', 'ContratsSoustraitant']
        ]);

        $this->set('contrat', $contrat);
        $this->set('_serialize', ['contrat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contrat = $this->Contrats->newEntity();
        if ($this->request->is('post')) {
            $contrat = $this->Contrats->patchEntity($contrat, $this->request->data);
            if ($this->Contrats->save($contrat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contrat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contrat'));
            }
        }
        $etatsContrats = $this->Contrats->EtatsContrats->find('list', ['limit' => 200]);
        $personnels = $this->Contrats->Personnels->find('list', ['limit' => 200]);
        $etats = $this->Contrats->Etats->find('list', ['limit' => 200]);
        $this->set(compact('contrat', 'etatsContrats', 'personnels', 'etats'));
        $this->set('_serialize', ['contrat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contrat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contrat = $this->Contrats->get($id, [
            'contain' => ['Personnels', 'Etats']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contrat = $this->Contrats->patchEntity($contrat, $this->request->data);
            if ($this->Contrats->save($contrat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contrat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contrat'));
            }
        }
        $etatsContrats = $this->Contrats->EtatsContrats->find('list', ['limit' => 200]);
        $personnels = $this->Contrats->Personnels->find('list', ['limit' => 200]);
        $etats = $this->Contrats->Etats->find('list', ['limit' => 200]);
        $this->set(compact('contrat', 'etatsContrats', 'personnels', 'etats'));
        $this->set('_serialize', ['contrat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contrat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contrat = $this->Contrats->get($id);
        if ($this->Contrats->delete($contrat)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Contrat'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Contrat'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
