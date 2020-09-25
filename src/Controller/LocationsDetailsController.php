<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LocationsDetails Controller
 *
 * @property \App\Model\Table\LocationsDetailsTable $LocationsDetails
 *
 * @method \App\Model\Entity\LocationsDetail[] paginate($object = null, array $settings = [])
 */
class LocationsDetailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Locations']
        ];
        $locationsDetails = $this->paginate($this->LocationsDetails);

        $this->set(compact('locationsDetails'));
        $this->set('_serialize', ['locationsDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Locations Detail id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locationsDetail = $this->LocationsDetails->get($id, [
            'contain' => ['Locations']
        ]);

        $this->set('locationsDetail', $locationsDetail);
        $this->set('_serialize', ['locationsDetail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locationsDetail = $this->LocationsDetails->newEntity();
        if ($this->request->is('post')) {
            $locationsDetail = $this->LocationsDetails->patchEntity($locationsDetail, $this->request->data);
            if ($this->LocationsDetails->save($locationsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Locations Detail'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Locations Detail'));
            }
        }
        $locations = $this->LocationsDetails->Locations->find('list', ['limit' => 200]);
        $this->set(compact('locationsDetail', 'locations'));
        $this->set('_serialize', ['locationsDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Locations Detail id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locationsDetail = $this->LocationsDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationsDetail = $this->LocationsDetails->patchEntity($locationsDetail, $this->request->data);
            if ($this->LocationsDetails->save($locationsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Locations Detail'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Locations Detail'));
            }
        }
        $locations = $this->LocationsDetails->Locations->find('list', ['limit' => 200]);
        $this->set(compact('locationsDetail', 'locations'));
        $this->set('_serialize', ['locationsDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Locations Detail id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locationsDetail = $this->LocationsDetails->get($id);
        if ($this->LocationsDetails->delete($locationsDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Locations Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Locations Detail'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
