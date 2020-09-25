<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaitresOeuvres Controller
 *
 * @property \App\Model\Table\MaitresOeuvresTable $MaitresOeuvres
 *
 * @method \App\Model\Entity\MaitresOeuvre[] paginate($object = null, array $settings = [])
 */
class MaitresOeuvresController extends AppController
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
            $maitresOeuvres = $this->MaitresOeuvres->find()->select()->where('MaitresOeuvres.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
              
        }else{
            $maitresOeuvres=$this->MaitresOeuvres; 
        }
        $maitresOeuvres = $this->paginate($maitresOeuvres);

        $this->set(compact('maitresOeuvres'));
        $this->set('_serialize', ['maitresOeuvres']);
    }

    /**
     * View method
     *
     * @param string|null $id Maitres Oeuvre id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maitresOeuvre = $this->MaitresOeuvres->get($id, [
            'contain' => []
        ]);

        $this->set('maitresOeuvre', $maitresOeuvre);
        $this->set('_serialize', ['maitresOeuvre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maitresOeuvre = $this->MaitresOeuvres->newEntity();
        if ($this->request->is('post')) {
            $maitresOeuvre = $this->MaitresOeuvres->patchEntity($maitresOeuvre, $this->request->data);
            if ($this->MaitresOeuvres->save($maitresOeuvre)) {
                $this->Flash->success(__('The {0} has been saved.', 'Maitres Oeuvre'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Maitres Oeuvre'));
            }
        }
        $this->set(compact('maitresOeuvre'));
        $this->set('_serialize', ['maitresOeuvre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Maitres Oeuvre id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maitresOeuvre = $this->MaitresOeuvres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maitresOeuvre = $this->MaitresOeuvres->patchEntity($maitresOeuvre, $this->request->data);
            if ($this->MaitresOeuvres->save($maitresOeuvre)) {
                $this->Flash->success(__('The {0} has been saved.', 'Maitres Oeuvre'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Maitres Oeuvre'));
            }
        }
        $this->set(compact('maitresOeuvre'));
        $this->set('_serialize', ['maitresOeuvre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Maitres Oeuvre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maitresOeuvre = $this->MaitresOeuvres->get($id);
        if ($this->MaitresOeuvres->delete($maitresOeuvre)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Maitres Oeuvre'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Maitres Oeuvre'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
