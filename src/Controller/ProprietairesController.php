<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Proprietaires Controller
 *
 * @property \App\Model\Table\ProprietairesTable $Proprietaires
 *
 * @method \App\Model\Entity\Proprietaire[] paginate($object = null, array $settings = [])
 */
class ProprietairesController extends AppController
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
            $proprietaires = $this->Proprietaires->find()->select()->where('Proprietaires.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
              
        }else{
            $proprietaires=$this->Proprietaires; 
        }
        $proprietaires = $this->paginate($this->Proprietaires);

        $this->set(compact('proprietaires'));
        $this->set('_serialize', ['proprietaires']);
    }

    /**
     * View method
     *
     * @param string|null $id Proprietaire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proprietaire = $this->Proprietaires->get($id, [
            'contain' => ['Machines']
        ]);

        $this->set('proprietaire', $proprietaire);
        $this->set('_serialize', ['proprietaire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $proprietaire = $this->Proprietaires->newEntity();
        if ($this->request->is('post')) {
            $proprietaire = $this->Proprietaires->patchEntity($proprietaire, $this->request->data);
            if ($this->Proprietaires->save($proprietaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Proprietaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Proprietaire'));
            }
        }
        $this->set(compact('proprietaire'));
        $this->set('_serialize', ['proprietaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Proprietaire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proprietaire = $this->Proprietaires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proprietaire = $this->Proprietaires->patchEntity($proprietaire, $this->request->data);
            if ($this->Proprietaires->save($proprietaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Proprietaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Proprietaire'));
            }
        }
        $this->set(compact('proprietaire'));
        $this->set('_serialize', ['proprietaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Proprietaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proprietaire = $this->Proprietaires->get($id);
        if ($this->Proprietaires->delete($proprietaire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Proprietaire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Proprietaire'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
