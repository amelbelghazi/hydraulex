<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesEtatsRessource Controller
 *
 * @property \App\Model\Table\TypesEtatsRessourceTable $TypesEtatsRessource
 *
 * @method \App\Model\Entity\TypesEtatsRessource[] paginate($object = null, array $settings = [])
 */
class TypesEtatsRessourceController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesEtatsRessource = $this->paginate($this->TypesEtatsRessource);

        $this->set(compact('typesEtatsRessource'));
        $this->set('_serialize', ['typesEtatsRessource']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Etats Ressource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesEtatsRessource = $this->TypesEtatsRessource->get($id, [
            'contain' => []
        ]);

        $this->set('typesEtatsRessource', $typesEtatsRessource);
        $this->set('_serialize', ['typesEtatsRessource']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesEtatsRessource = $this->TypesEtatsRessource->newEntity();
        if ($this->request->is('post')) {
            $typesEtatsRessource = $this->TypesEtatsRessource->patchEntity($typesEtatsRessource, $this->request->data);
            if ($this->TypesEtatsRessource->save($typesEtatsRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Etats Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Etats Ressource'));
            }
        }
        $this->set(compact('typesEtatsRessource'));
        $this->set('_serialize', ['typesEtatsRessource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Etats Ressource id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesEtatsRessource = $this->TypesEtatsRessource->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesEtatsRessource = $this->TypesEtatsRessource->patchEntity($typesEtatsRessource, $this->request->data);
            if ($this->TypesEtatsRessource->save($typesEtatsRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Etats Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Etats Ressource'));
            }
        }
        $this->set(compact('typesEtatsRessource'));
        $this->set('_serialize', ['typesEtatsRessource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Etats Ressource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesEtatsRessource = $this->TypesEtatsRessource->get($id);
        if ($this->TypesEtatsRessource->delete($typesEtatsRessource)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Etats Ressource'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Etats Ressource'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
