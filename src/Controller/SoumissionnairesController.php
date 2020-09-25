<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Soumissionnaires Controller
 *
 * @property \App\Model\Table\SoumissionnairesTable $Soumissionnaires
 *
 * @method \App\Model\Entity\Soumissionnaire[] paginate($object = null, array $settings = [])
 */
class SoumissionnairesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $soumissionnaires = $this->paginate($this->Soumissionnaires, 
            ['contain'=> ['Qualifications', 'Wilayas']
            ]
        );

        $this->set(compact('soumissionnaires'));
        $this->set('_serialize', ['soumissionnaires']);
    }

    /**
     * View method
     *
     * @param string|null $id Soumissionnaire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $soumissionnaire = $this->Soumissionnaires->get($id, [
            'contain' => ['Qualifications', 'Soumissions']
        ]);

        $this->set('soumissionnaire', $soumissionnaire);
        $this->set('_serialize', ['soumissionnaire']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $soumissionnaire = $this->Soumissionnaires->newEntity();
        $qualification = $this->Soumissionnaires->Qualifications->newEntity();
        if ($this->request->is('post')) {
            $soumissionnaire = $this->Soumissionnaires->patchEntity($soumissionnaire, $this->request->data);
            if ($this->Soumissionnaires->save($soumissionnaire)) {
                $qualification->libelle = $this->request->data['qualifications']['libelle'];
                $qualification->soumissionnaire_id = $soumissionnaire->id; 
                $this->Soumissionnaires->Qualifications->save($qualification);
                $this->Flash->success(__('The {0} has been saved.', 'Soumissionnaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Soumissionnaire'));
            }
        } 
        $wilayas = $this->Soumissionnaires->Wilayas->find('list', ['limit' => 200]);
        $qualifications = $this->Soumissionnaires->Qualifications->find('list', ['limit' => 200]);
        $this->set(compact('soumissionnaire', 'qualifications', 'qualification', 'wilayas'));
        $this->set('_serialize', ['soumissionnaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Soumissionnaire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $soumissionnaire = $this->Soumissionnaires->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $soumissionnaire = $this->Soumissionnaires->patchEntity($soumissionnaire, $this->request->data);
            if ($this->Soumissionnaires->save($soumissionnaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Soumissionnaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Soumissionnaire'));
            }
        }
        $wilayas = $this->Soumissionnaires->Wilayas->find('list', ['limit' => 200]);
        $this->set(compact('soumissionnaire', 'wilayas'));
        $this->set('_serialize', ['soumissionnaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Soumissionnaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $soumissionnaire = $this->Soumissionnaires->get($id);
        if ($this->Soumissionnaires->delete($soumissionnaire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Soumissionnaire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Soumissionnaire'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
