<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Soumissions Controller
 *
 * @property \App\Model\Table\SoumissionsTable $Soumissions
 *
 * @method \App\Model\Entity\Soumission[] paginate($object = null, array $settings = [])
 */
class SoumissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
   public function index() 
    {

        if($this->request->data){
            //debug($this->request->data);
            $rech = $this->request->data['search'];
            if (($this->request->data['critere']=='affaire_id')) {

                 $soumissions = $this->Soumissions->find()->innerJoinWith('Affaires')->select()->where('Affaires.intitule LIKE "%'.$rech.'%"');

            } else {
                if (($this->request->data['critere']=='soumissionnaire_id')) {
               
                $soumissions = $this->Soumissions->find()->innerJoinWith('Soumissionnaires')->select()->where('Soumissionnaires.nom LIKE "%'.$rech.'%"');
                } else {
                    $soumissions = $this->Soumissions->find()->select()->where('Soumissions.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }
                 
                }
        }else{
            $soumissions=$this->Soumissions; 
        }
        $this->paginate = [
            'contain' => ['Soumissionnaires', 'Affaires']
        ];
        $soumissions = $this->paginate($soumissions);

        $this->set(compact('soumissions'));
        $this->set('_serialize', ['soumissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Soumission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $soumission = $this->Soumissions->get($id, [
            'contain' => ['Soumissionnaires', 'Affaires', 'Attributions']
        ]);

        $this->set('soumission', $soumission);
        $this->set('_serialize', ['soumission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $soumission = $this->Soumissions->newEntity();
        $soumissionnaire = $this->Soumissions->Soumissionnaires->newEntity();
        if ($this->request->is('post')) {
            $soumission = $this->Soumissions->patchEntity($soumission, $this->request->data);
            if ($this->Soumissions->save($soumission)) {
                $this->Flash->success(__('The {0} has been saved.', 'Soumission'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Soumission'));
            }
        }
        $wilayas = $this->Soumissions->Soumissionnaires->Wilayas->find('list', ['limit' => 200]);
        $soumissionnaires = $this->Soumissions->Soumissionnaires->find('list', ['limit' => 200]);
        $affaires = $this->Soumissions->Affaires->find('list', ['limit' => 200]);
        $this->set(compact('soumission', 'soumissionnaires', 'soumissionnaire', 'affaires', 'wilayas'));
        $this->set('_serialize', ['soumission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Soumission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $soumission = $this->Soumissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $soumission = $this->Soumissions->patchEntity($soumission, $this->request->data);
            if ($this->Soumissions->save($soumission)) {
                $this->Flash->success(__('The {0} has been saved.', 'Soumission'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Soumission'));
            }
        }
        $wilayas = $this->Soumissions->Soumissionnaires->Wilayas->find('list', ['limit' => 200]);
        $soumissionnaires = $this->Soumissions->Soumissionnaires->find('list', ['limit' => 200]);
        $affaires = $this->Soumissions->Affaires->find('list', ['limit' => 200]);
        $this->set(compact('soumission', 'soumissionnaires', 'affaires', 'wilayas'));
        $this->set('_serialize', ['soumission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Soumission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $soumission = $this->Soumissions->get($id);
        if ($this->Soumissions->delete($soumission)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Soumission'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Soumission'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
