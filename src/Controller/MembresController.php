<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Membres Controller
 *
 * @property \App\Model\Table\MembresTable $Membres
 *
 * @method \App\Model\Entity\Membre[] paginate($object = null, array $settings = [])
 */
class MembresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnes']
        ];
        $membres = $this->paginate($this->Membres);

        $this->set(compact('membres'));
        $this->set('_serialize', ['membres']);
    }

    /**
     * View method
     *
     * @param string|null $id Membre id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membre = $this->Membres->get($id, [
            'contain' => ['Personnes', 'MembresEquipe']
        ]);

        $this->set('membre', $membre);
        $this->set('_serialize', ['membre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membre = $this->Membres->newEntity();
        if ($this->request->is('post')) {
            $membre = $this->Membres->patchEntity($membre, $this->request->data);
            if ($this->Membres->save($membre)) {
                $this->Flash->success(__('The {0} has been saved.', 'Membre'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Membre'));
            }
        }
        $personnes = $this->Membres->Personnes->find('list', ['limit' => 200]);
        $this->set(compact('membre', 'personnes'));
        $this->set('_serialize', ['membre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Membre id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membre = $this->Membres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membre = $this->Membres->patchEntity($membre, $this->request->data);
            if ($this->Membres->save($membre)) {
                $this->Flash->success(__('The {0} has been saved.', 'Membre'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Membre'));
            }
        }
        $personnes = $this->Membres->Personnes->find('list', ['limit' => 200]);
        $this->set(compact('membre', 'personnes'));
        $this->set('_serialize', ['membre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Membre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membre = $this->Membres->get($id);
        if ($this->Membres->delete($membre)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Membre'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Membre'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
