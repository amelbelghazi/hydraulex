<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Expediteurs Controller
 *
 * @property \App\Model\Table\ExpediteursTable $Expediteurs
 *
 * @method \App\Model\Entity\Expediteur[] paginate($object = null, array $settings = [])
 */
class ExpediteursController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $expediteurs = $this->paginate($this->Expediteurs);

        $this->set(compact('expediteurs'));
        $this->set('_serialize', ['expediteurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Expediteur id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expediteur = $this->Expediteurs->get($id, [
            'contain' => ['CorrespondancesEntrantes']
        ]);

        $this->set('expediteur', $expediteur);
        $this->set('_serialize', ['expediteur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expediteur = $this->Expediteurs->newEntity();
        if ($this->request->is('post')) {
            $expediteur = $this->Expediteurs->patchEntity($expediteur, $this->request->data);
            if ($this->Expediteurs->save($expediteur)) {
                $this->Flash->success(__('The {0} has been saved.', 'Expediteur'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Expediteur'));
            }
        }
        $this->set(compact('expediteur'));
        $this->set('_serialize', ['expediteur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expediteur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expediteur = $this->Expediteurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expediteur = $this->Expediteurs->patchEntity($expediteur, $this->request->data);
            if ($this->Expediteurs->save($expediteur)) {
                $this->Flash->success(__('The {0} has been saved.', 'Expediteur'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Expediteur'));
            }
        }
        $this->set(compact('expediteur'));
        $this->set('_serialize', ['expediteur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expediteur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expediteur = $this->Expediteurs->get($id);
        if ($this->Expediteurs->delete($expediteur)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Expediteur'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Expediteur'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
