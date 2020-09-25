<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Affectations Controller
 *
 * @property \App\Model\Table\AffectationsTable $Affectations
 *
 * @method \App\Model\Entity\Affectation[] paginate($object = null, array $settings = [])
 */
class AffectationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ressources', 'AffectationsChantier', 'AffectationsChantier.Chantiers', 'AffectationsAdministration', 'AffectationsAdministration.Departements']
        ];
        $affectations = $this->paginate($this->Affectations);

        $this->set(compact('affectations'));
        $this->set('_serialize', ['affectations']);
    }

        public function listeChantier($details_marche_id = null){
        $chantiers = array();
        $details= $this->Affectations->AffectationsChantier->Chantiers->Marches->DetailsMarches->get($details_marche_id);
        $chantiers = $this->Affectations->AffectationsChantier->Chantiers
                          ->find()
                          ->select()
                          ->where(' marche_id = '.$details->marche_id);
        $this->set('chantiers', $chantiers);
        $this->set('_serialize', ['chantiers']);
    }

    public function listeDepartements(){
        $departements = array();
        $departements = $this->Affectations->AffectationsAdministration->Departements
                             ->find();
        $this->set('departements', $departements);
        $this->set('_serialize', ['departements']);
    }

    public function listePersonnelsDepartement($departement_id = null){
        $personnels = array();
        $personnels = $this->Affectations->AffectationsAdministration->Personnels->Personnes
                             ->find()
                             ->select()
                             ->innerJoinWith('Personnels.Positions.PositionsAdministratives')
                             ->where(' PositionsAdministratives.id = (select id from positions_administratives p1 where id = p1.id order by p1.id DESC limit 1) and  PositionsAdministratives.departement_id = '.$departement_id);
        $this->set('personnels', $personnels);
        $this->set('_serialize', ['personnels']);
    }

    public function listePersonnelsChantier($chantier_id = null){
        $personnels = array();
        $personnels = $this->Affectations->AffectationsChantier->Personnels->Personnes
                             ->find()
                             ->select()
                             ->innerJoinWith('Personnels.Positions.PositionsChantiers')
                             ->where('PositionsChantiers.id = (select id from positions_chantiers p1 where id = p1.id order by p1.id DESC limit 1) and PositionsChantiers.chantier_id = '.$chantier_id);
        $this->set('personnels', $personnels);
        $this->set('_serialize', ['personnels']);
    }

    public function listeParcs($details_marche_id = null){
        $wilaya = $this->Affectations->AffectationsChantier->Chantiers->Marches->Affaires
                       ->find()
                       ->select()
                       ->innerJoinWith('Marches.DetailsMarches')
                       ->where('DetailsMarches.id = '.$details_marche_id)
                       ->first()->wilaya_id;
        $parcs = array();
        $parcs = $this->Affectations->Ressources->ParcsRessources->Parcs
                     ->find()
                     ->select()
                     ->where('wilaya_id = '.$wilaya);
        $this->set('parcs', $parcs);
        $this->set('_serialize', ['parcs']);
    }

    /**
     * View method
     *
     * @param string|null $id Affectation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $affectation = $this->Affectations->get($id, [
            'contain' => ['Ressources', 'AffectationsAdministration', 'AffectationsChantier']
        ]);

        $this->set('affectation', $affectation);
        $this->set('_serialize', ['affectation']);
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
        $affectation = $this->Affectations->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('dateaffectation'); 
            $affectation = $this->Affectations->patchEntity($affectation, $this->request->data);
            /*$affectationressource = $this->Affectations
                                         ->find()
                                         ->select()
                                         ->where('ressource_id = '.$this->request->data['ressource_id'].
                                                'order by id DESC')
                                         ->first(); */
            $personne_id = $this->request->data['personne_id'];
            $personnel = $this->Affectations->AffectationsAdministration->Personnels
                              ->find()
                              ->select()
                              ->where(' personne_id = '.$personne_id)
                              ->first();
            if ($this->Affectations->save($affectation)) {
                if($this->request->data['type_affectation'] == 0)
                {
                    $affectationa = $this->Affectations->AffectationsAdministration->newEntity();
                    $affectationa->affectation_id = $affectation->id; 
                    $affectationa->departement_id = $this->request->data['location_id']; 
                    $affectationa->personnel_id = $personnel->id; 
                    $this->Affectations->AffectationsAdministration->save($affectationa);
                }
                else{
                    $affectationc = $this->Affectations->AffectationsChantier->newEntity();
                    $affectationc->affectation_id = $affectation->id; 
                    $affectationc->chantier_id = $this->request->data['location_id']; 
                    $affectationc->personnel_id = $personnel->id; 
                    $this->Affectations->AffectationsChantier->save($affectationc);
                }
                $parcsressource = $this->Affectations->Ressources->ParcsRessources->newEntity(); 
                if (isset($this->request->data['parc_id']))                    
                    $parcsressource->parc_id = $this->request->data['parc_id'];
                else 
                    $parcsressource->parc_id = null;
                $parcsressource = $this->Affectations->Ressources->ParcsRessources->newEntity(); 
                $parcsressource->ressource_id = $this->request->data['ressource_id'];
                $parcsressource->dateparc = date('Y-m-d');
                $this->Affectations->Ressources->ParcsRessources->save($parcsressource);
                $this->Flash->success(__('The {0} has been saved.', 'Affectation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Affectation'));
            }
        }
        $detailsMarches = $this->Affectations->AffectationsChantier->Chantiers->Marches->DetailsMarches->find('list')
                               ->select()
                               ->where('id = (select id from details_marches d1 where id = id order by d1.id DESC limit 1)');
        $ressources = $this->Affectations->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('affectation', 'ressources', 'detailsMarches'));
        $this->set('_serialize', ['affectation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Affectation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $affectation = $this->Affectations->get($id, [
            'contain' => ['Ressources', 'Ressources.ParcsRessources', 'AffectationsAdministration', 'AffectationsAdministration.Personnels', 'AffectationsAdministration.Personnels.Personnes', 'AffectationsAdministration.Departements', 'AffectationsChantier', 'AffectationsChantier.Chantiers', 'AffectationsChantier.Chantiers.Marches.detailsMarches', 'AffectationsChantier.Personnels', 'AffectationsChantier.Personnels.Personnes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('dateaffectation'); 
            $personne_id = $this->request->data['personne_id'];
            $personnel = $this->Affectations->AffectationsAdministration->Personnels
                              ->find()
                              ->select()
                              ->where(' personne_id = '.$personne_id)
                              ->first();
            $affectation = $this->Affectations->patchEntity($affectation, $this->request->data);
            if ($this->Affectations->save($affectation)) {
                if($this->request->data['type_affectation'] == 0)
                {
                    $affectationa = $this->Affectations->AffectationsAdministration->newEntity();
                    $affectationa->affectation_id = $affectation->id; 
                    $affectationa->departement_id = $this->request->data['location_id']; 
                    $affectationa->personnel_id = $personnel->id; 
                    $this->Affectations->AffectationsAdministration->save($affectationa);
                }
                else{
                    $affectationc = $this->Affectations->AffectationsChantier->newEntity();
                    $affectationc->affectation_id = $affectation->id; 
                    $affectationc->chantier_id = $this->request->data['location_id']; 
                    $affectationc->personnel_id = $personnel->id; 
                    $this->Affectations->AffectationsChantier->save($affectationc);
                }
                if ($this->request->data['parc_id'] != end($affectation->ressource->parcs_ressources)->parc_id)
                {
                    if (isset($this->request->data['parc_id']))                    
                        $parcsressource->parc_id = $this->request->data['parc_id'];
                    else 
                        $parcsressource->parc_id = null;
                    $parcsressource = $this->Affectations->Ressources->ParcsRessources->newEntity();
                    $parcsressource->ressource_id = $this->request->data['ressource_id'];
                    $parcsressource->dateparc = date('Y-m-d');
                    $this->Affectations->Ressources->ParcsRessources->save($parcsressource);
                }
                $this->Flash->success(__('The {0} has been saved.', 'Affectation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Affectation'));
            }
        }
        $locations = null; 
        $personnels = null; 
        $parcs = null; 
        $location_id = !empty($affectation->affectations_chantier)? end($affectation->affectations_chantier)->chantier->id : end($affectation->affectations_administration)->departement->id; 
        if(!empty($affectation->affectations_chantier)){
            $parcs = $this->Affectations->Ressources->ParcsRessources->Parcs->find('list', ['limit' => 200]);
            $personnels = $this->Affectations->AffectationsChantier->Personnels->Personnes
                             ->find('list')
                             ->select()
                             ->innerJoinWith('Personnels.Positions.PositionsChantiers')
                             ->where('PositionsChantiers.id = (select id from positions_chantiers p1 where id = p1.id order by p1.id DESC limit 1) and PositionsChantiers.chantier_id = '.$location_id);
            $marche_id = end($affectation->affectations_chantier)->chantier->marche->id; 
            $locations = $this->Affectations->AffectationsChantier->Chantiers
                              ->find('list')
                              ->select()
                              ->where(' marche_id = '.$marche_id); 
            
        }
        else{
            $locations = $this->Affectations->AffectationsAdministration->Departements
                             ->find('list', ['limit' => 200]); 
            $personnels = $personnels = $this->Affectations->AffectationsAdministration->Personnels->Personnes
                             ->find('list')
                             ->select()
                             ->innerJoinWith('Personnels.Positions.PositionsAdministratives')
                             ->where(' PositionsAdministratives.id = (select id from positions_administratives p1 where id = p1.id order by p1.id DESC limit 1) and  PositionsAdministratives.departement_id = '.$location_id); 
        }
        $detailsMarches = $this->Affectations->AffectationsChantier->Chantiers->Marches->DetailsMarches
                               ->find('list')
                               ->select()
                               ->where('id = (select id from details_marches d1 where id = id order by d1.id DESC limit 1)');
        $ressources = $this->Affectations->Ressources->find('list', ['limit' => 200]);
        $this->set(compact('affectation', 'ressources', 'detailsMarches', 'locations', 'personnels', 'parcs'));
        $this->set('_serialize', ['affectation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Affectation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $affectation = $this->Affectations->get($id);
        if ($this->Affectations->delete($affectation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Affectation'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Affectation'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
