<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Salaires Controller
 *
 * @property \App\Model\Table\SalairesTable $Salaires
 *
 * @method \App\Model\Entity\Salaire[] paginate($object = null, array $settings = [])
 */
class SalairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnels', 'Personnels.Personnes']
        ];
        $salaires = $this->paginate($this->Salaires);

        $this->set(compact('salaires'));
        $this->set('_serialize', ['salaires']);
    }

    /**
     * View method
     *
     * @param string|null $id Salaire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salaire = $this->Salaires->get($id, [
            'contain' => ['Personnels', 'Paies']
        ]);

        $this->set('salaire', $salaire);
        $this->set('_serialize', ['salaire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salaire = $this->Salaires->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datesalaire');
            $salaire = $this->Salaires->patchEntity($salaire, $this->request->data);
            $personne_id = $this->request->data['personne_id'];
            $personnel = $this->Salaires->Personnels
                              ->find()
                              ->select()
                              ->where(' personne_id ='.$personne_id)
                              ->first();
            $salaire->personnel_id = $personnel->id; 
            if ($this->Salaires->save($salaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Salaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Salaire'));
            }
        }
        $personnes = $this->Salaires->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $this->set(compact('salaire', 'personnes'));
        $this->set('_serialize', ['salaire']);
    }

    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }
    /**
     * Edit method
     *
     * @param string|null $id Salaire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salaire = $this->Salaires->get($id, [
            'contain' => ['Personnels', 'Personnels.Personnes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datesalaire');
            $salaire = $this->Salaires->patchEntity($salaire, $this->request->data);
            if ($this->Salaires->save($salaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Salaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Salaire'));
            }
        }
        $personnes = $this->Salaires->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $this->set(compact('salaire', 'personnes'));
        $this->set('_serialize', ['salaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Salaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salaire = $this->Salaires->get($id);
        if ($this->Salaires->delete($salaire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Salaire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Salaire'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
