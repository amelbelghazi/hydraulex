<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fonctions Controller
 *
 * @property \App\Model\Table\FonctionsTable $Fonctions
 *
 * @method \App\Model\Entity\Fonction[] paginate($object = null, array $settings = [])
 */
class FonctionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FonctionsAdministratives', 'FonctionsChantier']
        ];

        $fonctions = $this->paginate($this->Fonctions);

        $this->set(compact('fonctions'));
        $this->set('_serialize', ['fonctions']);
    }

    /**
     * View method
     *
     * @param string|null $id Fonction id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fonction = $this->Fonctions->get($id, [
            'contain' => ['FonctionsAdministratives', 'FonctionsChantier', 'PositionsChantiers']
        ]);

        $this->set('fonction', $fonction);
        $this->set('_serialize', ['fonction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fonction = $this->Fonctions->newEntity();
        if ($this->request->is('post')) {
            $fonction = $this->Fonctions->patchEntity($fonction, $this->request->data);
            if ($this->Fonctions->save($fonction)) {
                if ($this->request->data['types_fonction_id'] == "1")
               {
                    $fonctiona = $this->Fonctions->FonctionsAdministratives->newEntity(); 
                    $fonctiona->fonction_id = $fonction->id;
                    $this->Fonctions->FonctionsAdministratives->save($fonctiona);
               }
                if ($this->request->data['types_fonction_id'] == "2")
               {
                    $fonctionc = $this->Fonctions->FonctionsChantier->newEntity(); 
                    $fonctionc->fonction_id = $fonction->id;
                    $this->Fonctions->FonctionsChantier->save($fonctionc);
               }
                $this->Flash->success(__('The {0} has been saved.', 'Fonction'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fonction'));
            }
        }
        $this->set(compact('fonction'));
        $this->set('_serialize', ['fonction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fonction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fonction = $this->Fonctions->get($id, [
            'contain' => ['FonctionsAdministratives', 'FonctionsChantier']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fonction = $this->Fonctions->patchEntity($fonction, $this->request->data);
            if ($this->Fonctions->save($fonction)) {
                $typefonction = $fonction->has('fonctions_administratives') ? 1 : 2; 
                if ($this->request->data['types_fonction_id'] != $typefonction){
                    if ($this->request->data['types_fonction_id'] == "1")
                    {
                        $fonctionc = $this->Fonctions->FonctionsChantier
                                          ->find()
                                          ->select()
                                          ->where(' fonction_id = '.$fonction->id);
                        $this->Fonctions->FonctionsChantier->delete($fonctionc); 
                        $fonctiona = $this->Fonctions->FonctionsAdministratives->newEntity(); 
                        $fonctiona->fonction_id = $fonction->id;
                        $this->Fonctions->FonctionsAdministratives->save($fonctiona);
                    }
                    if ($this->request->data['types_fonction_id'] == "2")
                    {
                        $fonctiona = $this->Fonctions->FonctionsAdministratives
                                          ->find()
                                          ->select()
                                          ->where(' fonction_id = '.$fonction->id);
                        $this->Fonctions->FonctionsAdministratives->delete($fonctiona); 
                        $fonctionc = $this->Fonctions->FonctionsChantier->newEntity(); 
                        $fonctionc->fonction_id = $fonction->id;
                        $this->Fonctions->FonctionsChantier->save($fonctiona);
                    }
                }
                $this->Flash->success(__('The {0} has been saved.', 'Fonction'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Fonction'));
            }
        }
        $this->set(compact('fonction'));
        $this->set('_serialize', ['fonction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fonction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fonction = $this->Fonctions->get($id);
        if ($this->Fonctions->delete($fonction)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Fonction'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Fonction'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
