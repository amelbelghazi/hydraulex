<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AchatsDetails Controller
 *
 * @property \App\Model\Table\AchatsDetailsTable $AchatsDetails
 *
 * @method \App\Model\Entity\AchatsDetail[] paginate($object = null, array $settings = [])
 */
class AchatsDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Achats', 'Stocks']
        ];
        $achatsDetails = $this->paginate($this->AchatsDetails);

        $this->set(compact('achatsDetails'));
        $this->set('_serialize', ['achatsDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Achats Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $achatsDetail = $this->AchatsDetails->get($id, [
            'contain' => ['Achats', 'Stocks']
        ]);

        $this->set('achatsDetail', $achatsDetail);
        $this->set('_serialize', ['achatsDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $achatsDetail = $this->AchatsDetails->newEntity();
        if ($this->request->is('post')) {
            $achatsDetail = $this->AchatsDetails->patchEntity($achatsDetail, $this->request->data);
            if ($this->AchatsDetails->save($achatsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Achats Detail'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Achats Detail'));
            }
        }
        $achats = $this->AchatsDetails->Achats->find('list', ['limit' => 200]);
        $stocks = $this->AchatsDetails->Stocks->find('list', ['limit' => 200]);
        $this->set(compact('achatsDetail', 'achats', 'stocks'));
        $this->set('_serialize', ['achatsDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Achats Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $achatsDetail = $this->AchatsDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $achatsDetail = $this->AchatsDetails->patchEntity($achatsDetail, $this->request->data);
            if ($this->AchatsDetails->save($achatsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Achats Detail'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Achats Detail'));
            }
        }
        $achats = $this->AchatsDetails->Achats->find('list', ['limit' => 200]);
        $stocks = $this->AchatsDetails->Stocks->find('list', ['limit' => 200]);
        $this->set(compact('achatsDetail', 'achats', 'stocks'));
        $this->set('_serialize', ['achatsDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Achats Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $achatsDetail = $this->AchatsDetails->get($id);
        if ($this->AchatsDetails->delete($achatsDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Achats Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Achats Detail'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
