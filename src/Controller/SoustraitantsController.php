<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Soustraitants Controller
 *
 * @property \App\Model\Table\SoustraitantsTable $Soustraitants
 *
 * @method \App\Model\Entity\Soustraitant[] paginate($object = null, array $settings = [])
 */
class SoustraitantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if($this->request->data){
            
            $rech = $this->request->data['search'];
            $soustraitants = $this->Soustraitants->find()->select()->where('Soustraitants.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
              
        }else{
            $soustraitants=$this->Soustraitants; 
        }
        $soustraitants = $this->paginate($soustraitants);

        $this->set(compact('soustraitants'));
        $this->set('_serialize', ['soustraitants']);
    }

    /**
     * View method
     *
     * @param string|null $id Soustraitant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $soustraitant = $this->Soustraitants->get($id, [
            'contain' => ['DetailsArticle', 'DetailsArticlesAvenant', 'ProjetsSoustraitant']
        ]);

        $this->set('soustraitant', $soustraitant);
        $this->set('_serialize', ['soustraitant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $soustraitant = $this->Soustraitants->newEntity();
        if ($this->request->is('post')) {
            $soustraitant = $this->Soustraitants->patchEntity($soustraitant, $this->request->data);
            if ($this->Soustraitants->save($soustraitant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Soustraitant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Soustraitant'));
            }
        }
        $this->set(compact('soustraitant'));
        $this->set('_serialize', ['soustraitant']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Soustraitant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $soustraitant = $this->Soustraitants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $soustraitant = $this->Soustraitants->patchEntity($soustraitant, $this->request->data);
            if ($this->Soustraitants->save($soustraitant)) {
                $this->Flash->success(__('The {0} has been saved.', 'Soustraitant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Soustraitant'));
            }
        }
        $this->set(compact('soustraitant'));
        $this->set('_serialize', ['soustraitant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Soustraitant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $soustraitant = $this->Soustraitants->get($id);
        if ($this->Soustraitants->delete($soustraitant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Soustraitant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Soustraitant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
