<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Locations Controller
 *
 * @property \App\Model\Table\LocationsTable $Locations
 *
 * @method \App\Model\Entity\Location[] paginate($object = null, array $settings = [])
 */
class LocationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departements', 'Proprietaires', 'ModesReglements']
        ];
        $locations = $this->paginate($this->Locations);

        $this->set(compact('locations'));
        $this->set('_serialize', ['locations']);
    }

    /**
     * View method
     *
     * @param string|null $id Location id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => ['Departements', 'Proprietaires', 'ModesReglements', 'DettesLocations', 'ChequesLocations', 'DettesLocations.VersementsLocations', 'LocationsDetails', 'LocationsDetails.Ressources']
        ]);

        $this->set('location', $location);
        $this->set('_serialize', ['location']);
    }

    public function listeProprietaire(){
        $proprietaires = array(); 

        $proprietaires = $this->Locations->Proprietaires->find();
        $this->set('proprietaires', $proprietaires);
        $this->set('_serialize', ['proprietaires']);
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
        $location = $this->Locations->newEntity();
        $proprietaire = $this->Locations->Proprietaires->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datelocation');
            $location = $this->Locations->patchEntity($location, $this->request->data);
            if ($this->Locations->save($location)) {
                if ($this->request->data['regle'] == 1){
                    $dette = $this->Locations->DettesLocations->newEntity();
                    $dette->datedette = $location->datelocation; 
                    $dette->location_id = $location->id; 
                    $dette->etat = 'En cours';//non payé
                    if ($this->Locations->DettesLocations->save($dette)){ 
                        $versement = $this->Locations->DettesLocations->VersementsLocations->newEntity();
                        $versement->dateversement = $location->datelocation;
                        $versement->dettes_location_id = $dette->id;
                        $versement->montant = $this->request->data('versement');
                        $this->Locations->DettesLocations->VersementsLocations->save($versement);
                    }
                }
                $mode = $this->Locations->ModesReglements->get($this->request->data['modes_reglement_id'])->libelle;
                if ($mode == "Chèque"){
                    $cheque = $this->Locations->ChequesLocations->newEntity();
                    $cheque->numero = $this->request->data['cheque'];
                    $cheque->etat = "Non encaissé";
                    $cheque->location_id = $location->id; 
                    $this->Locations->ChequesLocations->save($cheque);
                }
                foreach ($this->request->data['DetailsLocations'] as $detail) {
                    $detailslocations = $this->Locations->LocationsDetails->newEntity(); 
                    $detailslocations->prix = $detail['prix']; 
                    $detailslocations->duree = $detail['duree']; 
                    $detailslocations->location_id = $location->id; 
                    $this->Locations->LocationsDetails->save($detailslocations);

                    $ressource = $this->Locations->LocationsDetails->Ressources->Stocks->newEntity(); 
                    $ressource->nom = $detail['nom']; 
                    $ressource->code = $detail['code'];
                    $ressource->details_location_id = $detailslocationss->id;
                    $this->Locations->LocationsDetails->Ressources->save($ressource); 

                    $ressourceparc = $this->Locations->LocationsDetails->Ressources->ParcsRessources->newEntity();
                    $ressourceparc->parc_id = $detail['parc_id']; 
                    $ressourceparc->ressource_id = $ressource->id;
                    $this->Locations->LocationsDetails->Ressources->ParcsRessources->save($ressourceparc);
                }
                $this->Flash->success(__('The {0} has been saved.', 'Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Location'));
            }
        }
        $parcs = $this->Locations->LocationsDetails->Ressources->ParcsRessources->Parcs->find('list', ['limit' => 200]);
        $departements = $this->Locations->Departements->find('list', ['limit' => 200]);
        $proprietaires = $this->Locations->Proprietaires->find('list', ['limit' => 200]);
        $modesReglements = $this->Locations->ModesReglements->find('list', ['limit' => 200]);
        $this->set(compact('location', 'departements', 'proprietaire', 'proprietaires', 'modesReglements', 'parcs'));
        $this->set('_serialize', ['location']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $location = $this->Locations->get($id, [
            'contain' => ['ModesReglements', 'DettesLocations', 'ChequesLocations', 'DettesLocations.VersementsLocations', 'LocationsDetails', 'LocationsDetails.Ressources', 'LocationsDetails.Ressources.ParcsRessources' , 'LocationsDetails.Ressources.ParcsRessources.Parcs']
        ]);
        $dette = $this->Locations->DettesLocations->find()->select()
                      ->where('DettesLocations.location_id = '.$location->id)
                      ->contain(['VersementsLocations'])
                      ->first(); 
        $cheque = $this->Locations->ChequesLocations->find()->select()->where('ChequesLocations.location_id = '.$location->id)->first(); 
        $proprietaire = $this->Locations->Proprietaires->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datelocation'); 
            $location = $this->Locations->patchEntity($location, $this->request->data);
            if ($this->Locations->save($location)) {
                $mode = $this->Locations->ModesReglements->get($this->request->data['modes_reglement_id'])->libelle;
                if ($mode == "Chèque"){
                   // 
                    if($cheque->numero != $this->request->data['cheque']){
                        $cheque->numero = $this->request->data['cheque'];
                        $this->Locations->ChequesLocations->save($cheque);
                    }
                }
                else{
                    if(isset($cheque)){
                        $this->Locations->ChequesLocations->delete($cheque);
                    }
                }
                if ($location->regle == 0){
                    if($this->request->data['regle'] == 1){
                        $dette = $this->Locations->DettesLocations->newEntity();
                        $dette->datedette = $location->datelocation; 
                        $dette->location_id = $location->id; 
                        $dette->etat = 'En cours';//non payé
                        if ($this->Locations->DettesLocations->save($dette)){ 
                            $versement = $this->Locations->DettesLocations->VersementsLocations->newEntity();
                            $versement->dateversement = $location->datelocation;
                            $versement->dettes_location_id = $dette->id;
                            $versement->montant = $this->request->data('versement');
                            $this->Locations->DettesLocations->VersementsLocations->save($versement);
                        }
                    }
                }
                else {
                    $versement = $this->Locations->DettesLocations->VersementsLocations->newEntity();
                    $versement->dateversement = date('y-m-d');
                    $versement->dette_id = $dette->id;
                    $total = 0;
                    foreach ($dette->versements_locations as $versement) {
                        $total += $versement->montant;
                    }
                    if($this->request->data['regle'] == 0)
                        $versement->montant = $location->total - $total;
                    else 
                        $versement->montant = ($this->request->data('versement')) - $total;
                    if($versement->montant != 0)
                        $this->Locations->DettesLocations->VersementsLocations->save($versement);
                }
                $added = array_filter($this->request->data['DetailsLocations'], function($obj){
                    
                    if (Empty($obj['id_details'])) {
                        return true; 
                    }
                    return false;
                });
                $deleted = array_filter($location->locations_details, function($obj){
                        if (!Empty($obj['id'])) {
                            foreach ($this->request->data['DetailsLocations'] as $details) {
                                if($obj['id'] == $details['id_details'])
                                    return false; 
                            }
                        }
                        return true;
                    });
                $modified = array_filter($this->request->data['DetailsLocations'], function($obj) use ($location){
                    if(!Empty($obj['id_details'])){
                        foreach ($location->locations_details as $details) {
                            if($obj['id_details'] == $details['id'])
                            {
                                if ($obj['prix'] != $details['prix'] || 
                                    $obj['duree'] != $details['duree'])
                                    return true;
                            }  
                        }
                        return false; 
                    }
                    return false; 
                });
                $this->deleteDetails($deleted);
                $this->addDetails($added, $location);  
                $this->modifyDetails($modified);  
                $this->Flash->success(__('The {0} has been saved.', 'Location'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Location'));
            }
        }
        $departements = $this->Locations->Departements->find('list', ['limit' => 200]);
        $proprietaires = $this->Locations->Proprietaires->find('list', ['limit' => 200]);
        $modesReglements = $this->Locations->ModesReglements->find('list', ['limit' => 200]);
        $parcs = $this->Locations->LocationsDetails->Ressources->ParcsRessources->Parcs->find('list', ['limit' => 200]);
        $this->set(compact('location', 'departements', 'proprietaires', 'modesReglements', 'parcs', 'proprietaire', 'dette', 'cheque'));
        $this->set('_serialize', ['location']);
    }

    public function deleteDetails($deleted)
    {
        foreach ($deleted as $details) {
            $this->Locations->LocationsDetails->delete($details);
        }
    }

    public function modifyDetails($modified)
    {
        foreach ($modified as $details) {
            $detailslocations = $this->Locations->LocationsDetails->newEntity(); 
            $detailslocations->prix = $details['prix'];  
            $detailslocations->duree = $details['duree']; 
            $detailslocations->id = $details['id_details'];  
            $this->Locations->LocationsDetails->save($detailslocations);
            
            $ressource = $this->Locations->LocationsDetails->Ressources
                          ->find()
                          ->select()
                          ->where('Ressource.locations_detail_id = '.$details['id_details'])
                          ->first();  

            $ressource->qte = $detailsachats->qte; 
            $ressource->prix = $detailsachats->prix;
            $this->Locations->LocationsDetails->Ressources->save($ressource); 
        }
    }

    public function addDetails($added, $location)
    {
        foreach ($added as $detail) {
            $detailslocations = $this->Locations->LocationsDetails->newEntity(); 
            $detailslocations->prix = $detail['prix']; 
            $detailslocations->duree = $detail['duree']; 
            $detailslocations->location_id = $location->id; 
            $this->Locations->LocationsDetails->save($detailslocations);

            $ressource = $this->Locations->LocationsDetails->Ressources->Stocks->newEntity(); 
            $ressource->nom = $detail['nom']; 
            $ressource->code = $detail['code'];
            $ressource->details_location_id = $detailslocations->id;
            $this->Locations->LocationsDetails->Ressources->save($ressource); 

            $ressourceparc = $this->Locations->LocationsDetails->Ressources->ParcsRessources->newEntity();
            $ressourceparc->parc_id = $detail['parc_id']; 
            $ressourceparc->ressource_id = $ressource->id;
            $this->Locations->LocationsDetails->Ressources->ParcsRessources->save($ressourceparc);
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id Location id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $location = $this->Locations->get($id);
        if ($this->Locations->delete($location)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Location'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Location'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
