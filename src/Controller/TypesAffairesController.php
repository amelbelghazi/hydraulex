<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesAffaires Controller
 *
 * @property \App\Model\Table\TypesAffairesTable $TypesAffaires
 *
 * @method \App\Model\Entity\TypesAffaire[] paginate($object = null, array $settings = [])
 */
class TypesAffairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesAffaires = $this->paginate($this->TypesAffaires);

        $this->set(compact('typesAffaires'));
        $this->set('_serialize', ['typesAffaires']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Affaire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesAffaire = $this->TypesAffaires->get($id, [
            'contain' => ['Affaires']
        ]);

        $this->set('typesAffaire', $typesAffaire);
        $this->set('_serialize', ['typesAffaire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesAffaire = $this->TypesAffaires->newEntity();
        if ($this->request->is('post')) {
            $typesAffaire = $this->TypesAffaires->patchEntity($typesAffaire, $this->request->data);
            if ($this->TypesAffaires->save($typesAffaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Affaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Affaire'));
            }
        }
        $this->set(compact('typesAffaire'));
        $this->set('_serialize', ['typesAffaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Affaire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesAffaire = $this->TypesAffaires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesAffaire = $this->TypesAffaires->patchEntity($typesAffaire, $this->request->data);
            if ($this->TypesAffaires->save($typesAffaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Affaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Affaire'));
            }
        }
        $this->set(compact('typesAffaire'));
        $this->set('_serialize', ['typesAffaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Affaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesAffaire = $this->TypesAffaires->get($id);
        if ($this->TypesAffaires->delete($typesAffaire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Affaire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Affaire'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
