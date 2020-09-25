<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DocumentsTags Controller
 *
 * @property \App\Model\Table\DocumentsTagsTable $DocumentsTags
 *
 * @method \App\Model\Entity\DocumentsTag[] paginate($object = null, array $settings = [])
 */
class DocumentsTagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Documents', 'Tags']
        ];
        $documentsTags = $this->paginate($this->DocumentsTags);

        $this->set(compact('documentsTags'));
        $this->set('_serialize', ['documentsTags']);
    }

    /**
     * View method
     *
     * @param string|null $id Documents Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documentsTag = $this->DocumentsTags->get($id, [
            'contain' => ['Documents', 'Tags']
        ]);

        $this->set('documentsTag', $documentsTag);
        $this->set('_serialize', ['documentsTag']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $documentsTag = $this->DocumentsTags->newEntity();
        if ($this->request->is('post')) {
            $documentsTag = $this->DocumentsTags->patchEntity($documentsTag, $this->request->data);
            if ($this->DocumentsTags->save($documentsTag)) {
                $this->Flash->success(__('The {0} has been saved.', 'Documents Tag'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Documents Tag'));
            }
        }
        $documents = $this->DocumentsTags->Documents->find('list', ['limit' => 200]);
        $tags = $this->DocumentsTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('documentsTag', 'documents', 'tags'));
        $this->set('_serialize', ['documentsTag']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Documents Tag id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documentsTag = $this->DocumentsTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $documentsTag = $this->DocumentsTags->patchEntity($documentsTag, $this->request->data);
            if ($this->DocumentsTags->save($documentsTag)) {
                $this->Flash->success(__('The {0} has been saved.', 'Documents Tag'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Documents Tag'));
            }
        }
        $documents = $this->DocumentsTags->Documents->find('list', ['limit' => 200]);
        $tags = $this->DocumentsTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('documentsTag', 'documents', 'tags'));
        $this->set('_serialize', ['documentsTag']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Documents Tag id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documentsTag = $this->DocumentsTags->get($id);
        if ($this->DocumentsTags->delete($documentsTag)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Documents Tag'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Documents Tag'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
