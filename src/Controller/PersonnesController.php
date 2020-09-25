<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Personnes Controller
 *
 * @property \App\Model\Table\PersonnesTable $Personnes
 *
 * @method \App\Model\Entity\Personne[] paginate($object = null, array $settings = [])
 */
class PersonnesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SituationsFamiliales', 'Sexes']
        ];
        $personnes = $this->paginate($this->Personnes);

        $this->set(compact('personnes'));
        $this->set('_serialize', ['personnes']);
    }

    /**
     * View method
     *
     * @param string|null $id Personne id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personne = $this->Personnes->get($id, [
            'contain' => ['SituationsFamiliales', 'Sexes', 'Cadeaux', 'Membres', 'Personnels']
        ]);

        $this->set('personne', $personne);
        $this->set('_serialize', ['personne']);
    }

    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personne = $this->Personnes->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datedenaissance');
            $personne = $this->Personnes->patchEntity($personne, $this->request->data);
            if ($this->Personnes->save($personne)) {
                $this->Flash->success(__('The {0} has been saved.', 'Personne'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personne'));
            }
        }
        $situationsFamiliales = $this->Personnes->SituationsFamiliales->find('list', ['limit' => 200]);
        $sexes = $this->Personnes->Sexes->find('list', ['limit' => 200]);
        $this->set(compact('personne', 'situationsFamiliales', 'sexes'));
        $this->set('_serialize', ['personne']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Personne id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personne = $this->Personnes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personne = $this->Personnes->patchEntity($personne, $this->request->data);
            if ($this->Personnes->save($personne)) {
                $this->Flash->success(__('The {0} has been saved.', 'Personne'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personne'));
            }
        }
        $situationsFamiliales = $this->Personnes->SituationsFamiliales->find('list', ['limit' => 200]);
        $sexes = $this->Personnes->Sexes->find('list', ['limit' => 200]);
        $this->set(compact('personne', 'situationsFamiliales', 'sexes'));
        $this->set('_serialize', ['personne']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Personne id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personne = $this->Personnes->get($id);
        if ($this->Personnes->delete($personne)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Personne'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Personne'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
