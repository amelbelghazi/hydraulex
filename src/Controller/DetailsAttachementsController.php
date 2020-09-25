<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetailsAttachements Controller
 *
 * @property \App\Model\Table\DetailsAttachementsTable $DetailsAttachements
 *
 * @method \App\Model\Entity\DetailsAttachement[] paginate($object = null, array $settings = [])
 */
class DetailsAttachementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AttachementsTravails', 'DetailsArticles']
        ];
        $detailsAttachements = $this->paginate($this->DetailsAttachements);

        $this->set(compact('detailsAttachements'));
        $this->set('_serialize', ['detailsAttachements']);
    }

    /**
     * View method
     *
     * @param string|null $id Details Attachement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsAttachement = $this->DetailsAttachements->get($id, [
            'contain' => ['AttachementsTravails', 'DetailsArticles']
        ]);

        $this->set('detailsAttachement', $detailsAttachement);
        $this->set('_serialize', ['detailsAttachement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsAttachement = $this->DetailsAttachements->newEntity();
        if ($this->request->is('post')) {
            $detailsAttachement = $this->DetailsAttachements->patchEntity($detailsAttachement, $this->request->data);
            if ($this->DetailsAttachements->save($detailsAttachement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Attachement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Attachement'));
            }
        }
        $attachementsTravails = $this->DetailsAttachements->AttachementsTravails->find('list', ['limit' => 200]);
        $detailsArticles = $this->DetailsAttachements->DetailsArticles->find('list', ['limit' => 200]);
        $this->set(compact('detailsAttachement', 'attachementsTravails', 'detailsArticles'));
        $this->set('_serialize', ['detailsAttachement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Details Attachement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsAttachement = $this->DetailsAttachements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsAttachement = $this->DetailsAttachements->patchEntity($detailsAttachement, $this->request->data);
            if ($this->DetailsAttachements->save($detailsAttachement)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Attachement'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Attachement'));
            }
        }
        $attachementsTravails = $this->DetailsAttachements->AttachementsTravails->find('list', ['limit' => 200]);
        $detailsArticles = $this->DetailsAttachements->DetailsArticles->find('list', ['limit' => 200]);
        $this->set(compact('detailsAttachement', 'attachementsTravails', 'detailsArticles'));
        $this->set('_serialize', ['detailsAttachement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Details Attachement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsAttachement = $this->DetailsAttachements->get($id);
        if ($this->DetailsAttachements->delete($detailsAttachement)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Details Attachement'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Details Attachement'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
