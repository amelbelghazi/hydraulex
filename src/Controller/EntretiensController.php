<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Entretiens Controller
 *
 * @property \App\Model\Table\EntretiensTable $Entretiens
 *
 * @method \App\Model\Entity\Entretien[] paginate($object = null, array $settings = [])
 */
class EntretiensController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Periodes']
        ];
        $entretiens = $this->paginate($this->Entretiens);

        $this->set(compact('entretiens'));
        $this->set('_serialize', ['entretiens']);
    }

    /**
     * View method
     *
     * @param string|null $id Entretien id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entretien = $this->Entretiens->get($id, [
            'contain' => ['Periodes', 'Ressources']
        ]);

        $this->set('entretien', $entretien);
        $this->set('_serialize', ['entretien']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entretien = $this->Entretiens->newEntity();
        if ($this->request->is('post')) {
            $entretien = $this->Entretiens->patchEntity($entretien, $this->request->data);
            if ($this->Entretiens->save($entretien)) {
                $this->Flash->success(__('The {0} has been saved.', 'Entretien'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Entretien'));
            }
        }
        $periodes = $this->Entretiens->Periodes->find('list', ['limit' => 200]);
        $ressources = $this->Entretiens->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('entretien', 'periodes', 'ressources'));
        $this->set('_serialize', ['entretien']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Entretien id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entretien = $this->Entretiens->get($id, [
            'contain' => ['Ressources']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entretien = $this->Entretiens->patchEntity($entretien, $this->request->data);
            if ($this->Entretiens->save($entretien)) {
                $this->Flash->success(__('The {0} has been saved.', 'Entretien'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Entretien'));
            }
        }
        $periodes = $this->Entretiens->Periodes->find('list', ['limit' => 200]);
        $ressources = $this->Entretiens->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('entretien', 'periodes', 'ressources'));
        $this->set('_serialize', ['entretien']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Entretien id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entretien = $this->Entretiens->get($id);
        if ($this->Entretiens->delete($entretien)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Entretien'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Entretien'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
