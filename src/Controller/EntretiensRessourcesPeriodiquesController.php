<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EntretiensRessourcesPeriodiques Controller
 *
 * @property \App\Model\Table\EntretiensRessourcesPeriodiquesTable $EntretiensRessourcesPeriodiques
 *
 * @method \App\Model\Entity\EntretiensRessourcesPeriodique[] paginate($object = null, array $settings = [])
 */
class EntretiensRessourcesPeriodiquesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EntretiensRessources', 'Garages']
        ];
        $entretiensRessourcesPeriodiques = $this->paginate($this->EntretiensRessourcesPeriodiques);

        $this->set(compact('entretiensRessourcesPeriodiques'));
        $this->set('_serialize', ['entretiensRessourcesPeriodiques']);
    }

    /**
     * View method
     *
     * @param string|null $id Entretiens Ressources Periodique id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entretiensRessourcesPeriodique = $this->EntretiensRessourcesPeriodiques->get($id, [
            'contain' => ['EntretiensRessources', 'Garages']
        ]);

        $this->set('entretiensRessourcesPeriodique', $entretiensRessourcesPeriodique);
        $this->set('_serialize', ['entretiensRessourcesPeriodique']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entretiensRessourcesPeriodique = $this->EntretiensRessourcesPeriodiques->newEntity();
        if ($this->request->is('post')) {
            $entretiensRessourcesPeriodique = $this->EntretiensRessourcesPeriodiques->patchEntity($entretiensRessourcesPeriodique, $this->request->data);
            if ($this->EntretiensRessourcesPeriodiques->save($entretiensRessourcesPeriodique)) {
                $this->Flash->success(__('The {0} has been saved.', 'Entretiens Ressources Periodique'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Entretiens Ressources Periodique'));
            }
        }
        $entretiensRessources = $this->EntretiensRessourcesPeriodiques->EntretiensRessources->find('list', ['limit' => 200]);
        $garages = $this->EntretiensRessourcesPeriodiques->Garages->find('list', ['limit' => 200]);
        $this->set(compact('entretiensRessourcesPeriodique', 'entretiensRessources', 'garages'));
        $this->set('_serialize', ['entretiensRessourcesPeriodique']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Entretiens Ressources Periodique id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entretiensRessourcesPeriodique = $this->EntretiensRessourcesPeriodiques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entretiensRessourcesPeriodique = $this->EntretiensRessourcesPeriodiques->patchEntity($entretiensRessourcesPeriodique, $this->request->data);
            if ($this->EntretiensRessourcesPeriodiques->save($entretiensRessourcesPeriodique)) {
                $this->Flash->success(__('The {0} has been saved.', 'Entretiens Ressources Periodique'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Entretiens Ressources Periodique'));
            }
        }
        $entretiensRessources = $this->EntretiensRessourcesPeriodiques->EntretiensRessources->find('list', ['limit' => 200]);
        $garages = $this->EntretiensRessourcesPeriodiques->Garages->find('list', ['limit' => 200]);
        $this->set(compact('entretiensRessourcesPeriodique', 'entretiensRessources', 'garages'));
        $this->set('_serialize', ['entretiensRessourcesPeriodique']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Entretiens Ressources Periodique id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entretiensRessourcesPeriodique = $this->EntretiensRessourcesPeriodiques->get($id);
        if ($this->EntretiensRessourcesPeriodiques->delete($entretiensRessourcesPeriodique)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Entretiens Ressources Periodique'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Entretiens Ressources Periodique'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
