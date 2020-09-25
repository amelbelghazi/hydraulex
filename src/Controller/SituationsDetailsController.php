<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SituationsDetails Controller
 *
 * @property \App\Model\Table\SituationsDetailsTable $SituationsDetails
 *
 * @method \App\Model\Entity\SituationsDetail[] paginate($object = null, array $settings = [])
 */
class SituationsDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations']
        ];
        $situationsDetails = $this->paginate($this->SituationsDetails);

        $this->set(compact('situationsDetails'));
        $this->set('_serialize', ['situationsDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Situations Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $situationsDetail = $this->SituationsDetails->get($id, [
            'contain' => ['Situations']
        ]);

        $this->set('situationsDetail', $situationsDetail);
        $this->set('_serialize', ['situationsDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $situationsDetail = $this->SituationsDetails->newEntity();
        if ($this->request->is('post')) {
            $situationsDetail = $this->SituationsDetails->patchEntity($situationsDetail, $this->request->data);
            if ($this->SituationsDetails->save($situationsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Situations Detail'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Situations Detail'));
            }
        }
        $situations = $this->SituationsDetails->Situations->find('list', ['limit' => 200]);
        $this->set(compact('situationsDetail', 'situations'));
        $this->set('_serialize', ['situationsDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Situations Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $situationsDetail = $this->SituationsDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $situationsDetail = $this->SituationsDetails->patchEntity($situationsDetail, $this->request->data);
            if ($this->SituationsDetails->save($situationsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Situations Detail'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Situations Detail'));
            }
        }
        $situations = $this->SituationsDetails->Situations->find('list', ['limit' => 200]);
        $this->set(compact('situationsDetail', 'situations'));
        $this->set('_serialize', ['situationsDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Situations Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $situationsDetail = $this->SituationsDetails->get($id);
        if ($this->SituationsDetails->delete($situationsDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Situations Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Situations Detail'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
