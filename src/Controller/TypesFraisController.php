<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesFrais Controller
 *
 * @property \App\Model\Table\TypesFraisTable $TypesFrais
 *
 * @method \App\Model\Entity\TypesFrai[] paginate($object = null, array $settings = [])
 */
class TypesFraisController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesFrais = $this->paginate($this->TypesFrais);

        $this->set(compact('typesFrais'));
        $this->set('_serialize', ['typesFrais']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Frai id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesFrai = $this->TypesFrais->get($id, [
            'contain' => []
        ]);

        $this->set('typesFrai', $typesFrai);
        $this->set('_serialize', ['typesFrai']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesFrai = $this->TypesFrais->newEntity();
        if ($this->request->is('post')) {
            $typesFrai = $this->TypesFrais->patchEntity($typesFrai, $this->request->data);
            if ($this->TypesFrais->save($typesFrai)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Frai'));
                if ($this->request->is('ajax'))
                    return $this->redirect(['action' => 'listTypesFrais']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Frai'));
            }
        }
        //$typesFrais = $this->TypesFrais->find('list', ['limit' => 200]);
        $this->set(compact('typesFrai'));
        $this->set('_serialize', ['typesFrai']);
    }

    

    /**
     * Edit method
     *
     * @param string|null $id Types Frai id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesFrai = $this->TypesFrais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesFrai = $this->TypesFrais->patchEntity($typesFrai, $this->request->data);
            if ($this->TypesFrais->save($typesFrai)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Frai'));
                $typesFrais = $this->TypesFrais->find('list', ['limit' => 200]);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Frai'));
            }
        }
        $this->set(compact('typesFrai'));
        $this->set('_serialize', ['typesFrai']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Frai id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesFrai = $this->TypesFrais->get($id);
        if ($this->TypesFrais->delete($typesFrai)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Frai'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Frai'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
