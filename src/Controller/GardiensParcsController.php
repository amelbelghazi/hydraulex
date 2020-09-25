<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GardiensParcs Controller
 *
 * @property \App\Model\Table\GardiensParcsTable $GardiensParcs
 *
 * @method \App\Model\Entity\GardiensParc[] paginate($object = null, array $settings = [])
 */
class GardiensParcsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Parcs', 'Gardiens']
        ];
        $gardiensParcs = $this->paginate($this->GardiensParcs);

        $this->set(compact('gardiensParcs'));
        $this->set('_serialize', ['gardiensParcs']);
    }

    /**
     * View method
     *
     * @param string|null $id Gardiens Parc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gardiensParc = $this->GardiensParcs->get($id, [
            'contain' => ['Parcs', 'Gardiens']
        ]);

        $this->set('gardiensParc', $gardiensParc);
        $this->set('_serialize', ['gardiensParc']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gardiensParc = $this->GardiensParcs->newEntity();
        if ($this->request->is('post')) {
            $gardiensParc = $this->GardiensParcs->patchEntity($gardiensParc, $this->request->data);
            if ($this->GardiensParcs->save($gardiensParc)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gardiens Parc'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gardiens Parc'));
            }
        }
        $parcs = $this->GardiensParcs->Parcs->find('list', ['limit' => 200]);
        $gardiens = $this->GardiensParcs->Gardiens->find('list', ['limit' => 200]);
        $this->set(compact('gardiensParc', 'parcs', 'gardiens'));
        $this->set('_serialize', ['gardiensParc']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gardiens Parc id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gardiensParc = $this->GardiensParcs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gardiensParc = $this->GardiensParcs->patchEntity($gardiensParc, $this->request->data);
            if ($this->GardiensParcs->save($gardiensParc)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gardiens Parc'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gardiens Parc'));
            }
        }
        $parcs = $this->GardiensParcs->Parcs->find('list', ['limit' => 200]);
        $gardiens = $this->GardiensParcs->Gardiens->find('list', ['limit' => 200]);
        $this->set(compact('gardiensParc', 'parcs', 'gardiens'));
        $this->set('_serialize', ['gardiensParc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gardiens Parc id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gardiensParc = $this->GardiensParcs->get($id);
        if ($this->GardiensParcs->delete($gardiensParc)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Gardiens Parc'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Gardiens Parc'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
