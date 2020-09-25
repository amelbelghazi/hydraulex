<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EtatsContrats Controller
 *
 * @property \App\Model\Table\EtatsContratsTable $EtatsContrats
 *
 * @method \App\Model\Entity\EtatsContrat[] paginate($object = null, array $settings = [])
 */
class EtatsContratsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypesEtatsContrats', 'Etats']
        ];
        $etatsContrats = $this->paginate($this->EtatsContrats);

        $this->set(compact('etatsContrats'));
        $this->set('_serialize', ['etatsContrats']);
    }

    /**
     * View method
     *
     * @param string|null $id Etats Contrat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $etatsContrat = $this->EtatsContrats->get($id, [
            'contain' => ['TypesEtatsContrats', 'Etats', 'Contrats']
        ]);

        $this->set('etatsContrat', $etatsContrat);
        $this->set('_serialize', ['etatsContrat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $etatsContrat = $this->EtatsContrats->newEntity();
        if ($this->request->is('post')) {
            $etatsContrat = $this->EtatsContrats->patchEntity($etatsContrat, $this->request->data);
            if ($this->EtatsContrats->save($etatsContrat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Contrat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Contrat'));
            }
        }
        $typesEtatsContrats = $this->EtatsContrats->TypesEtatsContrats->find('list', ['limit' => 200]);
        $etats = $this->EtatsContrats->Etats->find('list', ['limit' => 200]);
        $this->set(compact('etatsContrat', 'typesEtatsContrats', 'etats'));
        $this->set('_serialize', ['etatsContrat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Etats Contrat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $etatsContrat = $this->EtatsContrats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $etatsContrat = $this->EtatsContrats->patchEntity($etatsContrat, $this->request->data);
            if ($this->EtatsContrats->save($etatsContrat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Etats Contrat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Etats Contrat'));
            }
        }
        $typesEtatsContrats = $this->EtatsContrats->TypesEtatsContrats->find('list', ['limit' => 200]);
        $etats = $this->EtatsContrats->Etats->find('list', ['limit' => 200]);
        $this->set(compact('etatsContrat', 'typesEtatsContrats', 'etats'));
        $this->set('_serialize', ['etatsContrat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Etats Contrat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $etatsContrat = $this->EtatsContrats->get($id);
        if ($this->EtatsContrats->delete($etatsContrat)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Etats Contrat'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Etats Contrat'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
