<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Periodes Controller
 *
 * @property \App\Model\Table\PeriodesTable $Periodes
 *
 * @method \App\Model\Entity\Periode[] paginate($object = null, array $settings = [])
 */
class PeriodesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $periodes = $this->paginate($this->Periodes);

        $this->set(compact('periodes'));
        $this->set('_serialize', ['periodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Periode id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $periode = $this->Periodes->get($id, [
            'contain' => ['Entretiens']
        ]);

        $this->set('periode', $periode);
        $this->set('_serialize', ['periode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $periode = $this->Periodes->newEntity();
        if ($this->request->is('post')) {
            $periode = $this->Periodes->patchEntity($periode, $this->request->data);
            if ($this->Periodes->save($periode)) {
                $this->Flash->success(__('The {0} has been saved.', 'Periode'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Periode'));
            }
        }
        $this->set(compact('periode'));
        $this->set('_serialize', ['periode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Periode id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $periode = $this->Periodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $periode = $this->Periodes->patchEntity($periode, $this->request->data);
            if ($this->Periodes->save($periode)) {
                $this->Flash->success(__('The {0} has been saved.', 'Periode'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Periode'));
            }
        }
        $this->set(compact('periode'));
        $this->set('_serialize', ['periode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Periode id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $periode = $this->Periodes->get($id);
        if ($this->Periodes->delete($periode)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Periode'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Periode'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
