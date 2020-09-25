<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Gerants Controller
 *
 * @property \App\Model\Table\GerantsTable $Gerants
 *
 * @method \App\Model\Entity\Gerant[] paginate($object = null, array $settings = [])
 */
class GerantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels', 'Societes']
        ];
        $gerants = $this->paginate($this->Gerants);

        $this->set(compact('gerants'));
        $this->set('_serialize', ['gerants']);
    }

    /**
     * View method
     *
     * @param string|null $id Gerant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gerant = $this->Gerants->get($id, [
            'contain' => ['Personnels', 'Societes']
        ]);

        $this->set('gerant', $gerant);
        $this->set('_serialize', ['gerant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Societes');
        $gerant = $this->Gerants->newEntity();
        if ($this->request->is('post')) {
            $gerant = $this->Gerants->patchEntity($gerant, $this->request->data);
            if ($this->Gerants->save($gerant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gerant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gerant'));
            }
        }
        $gerant->societe_id = $this->request->params['pass'][0];
        $id = $gerant->societe_id;
        $societes = $this->Societes->get($id, [
            'contain' => []
        ]);
        $personnels = $this->Gerants->Personnels->find('list', ['limit' => 200]);
        // debug($personnels);
        //debug($societes);
        //$societes = $this->Gerants->Societes->find('list', ['limit' => 200]);
        $this->set(compact('gerant', 'personnels', 'societes'));
        $this->set('_serialize', ['gerant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gerant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gerant = $this->Gerants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gerant = $this->Gerants->patchEntity($gerant, $this->request->data);
            if ($this->Gerants->save($gerant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gerant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gerant'));
            }
        }
        $personnels = $this->Gerants->Personnels->find('list', ['limit' => 200]);
        $societes = $this->Gerants->Societes->find('list', ['limit' => 200]);
        $this->set(compact('gerant', 'personnels', 'societes'));
        $this->set('_serialize', ['gerant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gerant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gerant = $this->Gerants->get($id);
        if ($this->Gerants->delete($gerant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Gerant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Gerant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
