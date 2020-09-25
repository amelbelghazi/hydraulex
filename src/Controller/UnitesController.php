<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Unites Controller
 *
 * @property \App\Model\Table\UnitesTable $Unites
 *
 * @method \App\Model\Entity\Unite[] paginate($object = null, array $settings = [])
 */
class UnitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $unites = $this->paginate($this->Unites);

        $this->set(compact('unites'));
        $this->set('_serialize', ['unites']);
    }

    /**
     * View method
     *
     * @param string|null $id Unite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unite = $this->Unites->get($id, [
            'contain' => ['ContraintesSoumission', 'DetailsArticle', 'DetailsArticlesAvenant', 'DetailsBonCommande', 'Produits']
        ]);

        $this->set('unite', $unite);
        $this->set('_serialize', ['unite']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unite = $this->Unites->newEntity();
        if ($this->request->is('post')) {
            $unite = $this->Unites->patchEntity($unite, $this->request->data);
            if ($this->Unites->save($unite)) {
                $this->Flash->success(__('The {0} has been saved.', 'Unite'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Unite'));
            }
        }
        $this->set(compact('unite'));
        $this->set('_serialize', ['unite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Unite id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unite = $this->Unites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unite = $this->Unites->patchEntity($unite, $this->request->data);
            if ($this->Unites->save($unite)) {
                $this->Flash->success(__('The {0} has been saved.', 'Unite'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Unite'));
            }
        }
        $this->set(compact('unite'));
        $this->set('_serialize', ['unite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Unite id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unite = $this->Unites->get($id);
        if ($this->Unites->delete($unite)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Unite'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Unite'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
