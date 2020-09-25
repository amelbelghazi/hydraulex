<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Depots Controller
 *
 * @property \App\Model\Table\DepotsTable $Depots
 *
 * @method \App\Model\Entity\Depot[] paginate($object = null, array $settings = [])
 */
class DepotsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if($this->request->data){
            
            $rech = $this->request->data['search'];
            $depots = $this->Depots->find()->select()->where('Depots.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
              
        }else{
            $depots=$this->Depots; 
        }
        $depots = $this->paginate($depots);

        $this->set(compact('depots'));
        $this->set('_serialize', ['depots']);
    }

    /**
     * View method
     *
     * @param string|null $id Depot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $depot = $this->Depots->get($id, [
            'contain' => ['Stocks']
        ]);

        $this->set('depot', $depot);
        $this->set('_serialize', ['depot']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $depot = $this->Depots->newEntity();
        if ($this->request->is('post')) {
            $depot = $this->Depots->patchEntity($depot, $this->request->data);
            if ($this->Depots->save($depot)) {
                $this->Flash->success(__('The {0} has been saved.', 'Depot'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Depot'));
            }
        }
        $this->set(compact('depot'));
        $this->set('_serialize', ['depot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Depot id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $depot = $this->Depots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $depot = $this->Depots->patchEntity($depot, $this->request->data);
            if ($this->Depots->save($depot)) {
                $this->Flash->success(__('The {0} has been saved.', 'Depot'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Depot'));
            }
        }
        $this->set(compact('depot'));
        $this->set('_serialize', ['depot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Depot id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $depot = $this->Depots->get($id);
        if ($this->Depots->delete($depot)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Depot'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Depot'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
