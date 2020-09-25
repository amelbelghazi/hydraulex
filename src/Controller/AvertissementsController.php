<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Avertissements Controller
 *
 * @property \App\Model\Table\AvertissementsTable $Avertissements
 *
 * @method \App\Model\Entity\Avertissement[] paginate($object = null, array $settings = [])
 */
class AvertissementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels', 'TypeAvertissements']
        ];
        $avertissements = $this->paginate($this->Avertissements);

        $this->set(compact('avertissements'));
        $this->set('_serialize', ['avertissements']);
    }

    /**
     * View method
     *
     * @param string|null $id Avertissement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $avertissement = $this->Avertissements->get($id, [
            'contain' => ['Personnels', 'TypeAvertissements', 'Punitions']
        ]);

        $this->set('avertissement', $avertissement);
        $this->set('_serialize', ['avertissement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $avertissement = $this->Avertissements->newEntity();
        if ($this->request->is('post')) {
            $avertissement = $this->Avertissements->patchEntity($avertissement, $this->request->data);
            if ($this->Avertissements->save($avertissement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Avertissement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Avertissement'));
            }
        }
        $personnels = $this->Avertissements->Personnels->find('list', ['limit' => 200]);
        $typeAvertissements = $this->Avertissements->TypeAvertissements->find('list', ['limit' => 200]);
        $this->set(compact('avertissement', 'personnels', 'typeAvertissements'));
        $this->set('_serialize', ['avertissement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Avertissement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $avertissement = $this->Avertissements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $avertissement = $this->Avertissements->patchEntity($avertissement, $this->request->data);
            if ($this->Avertissements->save($avertissement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Avertissement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Avertissement'));
            }
        }
        $personnels = $this->Avertissements->Personnels->find('list', ['limit' => 200]);
        $typeAvertissements = $this->Avertissements->TypeAvertissements->find('list', ['limit' => 200]);
        $this->set(compact('avertissement', 'personnels', 'typeAvertissements'));
        $this->set('_serialize', ['avertissement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Avertissement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $avertissement = $this->Avertissements->get($id);
        if ($this->Avertissements->delete($avertissement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Avertissement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Avertissement'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
