<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EntretiensRessources Controller
 *
 * @property \App\Model\Table\EntretiensRessourcesTable $EntretiensRessources
 *
 * @method \App\Model\Entity\EntretiensRessource[] paginate($object = null, array $settings = [])
 */
class EntretiensRessourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ressources', 'Entretiens', 'Entretiens.Periodes']
        ];
        $entretiensRessources = $this->paginate($this->EntretiensRessources);

        $this->set(compact('entretiensRessources'));
        $this->set('_serialize', ['entretiensRessources']);
    }

    /**
     * View method
     *
     * @param string|null $id Entretiens Ressource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entretiensRessource = $this->EntretiensRessources->get($id, [
            'contain' => ['Ressources', 'Entretiens', 'EntretiensRessourcesPeriodiques', 'Entretiens.Periodes']
        ]);

        $this->set('entretiensRessource', $entretiensRessource);
        $this->set('_serialize', ['entretiensRessource']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entretiensRessource = $this->EntretiensRessources->newEntity();
        if ($this->request->is('post')) {
            try{
                foreach ($this->request->data['Entretiens'] as $entretien) {
                    $entretiens = $this->EntretiensRessources->Entretiens->newEntity();
                    $entretiens = $this->EntretiensRessources->Entretiens->patchEntity($entretiens, $entretien);
                    $this->EntretiensRessources->Entretiens->save($entretiens);
                    $entretiensRessource = $this->EntretiensRessources->newEntity();
                    $entretiensRessource->ressource_id = $this->request->data['ressource_id']; 
                    $entretiensRessource->entretien_id = $entretiens->id; 
                    $this->EntretiensRessources->save($entretiensRessource);
                }
                $this->Flash->success(__('The {0} has been saved.', 'Entretiens Ressource'));
                return $this->redirect(['action' => 'index']);
            }
            catch(Exception $e){
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Entretiens Ressource'));
            }
        }
        $periodes = $this->EntretiensRessources->Entretiens->Periodes->find('list', ['limit' => 200]);
        $ressources = $this->EntretiensRessources->Ressources->find('list', ['limit' => 200]);
        $entretiens = $this->EntretiensRessources->Entretiens->find('list', ['limit' => 200]);
        $this->set(compact('entretiensRessource', 'ressources', 'entretiens', 'periodes'));
        $this->set('_serialize', ['entretiensRessource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Entretiens Ressource id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entretiensRessource = $this->EntretiensRessources->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entretiensRessource = $this->EntretiensRessources->patchEntity($entretiensRessource, $this->request->data);
            if ($this->EntretiensRessources->save($entretiensRessource)) {
                $this->Flash->success(__('The {0} has been saved.', 'Entretiens Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Entretiens Ressource'));
            }
        }
        $periodes = $this->EntretiensRessources->Entretiens->Periodes->find('list', ['limit' => 200]);
        $ressources = $this->EntretiensRessources->Ressources->find('list', ['limit' => 200]);
        $entretiens = $this->EntretiensRessources->Entretiens->find('list', ['limit' => 200]);
        $this->set(compact('entretiensRessource', 'ressources', 'entretiens', 'periodes'));
        $this->set('_serialize', ['entretiensRessource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Entretiens Ressource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entretiensRessource = $this->EntretiensRessources->get($id);
        if ($this->EntretiensRessources->delete($entretiensRessource)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Entretiens Ressource'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Entretiens Ressource'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
