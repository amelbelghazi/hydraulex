<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VisasCf Controller
 *
 * @property \App\Model\Table\VisasCfTable $VisasCf
 *
 * @method \App\Model\Entity\VisasCf[] paginate($object = null, array $settings = [])
 */
class VisasCfController extends AppController
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
        $visasCf = $this->paginate($this->VisasCf);

        $this->set(compact('visasCf'));
        $this->set('_serialize', ['visasCf']);
    }

    /**
     * View method
     *
     * @param string|null $id Visas Cf id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $visasCf = $this->VisasCf->get($id, [
            'contain' => ['Marches']
        ]);

        $this->set('visasCf', $visasCf);
        $this->set('_serialize', ['visasCf']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $visasCf = $this->VisasCf->newEntity();
        if ($this->request->is('post')) {
            $visasCf = $this->VisasCf->patchEntity($visasCf, $this->request->data);
            if ($this->VisasCf->save($visasCf)) {
                $this->Flash->success(__('The {0} has been saved.', 'Visas Cf'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Visas Cf'));
            }
        }
        $marches = $this->VisasCf->Marches->find('list', ['limit' => 200]);
        $this->set(compact('visasCf', 'marches'));
        $this->set('_serialize', ['visasCf']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Visas Cf id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $visasCf = $this->VisasCf->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $visasCf = $this->VisasCf->patchEntity($visasCf, $this->request->data);
            if ($this->VisasCf->save($visasCf)) {
                $this->Flash->success(__('The {0} has been saved.', 'Visas Cf'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Visas Cf'));
            }
        }
        $marches = $this->VisasCf->Marches->find('list', ['limit' => 200]);
        $this->set(compact('visasCf', 'marches'));
        $this->set('_serialize', ['visasCf']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Visas Cf id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $visasCf = $this->VisasCf->get($id);
        if ($this->VisasCf->delete($visasCf)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Visas Cf'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Visas Cf'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
