<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetailsArticle Controller
 *
 * @property \App\Model\Table\DetailsArticleTable $DetailsArticle
 *
 * @method \App\Model\Entity\DetailsArticle[] paginate($object = null, array $settings = [])
 */
class DetailsArticleController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Unites', 'Soustraitants']
        ];
        $detailsArticle = $this->paginate($this->DetailsArticle);

        $this->set(compact('detailsArticle'));
        $this->set('_serialize', ['detailsArticle']);
    }

    /**
     * View method
     *
     * @param string|null $id Details Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsArticle = $this->DetailsArticle->get($id, [
            'contain' => ['Articles', 'Unites', 'Soustraitants']
        ]);

        $this->set('detailsArticle', $detailsArticle);
        $this->set('_serialize', ['detailsArticle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsArticle = $this->DetailsArticle->newEntity();
        if ($this->request->is('post')) {
            $detailsArticle = $this->DetailsArticle->patchEntity($detailsArticle, $this->request->data);
            if ($this->DetailsArticle->save($detailsArticle)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Article'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Article'));
            }
        }
        $articles = $this->DetailsArticle->Articles->find('list', ['limit' => 200]);
        $unites = $this->DetailsArticle->Unites->find('list', ['limit' => 200]);
        $soustraitants = $this->DetailsArticle->Soustraitants->find('list', ['limit' => 200]);
        $this->set(compact('detailsArticle', 'articles', 'unites', 'soustraitants'));
        $this->set('_serialize', ['detailsArticle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Details Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsArticle = $this->DetailsArticle->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsArticle = $this->DetailsArticle->patchEntity($detailsArticle, $this->request->data);
            if ($this->DetailsArticle->save($detailsArticle)) {
                $this->Flash->success(__('The {0} has been saved.', 'Details Article'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Details Article'));
            }
        }
        $articles = $this->DetailsArticle->Articles->find('list', ['limit' => 200]);
        $unites = $this->DetailsArticle->Unites->find('list', ['limit' => 200]);
        $soustraitants = $this->DetailsArticle->Soustraitants->find('list', ['limit' => 200]);
        $this->set(compact('detailsArticle', 'articles', 'unites', 'soustraitants'));
        $this->set('_serialize', ['detailsArticle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Details Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsArticle = $this->DetailsArticle->get($id);
        if ($this->DetailsArticle->delete($detailsArticle)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Details Article'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Details Article'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
