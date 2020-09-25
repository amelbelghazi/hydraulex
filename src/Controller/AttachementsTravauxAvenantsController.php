<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttachementsTravauxAvenants Controller
 *
 * @property \App\Model\Table\AttachementsTravauxAvenantsTable $AttachementsTravauxAvenants
 *
 * @method \App\Model\Entity\AttachementsTravauxAvenant[] paginate($object = null, array $settings = [])
 */
class AttachementsTravauxAvenantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DetailsArticlesAvenants']
        ];
        $attachementsTravauxAvenants = $this->paginate($this->AttachementsTravauxAvenants);

        $this->set(compact('attachementsTravauxAvenants'));
        $this->set('_serialize', ['attachementsTravauxAvenants']);
    }

    /**
     * View method
     *
     * @param string|null $id Attachements Travaux Avenant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attachementsTravauxAvenant = $this->AttachementsTravauxAvenants->get($id, [
            'contain' => ['DetailsArticlesAvenants']
        ]);

        $this->set('attachementsTravauxAvenant', $attachementsTravauxAvenant);
        $this->set('_serialize', ['attachementsTravauxAvenant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attachementsTravauxAvenant = $this->AttachementsTravauxAvenants->newEntity();
        if ($this->request->is('post')) {
            $attachementsTravauxAvenant = $this->AttachementsTravauxAvenants->patchEntity($attachementsTravauxAvenant, $this->request->data);
            if ($this->AttachementsTravauxAvenants->save($attachementsTravauxAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attachements Travaux Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attachements Travaux Avenant'));
            }
        }
        $detailsArticlesAvenants = $this->AttachementsTravauxAvenants->DetailsArticlesAvenants->find('list', ['limit' => 200]);
        $this->set(compact('attachementsTravauxAvenant', 'detailsArticlesAvenants'));
        $this->set('_serialize', ['attachementsTravauxAvenant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachements Travaux Avenant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachementsTravauxAvenant = $this->AttachementsTravauxAvenants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attachementsTravauxAvenant = $this->AttachementsTravauxAvenants->patchEntity($attachementsTravauxAvenant, $this->request->data);
            if ($this->AttachementsTravauxAvenants->save($attachementsTravauxAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Attachements Travaux Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attachements Travaux Avenant'));
            }
        }
        $detailsArticlesAvenants = $this->AttachementsTravauxAvenants->DetailsArticlesAvenants->find('list', ['limit' => 200]);
        $this->set(compact('attachementsTravauxAvenant', 'detailsArticlesAvenants'));
        $this->set('_serialize', ['attachementsTravauxAvenant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachements Travaux Avenant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachementsTravauxAvenant = $this->AttachementsTravauxAvenants->get($id);
        if ($this->AttachementsTravauxAvenants->delete($attachementsTravauxAvenant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attachements Travaux Avenant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attachements Travaux Avenant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
