<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesRessources Controller
 *
 * @property \App\Model\Table\TypesRessourcesTable $TypesRessources
 *
 * @method \App\Model\Entity\TypesRessource[] paginate($object = null, array $settings = [])
 */
class TypesRessourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesRessources = $this->paginate($this->TypesRessources);

        $this->set(compact('typesRessources'));
        $this->set('_serialize', ['typesRessources']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Ressource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesRessource = $this->TypesRessources->get($id, [
            'contain' => ['Ressources']
        ]);

        $this->set('typesRessource', $typesRessource);
        $this->set('_serialize', ['typesRessource']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesRessource = $this->TypesRessources->newEntity();
        if ($this->request->is('post')) {
            $typesRessource = $this->TypesRessources->patchEntity($typesRessource, $this->request->data);
            if ($this->TypesRessources->save($typesRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Ressource'));
            }
        }
        $this->set(compact('typesRessource'));
        $this->set('_serialize', ['typesRessource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Ressource id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesRessource = $this->TypesRessources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesRessource = $this->TypesRessources->patchEntity($typesRessource, $this->request->data);
            if ($this->TypesRessources->save($typesRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Ressource'));
            }
        }
        $this->set(compact('typesRessource'));
        $this->set('_serialize', ['typesRessource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Ressource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesRessource = $this->TypesRessources->get($id);
        if ($this->TypesRessources->delete($typesRessource)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Ressource'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Ressource'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
