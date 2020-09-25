<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ModesReglements Controller
 *
 * @property \App\Model\Table\ModesReglementsTable $ModesReglements
 *
 * @method \App\Model\Entity\ModesReglement[] paginate($object = null, array $settings = [])
 */
class ModesReglementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $modesReglements = $this->paginate($this->ModesReglements);

        $this->set(compact('modesReglements'));
        $this->set('_serialize', ['modesReglements']);
    }

    /**
     * View method
     *
     * @param string|null $id Modes Reglement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modesReglement = $this->ModesReglements->get($id, [
            'contain' => ['Achats']
        ]);

        $this->set('modesReglement', $modesReglement);
        $this->set('_serialize', ['modesReglement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modesReglement = $this->ModesReglements->newEntity();
        if ($this->request->is('post')) {
            $modesReglement = $this->ModesReglements->patchEntity($modesReglement, $this->request->data);
            if ($this->ModesReglements->save($modesReglement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Modes Reglement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Modes Reglement'));
            }
        }
        $this->set(compact('modesReglement'));
        $this->set('_serialize', ['modesReglement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modes Reglement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modesReglement = $this->ModesReglements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modesReglement = $this->ModesReglements->patchEntity($modesReglement, $this->request->data);
            if ($this->ModesReglements->save($modesReglement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Modes Reglement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Modes Reglement'));
            }
        }
        $this->set(compact('modesReglement'));
        $this->set('_serialize', ['modesReglement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modes Reglement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modesReglement = $this->ModesReglements->get($id);
        if ($this->ModesReglements->delete($modesReglement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Modes Reglement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Modes Reglement'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
