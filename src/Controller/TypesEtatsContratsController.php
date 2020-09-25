<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesEtatsContrats Controller
 *
 * @property \App\Model\Table\TypesEtatsContratsTable $TypesEtatsContrats
 *
 * @method \App\Model\Entity\TypesEtatsContrat[] paginate($object = null, array $settings = [])
 */
class TypesEtatsContratsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesEtatsContrats = $this->paginate($this->TypesEtatsContrats);

        $this->set(compact('typesEtatsContrats'));
        $this->set('_serialize', ['typesEtatsContrats']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Etats Contrat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesEtatsContrat = $this->TypesEtatsContrats->get($id, [
            'contain' => ['EtatsContrats']
        ]);

        $this->set('typesEtatsContrat', $typesEtatsContrat);
        $this->set('_serialize', ['typesEtatsContrat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesEtatsContrat = $this->TypesEtatsContrats->newEntity();
        if ($this->request->is('post')) {
            $typesEtatsContrat = $this->TypesEtatsContrats->patchEntity($typesEtatsContrat, $this->request->data);
            if ($this->TypesEtatsContrats->save($typesEtatsContrat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Etats Contrat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Etats Contrat'));
            }
        }
        $this->set(compact('typesEtatsContrat'));
        $this->set('_serialize', ['typesEtatsContrat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Etats Contrat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesEtatsContrat = $this->TypesEtatsContrats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesEtatsContrat = $this->TypesEtatsContrats->patchEntity($typesEtatsContrat, $this->request->data);
            if ($this->TypesEtatsContrats->save($typesEtatsContrat)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Etats Contrat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Etats Contrat'));
            }
        }
        $this->set(compact('typesEtatsContrat'));
        $this->set('_serialize', ['typesEtatsContrat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Etats Contrat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesEtatsContrat = $this->TypesEtatsContrats->get($id);
        if ($this->TypesEtatsContrats->delete($typesEtatsContrat)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Etats Contrat'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Etats Contrat'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
