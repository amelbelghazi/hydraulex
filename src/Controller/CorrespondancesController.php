<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Correspondances Controller
 *
 * @property \App\Model\Table\CorrespondancesTable $Correspondances
 *
 * @method \App\Model\Entity\Correspondance[] paginate($object = null, array $settings = [])
 */
class CorrespondancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Marches']
        ];
        $correspondances = $this->paginate($this->Correspondances);

        $this->set(compact('correspondances'));
        $this->set('_serialize', ['correspondances']);
    }

    /**
     * View method
     *
     * @param string|null $id Correspondance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $correspondance = $this->Correspondances->get($id, [
            'contain' => ['Marches']
        ]);

        $this->set('correspondance', $correspondance);
        $this->set('_serialize', ['correspondance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $correspondance = $this->Correspondances->newEntity();
        if ($this->request->is('post')) {
            $correspondance = $this->Correspondances->patchEntity($correspondance, $this->request->data);
            if ($this->Correspondances->save($correspondance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Correspondance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Correspondance'));
            }
        }
        $marches = $this->Correspondances->Marches->find('list', ['limit' => 200]);
        $this->set(compact('correspondance', 'marches'));
        $this->set('_serialize', ['correspondance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Correspondance id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $correspondance = $this->Correspondances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $correspondance = $this->Correspondances->patchEntity($correspondance, $this->request->data);
            if ($this->Correspondances->save($correspondance)) {
                $this->Flash->success(__('The {0} has been saved.', 'Correspondance'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Correspondance'));
            }
        }
        $marches = $this->Correspondances->Marches->find('list', ['limit' => 200]);
        $this->set(compact('correspondance', 'marches'));
        $this->set('_serialize', ['correspondance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Correspondance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $correspondance = $this->Correspondances->get($id);
        if ($this->Correspondances->delete($correspondance)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Correspondance'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Correspondance'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
