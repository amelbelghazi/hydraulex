<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesAvenants Controller
 *
 * @property \App\Model\Table\ArticlesAvenantsTable $ArticlesAvenants
 *
 * @method \App\Model\Entity\ArticlesAvenant[] paginate($object = null, array $settings = [])
 */
class ArticlesAvenantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PartiesAvenants']
        ];
        $articlesAvenants = $this->paginate($this->ArticlesAvenants);

        $this->set(compact('articlesAvenants'));
        $this->set('_serialize', ['articlesAvenants']);
    }

    /**
     * View method
     *
     * @param string|null $id Articles Avenant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesAvenant = $this->ArticlesAvenants->get($id, [
            'contain' => ['PartiesAvenants', 'DetailsArticlesAvenants']
        ]);

        $this->set('articlesAvenant', $articlesAvenant);
        $this->set('_serialize', ['articlesAvenant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesAvenant = $this->ArticlesAvenants->newEntity();
        if ($this->request->is('post')) {
            $articlesAvenant = $this->ArticlesAvenants->patchEntity($articlesAvenant, $this->request->data);
            if ($this->ArticlesAvenants->save($articlesAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Articles Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Articles Avenant'));
            }
        }
        $partiesAvenants = $this->ArticlesAvenants->PartiesAvenants->find('list', ['limit' => 200]);
        $this->set(compact('articlesAvenant', 'partiesAvenants'));
        $this->set('_serialize', ['articlesAvenant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Avenant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesAvenant = $this->ArticlesAvenants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesAvenant = $this->ArticlesAvenants->patchEntity($articlesAvenant, $this->request->data);
            if ($this->ArticlesAvenants->save($articlesAvenant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Articles Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Articles Avenant'));
            }
        }
        $partiesAvenants = $this->ArticlesAvenants->PartiesAvenants->find('list', ['limit' => 200]);
        $this->set(compact('articlesAvenant', 'partiesAvenants'));
        $this->set('_serialize', ['articlesAvenant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Avenant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesAvenant = $this->ArticlesAvenants->get($id);
        if ($this->ArticlesAvenants->delete($articlesAvenant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Articles Avenant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Articles Avenant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
