<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 *
 * @method \App\Model\Entity\Tag[] paginate($object = null, array $settings = [])
 */
class TagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tags = $this->paginate($this->Tags);

        $this->set(compact('tags'));
        $this->set('_serialize', ['tags']);
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Documents']
        ]);

        $this->set('tag', $tag);
        $this->set('_serialize', ['tag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tag = $this->Tags->newEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tags->patchEntity($tag, $this->request->data);
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The {0} has been saved.', 'Tag'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Tag'));
            }
        }
        $documents = $this->Tags->Documents->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'documents'));
        $this->set('_serialize', ['tag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Documents']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tags->patchEntity($tag, $this->request->data);
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The {0} has been saved.', 'Tag'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Tag'));
            }
        }
        $documents = $this->Tags->Documents->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'documents'));
        $this->set('_serialize', ['tag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        if ($this->Tags->delete($tag)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Tag'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Tag'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
