<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesGifts Controller
 *
 * @property \App\Model\Table\TypesGiftsTable $TypesGifts
 *
 * @method \App\Model\Entity\TypesGift[] paginate($object = null, array $settings = [])
 */
class TypesGiftsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typesGifts = $this->paginate($this->TypesGifts);

        $this->set(compact('typesGifts'));
        $this->set('_serialize', ['typesGifts']);
    }

    /**
     * View method
     *
     * @param string|null $id Types Gift id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesGift = $this->TypesGifts->get($id, [
            'contain' => ['Gifts']
        ]);

        $this->set('typesGift', $typesGift);
        $this->set('_serialize', ['typesGift']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesGift = $this->TypesGifts->newEntity();
        if ($this->request->is('post')) {
            $typesGift = $this->TypesGifts->patchEntity($typesGift, $this->request->data);
            if ($this->TypesGifts->save($typesGift)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Gift'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Gift'));
            }
        }
        $this->set(compact('typesGift'));
        $this->set('_serialize', ['typesGift']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Gift id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesGift = $this->TypesGifts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesGift = $this->TypesGifts->patchEntity($typesGift, $this->request->data);
            if ($this->TypesGifts->save($typesGift)) {
                $this->Flash->success(__('The {0} has been saved.', 'Types Gift'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Types Gift'));
            }
        }
        $this->set(compact('typesGift'));
        $this->set('_serialize', ['typesGift']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Gift id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesGift = $this->TypesGifts->get($id);
        if ($this->TypesGifts->delete($typesGift)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Types Gift'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Types Gift'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
