<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SituationsFamiliales Controller
 *
 * @property \App\Model\Table\SituationsFamilialesTable $SituationsFamiliales
 *
 * @method \App\Model\Entity\SituationsFamiliale[] paginate($object = null, array $settings = [])
 */
class SituationsFamilialesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $situationsFamiliales = $this->paginate($this->SituationsFamiliales);

        $this->set(compact('situationsFamiliales'));
        $this->set('_serialize', ['situationsFamiliales']);
    }

    /**
     * View method
     *
     * @param string|null $id Situations Familiale id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $situationsFamiliale = $this->SituationsFamiliales->get($id, [
            'contain' => ['Personnes']
        ]);

        $this->set('situationsFamiliale', $situationsFamiliale);
        $this->set('_serialize', ['situationsFamiliale']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $situationsFamiliale = $this->SituationsFamiliales->newEntity();
        if ($this->request->is('post')) {
            $situationsFamiliale = $this->SituationsFamiliales->patchEntity($situationsFamiliale, $this->request->data);
            if ($this->SituationsFamiliales->save($situationsFamiliale)) {
                $this->Flash->success(__('The {0} has been saved.', 'Situations Familiale'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Situations Familiale'));
            }
        }
        $this->set(compact('situationsFamiliale'));
        $this->set('_serialize', ['situationsFamiliale']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Situations Familiale id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $situationsFamiliale = $this->SituationsFamiliales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $situationsFamiliale = $this->SituationsFamiliales->patchEntity($situationsFamiliale, $this->request->data);
            if ($this->SituationsFamiliales->save($situationsFamiliale)) {
                $this->Flash->success(__('The {0} has been saved.', 'Situations Familiale'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Situations Familiale'));
            }
        }
        $this->set(compact('situationsFamiliale'));
        $this->set('_serialize', ['situationsFamiliale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Situations Familiale id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $situationsFamiliale = $this->SituationsFamiliales->get($id);
        if ($this->SituationsFamiliales->delete($situationsFamiliale)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Situations Familiale'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Situations Familiale'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
