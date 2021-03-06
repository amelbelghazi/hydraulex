<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Gifts Controller
 *
 * @property \App\Model\Table\GiftsTable $Gifts
 *
 * @method \App\Model\Entity\Gift[] paginate($object = null, array $settings = [])
 */
class GiftsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnes', 'TypesGifts']
        ];
        $gifts = $this->paginate($this->Gifts);

        $this->set(compact('gifts'));
        $this->set('_serialize', ['gifts']);
    }

    /**
     * View method
     *
     * @param string|null $id Gift id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gift = $this->Gifts->get($id, [
            'contain' => ['Personnes', 'TypesGifts']
        ]);

        $this->set('gift', $gift);
        $this->set('_serialize', ['gift']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gift = $this->Gifts->newEntity();
        if ($this->request->is('post')) {
            $gift = $this->Gifts->patchEntity($gift, $this->request->data);
            if ($this->Gifts->save($gift)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gift'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gift'));
            }
        }
        $personnes = $this->Gifts->Personnes->find('list', ['limit' => 200]);
        $typesGifts = $this->Gifts->TypesGifts->find('list', ['limit' => 200]);
        $this->set(compact('gift', 'personnes', 'typesGifts'));
        $this->set('_serialize', ['gift']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gift id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gift = $this->Gifts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gift = $this->Gifts->patchEntity($gift, $this->request->data);
            if ($this->Gifts->save($gift)) {
                $this->Flash->success(__('The {0} has been saved.', 'Gift'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Gift'));
            }
        }
        $personnes = $this->Gifts->Personnes->find('list', ['limit' => 200]);
        $typesGifts = $this->Gifts->TypesGifts->find('list', ['limit' => 200]);
        $this->set(compact('gift', 'personnes', 'typesGifts'));
        $this->set('_serialize', ['gift']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gift id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gift = $this->Gifts->get($id);
        if ($this->Gifts->delete($gift)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Gift'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Gift'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
