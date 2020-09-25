<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Societes Controller
 *
 * @property \App\Model\Table\SocietesTable $Societes
 *
 * @method \App\Model\Entity\Societe[] paginate($object = null, array $settings = [])
 */
class SocietesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $societes = $this->paginate($this->Societes);

        $this->set(compact('societes'));
        $this->set('_serialize', ['societes']);
    }

    /**
     * View method
     *
     * @param string|null $id Societe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $societe = $this->Societes->get($id, [
            'contain' => ['Departements', 'Gerants']
        ]);

        $this->set('societe', $societe);
        $this->set('_serialize', ['societe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $societe = $this->Societes->newEntity();
        if ($this->request->is('post')) {
            $societe = $this->Societes->patchEntity($societe, $this->request->data);
            debug($this->request->data); 
            if ($this->Societes->save($societe)) {
                $this->Flash->success(__('The {0} has been saved.', 'Societe'));
                return $this->redirect(['action' => 'index']);
            } else {

                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Societe'));
            }
        }
        $this->set(compact('societe'));
        $this->set('_serialize', ['societe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Societe id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $societe = $this->Societes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $societe = $this->Societes->patchEntity($societe, $this->request->data);
            if ($this->Societes->save($societe)) {
                $this->Flash->success(__('The {0} has been saved.', 'Societe'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Societe'));
            }
        }
        $this->set(compact('societe'));
        $this->set('_serialize', ['societe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Societe id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $societe = $this->Societes->get($id);
        if ($this->Societes->delete($societe)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Societe'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Societe'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
