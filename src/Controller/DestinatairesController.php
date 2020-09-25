<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Destinataires Controller
 *
 * @property \App\Model\Table\DestinatairesTable $Destinataires
 *
 * @method \App\Model\Entity\Destinataire[] paginate($object = null, array $settings = [])
 */
class DestinatairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $destinataires = $this->paginate($this->Destinataires);

        $this->set(compact('destinataires'));
        $this->set('_serialize', ['destinataires']);
    }

    /**
     * View method
     *
     * @param string|null $id Destinataire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $destinataire = $this->Destinataires->get($id, [
            'contain' => ['CorrespondancesSortantes']
        ]);

        $this->set('destinataire', $destinataire);
        $this->set('_serialize', ['destinataire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $destinataire = $this->Destinataires->newEntity();
        if ($this->request->is('post')) {
            $destinataire = $this->Destinataires->patchEntity($destinataire, $this->request->data);
            if ($this->Destinataires->save($destinataire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Destinataire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Destinataire'));
            }
        }
        $this->set(compact('destinataire'));
        $this->set('_serialize', ['destinataire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Destinataire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $destinataire = $this->Destinataires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $destinataire = $this->Destinataires->patchEntity($destinataire, $this->request->data);
            if ($this->Destinataires->save($destinataire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Destinataire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Destinataire'));
            }
        }
        $this->set(compact('destinataire'));
        $this->set('_serialize', ['destinataire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Destinataire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $destinataire = $this->Destinataires->get($id);
        if ($this->Destinataires->delete($destinataire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Destinataire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Destinataire'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
