<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fournisseurs Controller
 *
 * @property \App\Model\Table\FournisseursTable $Fournisseurs
 *
 * @method \App\Model\Entity\Fournisseur[] paginate($object = null, array $settings = [])
 */
class FournisseursController extends AppController
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
            $fournisseurs = $this->Fournisseurs->find()->select()->where('Fournisseurs.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
        }else{
            $fournisseurs=$this->Fournisseurs; 
        }
        $fournisseurs = $this->paginate($fournisseurs);

        $this->set(compact('fournisseurs'));
        $this->set('_serialize', ['fournisseurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Fournisseur id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fournisseur = $this->Fournisseurs->get($id, [
            'contain' => ['Achats', 'BonsCommandes']
        ]);

        $this->set('fournisseur', $fournisseur);
        $this->set('_serialize', ['fournisseur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fournisseur = $this->Fournisseurs->newEntity();
        if ($this->request->is('post')) {
            $fournisseur = $this->Fournisseurs->patchEntity($fournisseur, $this->request->data);
            if ($this->Fournisseurs->save($fournisseur)) {
                $this->Flash->success(__('The {0} has been saved.', 'Fournisseur'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fournisseur'));
            }
        }
        $this->set(compact('fournisseur'));
        $this->set('_serialize', ['fournisseur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fournisseur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fournisseur = $this->Fournisseurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fournisseur = $this->Fournisseurs->patchEntity($fournisseur, $this->request->data);
            if ($this->Fournisseurs->save($fournisseur)) {
                $this->Flash->success(__('The {0} has been saved.', 'Fournisseur'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fournisseur'));
            }
        }
        $this->set(compact('fournisseur'));
        $this->set('_serialize', ['fournisseur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fournisseur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fournisseur = $this->Fournisseurs->get($id);
        if ($this->Fournisseurs->delete($fournisseur)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Fournisseur'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Fournisseur'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
