<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetailsArticlesAvenants Controller
 *
 * @property \App\Model\Table\DetailsArticlesAvenantsTable $DetailsArticlesAvenants
 *
 * @method \App\Model\Entity\DetailsArticlesAvenant[] paginate($object = null, array $settings = [])
 */
class DetailsArticlesAvenantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ArticlesAvenants', 'Unites', 'Soustraitants']
        ];
        $detailsArticlesAvenants = $this->paginate($this->DetailsArticlesAvenants);

        $this->set(compact('detailsArticlesAvenants'));
        $this->set('_serialize', ['detailsArticlesAvenants']);
    }

    /**
     * View method
     *
     * @param string|null $id Details Articles Avenant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsArticlesAvenant = $this->DetailsArticlesAvenants->get($id, [
            'contain' => ['ArticlesAvenants', 'Unites', 'Soustraitants', 'AttachementsTravauxAvenants']
        ]);

        $this->set('detailsArticlesAvenant', $detailsArticlesAvenant);
        $this->set('_serialize', ['detailsArticlesAvenant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsArticlesAvenant = $this->DetailsArticlesAvenants->newEntity();
        if ($this->request->is('post')) {
            $detailsArticlesAvenant = $this->DetailsArticlesAvenants->patchEntity($detailsArticlesAvenant, $this->request->data);
            if ($this->DetailsArticlesAvenants->save($detailsArticlesAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Articles Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Articles Avenant'));
            }
        }
        $articlesAvenants = $this->DetailsArticlesAvenants->ArticlesAvenants->find('list', ['limit' => 200]);
        $unites = $this->DetailsArticlesAvenants->Unites->find('list', ['limit' => 200]);
        $soustraitants = $this->DetailsArticlesAvenants->Soustraitants->find('list', ['limit' => 200]);
        $this->set(compact('detailsArticlesAvenant', 'articlesAvenants', 'unites', 'soustraitants'));
        $this->set('_serialize', ['detailsArticlesAvenant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Details Articles Avenant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsArticlesAvenant = $this->DetailsArticlesAvenants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsArticlesAvenant = $this->DetailsArticlesAvenants->patchEntity($detailsArticlesAvenant, $this->request->data);
            if ($this->DetailsArticlesAvenants->save($detailsArticlesAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Articles Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Articles Avenant'));
            }
        }
        $articlesAvenants = $this->DetailsArticlesAvenants->ArticlesAvenants->find('list', ['limit' => 200]);
        $unites = $this->DetailsArticlesAvenants->Unites->find('list', ['limit' => 200]);
        $soustraitants = $this->DetailsArticlesAvenants->Soustraitants->find('list', ['limit' => 200]);
        $this->set(compact('detailsArticlesAvenant', 'articlesAvenants', 'unites', 'soustraitants'));
        $this->set('_serialize', ['detailsArticlesAvenant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Details Articles Avenant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsArticlesAvenant = $this->DetailsArticlesAvenants->get($id);
        if ($this->DetailsArticlesAvenants->delete($detailsArticlesAvenant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Details Articles Avenant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Details Articles Avenant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
