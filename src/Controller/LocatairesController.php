<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Locataires Controller
 *
 * @property \App\Model\Table\LocatairesTable $Locataires
 *
 * @method \App\Model\Entity\Locataire[] paginate($object = null, array $settings = [])
 */
class LocatairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Entreprises']
        ];
        $locataires = $this->paginate($this->Locataires);

        $this->set(compact('locataires'));
        $this->set('_serialize', ['locataires']);
    }

    /**
     * View method
     *
     * @param string|null $id Locataire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locataire = $this->Locataires->get($id, [
            'contain' => ['Entreprises', 'LocationsMachine']
        ]);

        $this->set('locataire', $locataire);
        $this->set('_serialize', ['locataire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locataire = $this->Locataires->newEntity();
        if ($this->request->is('post')) {
            $locataire = $this->Locataires->patchEntity($locataire, $this->request->data);
            if ($this->Locataires->save($locataire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Locataire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Locataire'));
            }
        }
        $entreprises = $this->Locataires->Entreprises->find('list', ['limit' => 200]);
        $this->set(compact('locataire', 'entreprises'));
        $this->set('_serialize', ['locataire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Locataire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locataire = $this->Locataires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locataire = $this->Locataires->patchEntity($locataire, $this->request->data);
            if ($this->Locataires->save($locataire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Locataire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Locataire'));
            }
        }
        $entreprises = $this->Locataires->Entreprises->find('list', ['limit' => 200]);
        $this->set(compact('locataire', 'entreprises'));
        $this->set('_serialize', ['locataire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Locataire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locataire = $this->Locataires->get($id);
        if ($this->Locataires->delete($locataire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Locataire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Locataire'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
