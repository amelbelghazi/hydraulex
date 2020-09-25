<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Punitions Controller
 *
 * @property \App\Model\Table\PunitionsTable $Punitions
 *
 * @method \App\Model\Entity\Punition[] paginate($object = null, array $settings = [])
 */
class PunitionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Avertissements', 'TypePunitions']
        ];
        $punitions = $this->paginate($this->Punitions);

        $this->set(compact('punitions'));
        $this->set('_serialize', ['punitions']);
    }

    /**
     * View method
     *
     * @param string|null $id Punition id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $punition = $this->Punitions->get($id, [
            'contain' => ['Avertissements', 'TypePunitions']
        ]);

        $this->set('punition', $punition);
        $this->set('_serialize', ['punition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $punition = $this->Punitions->newEntity();
        if ($this->request->is('post')) {
            $punition = $this->Punitions->patchEntity($punition, $this->request->data);
            if ($this->Punitions->save($punition)) {
                $this->Flash->success(__('The {0} has been saved.', 'Punition'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Punition'));
            }
        }
        $avertissements = $this->Punitions->Avertissements->find('list', ['limit' => 200]);
        $typePunitions = $this->Punitions->TypePunitions->find('list', ['limit' => 200]);
        $this->set(compact('punition', 'avertissements', 'typePunitions'));
        $this->set('_serialize', ['punition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Punition id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $punition = $this->Punitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $punition = $this->Punitions->patchEntity($punition, $this->request->data);
            if ($this->Punitions->save($punition)) {
                $this->Flash->success(__('The {0} has been saved.', 'Punition'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Punition'));
            }
        }
        $avertissements = $this->Punitions->Avertissements->find('list', ['limit' => 200]);
        $typePunitions = $this->Punitions->TypePunitions->find('list', ['limit' => 200]);
        $this->set(compact('punition', 'avertissements', 'typePunitions'));
        $this->set('_serialize', ['punition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Punition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $punition = $this->Punitions->get($id);
        if ($this->Punitions->delete($punition)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Punition'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Punition'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
