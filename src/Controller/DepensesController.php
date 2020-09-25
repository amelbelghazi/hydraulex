<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Depenses Controller
 *
 * @property \App\Model\Table\DepensesTable $Depenses
 *
 * @method \App\Model\Entity\Depense[] paginate($object = null, array $settings = [])
 */
class DepensesController extends AppController
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
            if (($this->request->data['critere']=='Types_Depense')) {
              $depenses = $this->Depenses->find()->innerJoinWith('TypesDepenses')->select()->where('TypesDepenses.name LIKE "%'.$rech.'%"');

            } else {
                if (($this->request->data['critere']=='Departement')) {
                 
                  $depenses = $this->Depenses->find()->innerJoinWith('Departements')->select()->where('Departements.nom LIKE "%'.$rech.'%"');
                
                } else {
                        $depenses = $this->Depenses->find()->select()->where('Depenses.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                
                 
                }
        }else{
            $depenses=$this->Depenses; 
        }
        
        $this->paginate = [
            'contain' => ['TypesDepenses', 'Departements']
        ];
        $depenses = $this->paginate($depenses);

        $this->set(compact('depenses'));
        $this->set('_serialize', ['depenses']);
    }
    /**
     * View method
     *
     * @param string|null $id Depense id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $depense = $this->Depenses->get($id, [
            'contain' => ['TypesDepenses', 'Departements']
        ]);

        $this->set('depense', $depense);
        $this->set('_serialize', ['depense']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $depense = $this->Depenses->newEntity();
        if ($this->request->is('post')) {
            $depense = $this->Depenses->patchEntity($depense, $this->request->data);
            if ($this->Depenses->save($depense)) {
                $this->Flash->success(__('The {0} has been saved.', 'Depense'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Depense'));
            }
        }
        $this->_lists();
        $this->set(compact('depense'));
        $this->set('_serialize', ['depense']);
    }

    function _lists()
    {
        $typesDepenses = $this->Depenses->TypesDepenses->find('list', array('recursive' => 0,'fields' => array('TypesDepenses.id', 'TypesDepenses.name')));
        $departements = $this->Depenses->Departements->find('list');
        $this->set(compact('typesDepenses', 'departements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Depense id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $depense = $this->Depenses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $depense = $this->Depenses->patchEntity($depense, $this->request->data);
            if ($this->Depenses->save($depense)) {
                $this->Flash->success(__('The {0} has been saved.', 'Depense'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Depense'));
            }
        }
        $typesDepenses = $this->Depenses->TypesDepenses->find('list', ['limit' => 200]);
        $departements = $this->Depenses->Departements->find('list', ['limit' => 200]);
        $this->set(compact('depense', 'typesDepenses', 'departements'));
        $this->set('_serialize', ['depense']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Depense id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $depense = $this->Depenses->get($id);
        if ($this->Depenses->delete($depense)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Depense'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Depense'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
