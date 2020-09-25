<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chantiers Controller
 *
 * @property \App\Model\Table\ChantiersTable $Chantiers
 *
 * @method \App\Model\Entity\Chantier[] paginate($object = null, array $settings = [])
 */
class ChantiersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Marches', 'Marches.DetailsMarches', 'Wilayas', 'EtatsChantiers', 'EtatsChantiers.TypesEtatsChantiers']
        ];
        $chantiers = $this->paginate($this->Chantiers);

        $this->set(compact('chantiers'));
        $this->set('_serialize', ['chantiers']);
    }

    /**
     * View method
     *
     * @param string|null $id Chantier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chantier = $this->Chantiers->get($id, [
            'contain' => ['Marches', 'Wilayas', 'EtatsChantiers', 'Responsables', 'FraisChantiers', 'PositionsChantiers']
        ]);

        $this->set('chantier', $chantier);
        $this->set('_serialize', ['chantier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chantier = $this->Chantiers->newEntity();
        if ($this->request->is('post')) {
            $chantier = $this->Chantiers->patchEntity($chantier, $this->request->data);
            $detailsmarches_id = $this->request->data['details_marche_id'];
            $marche_id = $this->Chantiers->Marches->DetailsMarches->get($detailsmarches_id)->marche_id;
            $chantier->marche_id = $marche_id; 
            if ($this->Chantiers->save($chantier)) {
                if($this->request->data['personne_id'] != ''){
                    $personnel = $this->Chantiers->Responsables->Personnels
                                      ->find()->select()
                                      ->where('personne_id = '.$this->request->data['personne_id'])
                                      ->first();
                    $responsable = $this->Chantiers->Responsables->newEntity();
                    $responsable->personnel_id = $personnel->id; 
                    $responsable->chantier_id = $chantier->id;
                    $this->Chantiers->Responsables->save($responsable);
                }
                $etatChantier = $this->Chantiers->EtatsChantiers->newEntity();
                $etatChantier->date = date('y-m-d'); 
                $etatChantier->cause = $this->request->data['cause']; 
                $etatChantier->chantier_id = $chantier->id;
                $etatChantier->types_etats_chantier_id = $this->request->data['types_etats_chantier_id'];
                $this->Chantiers->EtatsChantiers->save($etatChantier);
                $this->Flash->success(__('The {0} has been saved.', 'Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Chantier'));
            }
        }
        $wilayas = $this->Chantiers->Wilayas->find('list', ['limit' => 200]);
        $typeEtatsChantiers = $this->Chantiers->EtatsChantiers->TypesEtatsChantiers->find('list', ['limit' => 200]);
        $detailsMarches = $this->Chantiers->Marches->DetailsMarches->find('list')
                                                ->select()
                                                ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $personnes = $this->Chantiers->Responsables->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $this->set(compact('chantier', 'wilayas', 'typeEtatsChantiers', 'personnes', 'etats', 'detailsMarches'));
        $this->set('_serialize', ['chantier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chantier id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chantier = $this->Chantiers->get($id, [
            'contain' => ['Responsables', 'Responsables.Personnels', 'Responsables.Personnels.Personnes', 'Wilayas' , 'Marches', 'Marches.DetailsMarches', 'EtatsChantiers', 'EtatsChantiers.TypesEtatsChantiers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chantier = $this->Chantiers->patchEntity($chantier, $this->request->data);
            $detailsmarches_id = $this->request->data['details_marche_id'];
            $marche_id = $this->Chantiers->Marches->DetailsMarches->get($detailsmarches_id)->marche_id;
            $chantier->marche_id = $marche_id; 
            if ($this->Chantiers->save($chantier)) {
                $personne_id = end($chantier->responsables)->personnel->personne_id;
                if($this->request->data['personne_id'] != '' && $this->request->data['personne_id'] != $personne_id){
                    $personnel = $this->Chantiers->Responsables->Personnels
                                      ->find()->select()
                                      ->where('personne_id = '.$this->request->data['personne_id'])
                                      ->first();
                    $responsable = $this->Chantiers->Responsables->newEntity();
                    $responsable->personnel_id = $personnel->id; 
                    $responsable->chantier_id = $chantier->id;
                    $this->Chantiers->Responsables->save($responsable);
                }
                $typesEtat = end($chantier->etats_chantiers)->types_etats_chantier_id;
                if($this->request->data['types_etats_chantier_id'] != $typesEtat){
                    $etatChantier = $this->Chantiers->EtatsChantiers->newEntity();
                    $etatChantier->date = date('y-m-d'); 
                    $etatChantier->cause = $this->request->data['cause']; 
                    $etatChantier->chantier_id = $chantier->id;
                    $etatChantier->types_etats_chantier_id = $this->request->data['types_etats_chantier_id'];
                    $this->Chantiers->EtatsChantiers->save($etatChantier);
                }
                $this->Flash->success(__('The {0} has been saved.', 'Chantier'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Chantier'));
            }
        }
        $wilayas = $this->Chantiers->Wilayas->find('list', ['limit' => 200]);
        $typeEtatsChantiers = $this->Chantiers->EtatsChantiers->TypesEtatsChantiers->find('list', ['limit' => 200]);
        $detailsMarches = $this->Chantiers->Marches->DetailsMarches->find('list')
                                                ->select()
                                                ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $personnes = $this->Chantiers->Responsables->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $this->set(compact('chantier', 'detailsMarches', 'wilayas', 'details', 'personnes', 'typeEtatsChantiers'));
        $this->set('_serialize', ['chantier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chantier id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chantier = $this->Chantiers->get($id);
        if ($this->Chantiers->delete($chantier)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Chantier'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Chantier'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
