<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[] paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Parties']
        ];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Parties', 'DetailsArticle']
        ]);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The {0} has been saved.', 'Article'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Article'));
            }
        }
        $parties = $this->Articles->Parties->find('list', ['limit' => 200]);
        $this->set(compact('article', 'parties'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The {0} has been saved.', 'Article'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Article'));
            }
        }
        $parties = $this->Articles->Parties->find('list', ['limit' => 200]);
        $this->set(compact('article', 'parties'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Article'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Article'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
