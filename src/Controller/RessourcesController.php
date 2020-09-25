<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ressources Controller
 *
 * @property \App\Model\Table\RessourcesTable $Ressources
 *
 * @method \App\Model\Entity\Ressource[] paginate($object = null, array $settings = [])
 */
class RessourcesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['StocksRessources', 'StocksRessources.Stocks', 'Affectations', 'Machines', 'Materiels']
        ];
        $ressources = $this->paginate($this->Ressources);
        $ressourcesList = $this->Ressources->find('list', ['limit' => 200]); 
        $panne = $this->Ressources->Pannes->newEntity(); 
        $garages = $this->Ressources->Pannes->Reparations->Garages->find('list', ['limit' => 200]); 
        $this->set(compact('ressources', 'garages', 'panne', 'ressourcesList'));
        $this->set('_serialize', ['ressources']);
    }

    /**
     * View method
     *
     * @param string|null $id Ressource id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ressource = $this->Ressources->get($id, [
            'contain' => ['StocksRessources', 'StocksRessources.Stocks', 'Affectations', 'Machines', 'Materiels']
        ]);

        $this->set('ressource', $ressource);
        $this->set('_serialize', ['ressource']);
    }

    public function getProduitsSelonType($type_id = null){
        $produits = array();
        $produits = $this->Ressources->StocksRessources->Stocks->Produits
                         ->find()
                         ->select()
                         ->innerJoinWith('Stocks')
                         ->where('Produits.types_produit_id ='.$type_id.'')
                         ->group('Produits.id')
                         ->having('sum(Stocks.qte) > 0');

        $this->set('produits', $produits);
        $this->set('_serialize', ['produits']);
    }

    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }

    public function getListFactures($produit_id = null){
        $achats = array();
        $achats = $this->Ressources->StocksRessources->Stocks->AchatsDetails->Achats
                         ->find()->select()
                         ->innerJoinWith('AchatsDetails')
                         ->innerJoinWith('AchatsDetails.Stocks')
                         ->innerJoinWith('AchatsDetails.Stocks.Produits')
                         ->where('Produits.id = '.$produit_id.' and Stocks.qte <> 0');
        $this->set('achats', $achats);
        $this->set('_serialize', ['achats']);
    }

    public function listeTypesRessources(){
        $typesRessources = array();
        $typesRessources = $this->Ressources->TypesRessources->find();
        $this->set('typesRessources', $typesRessources);
        $this->set('_serialize', ['typesRessources']);
    }

    public function listDepots($produit_id = null){
        $depots = array();
        $depots = $this->Ressources->StocksRessources->Stocks->Depots
                       ->find()
                       ->select()
                       ->distinct(['Depots.id'])
                       ->innerJoinWith('Stocks.Produits')
                       ->where('produit_id = '.$produit_id);
        $this->set('depots', $depots);
        $this->set('_serialize', ['depots']);
    }

    public function listeChantier($details_marche_id = null){
        $chantiers = array();
        $details= $this->Ressources->Affectations->AffectationsChantier->Chantiers->Marches->DetailsMarches->get($details_marche_id);
        $chantiers = $this->Ressources->Affectations->AffectationsChantier->Chantiers
                          ->find()
                          ->select()
                          ->where(' marche_id = '.$details->marche_id);
        $this->set('chantiers', $chantiers);
        $this->set('_serialize', ['chantiers']);
    }

    public function listeDepartements(){
        $departements = array();
        $departements = $this->Ressources->Affectations->AffectationsAdministration->Departements
                             ->find();
        $this->set('departements', $departements);
        $this->set('_serialize', ['departements']);
    }

    public function listePersonnelsDepartement($departement_id = null){
        $personnels = array();
        $personnels = $this->Ressources->Affectations->AffectationsAdministration->Personnels->Personnes
                             ->find()
                             ->select()
                             ->innerJoinWith('Personnels.Positions.PositionsAdministratives')
                             ->where(' PositionsAdministratives.id = (select id from positions_administratives p1 where id = p1.id order by p1.id DESC limit 1) and  PositionsAdministratives.departement_id = '.$departement_id);
        $this->set('personnels', $personnels);
        $this->set('_serialize', ['personnels']);
    }

    public function listePersonnelsChantier($chantier_id = null){
        $personnels = array();
        $personnels = $this->Ressources->Affectations->AffectationsChantier->Personnels->Personnes
                             ->find()
                             ->select()
                             ->innerJoinWith('Personnels.Positions.PositionsChantiers')
                             ->where('PositionsChantiers.id = (select id from positions_chantiers p1 where id = p1.id order by p1.id DESC limit 1) and PositionsChantiers.chantier_id = '.$chantier_id);
        $this->set('personnels', $personnels);
        $this->set('_serialize', ['personnels']);
    }

    public function listeParcs($details_marche_id = null){
        $wilaya = $this->Ressources->Affectations->AffectationsChantier->Chantiers->Marches->Affaires
                       ->find()
                       ->select()
                       ->innerJoinWith('Marches.DetailsMarches')
                       ->where('DetailsMarches.id = '.$details_marche_id)
                       ->first()->wilaya_id;
        $parcs = array();
        $parcs = $this->Ressources->ParcsRessources->Parcs
                     ->find()
                     ->select()
                     ->where('wilaya_id = '.$wilaya);
        $this->set('parcs', $parcs);
        $this->set('_serialize', ['parcs']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ressource = $this->Ressources->newEntity();
        $typesRessource = $this->Ressources->TypesRessources->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datedebutcirculation'); 
            $this->toValideTime('datedebutservice'); 
            $ressource = $this->Ressources->patchEntity($ressource, $this->request->data);
            $personne_id = $this->request->data['personne_id'];
            $personnel = $this->Ressources->Affectations->AffectationsAdministration->Personnels
                              ->find()
                              ->select()
                              ->where(' personne_id = '.$personne_id)
                              ->first();
            $qte = $this->request->data['qte'];
            while ( $qte != 0) {
                $stockressource = $this->Ressources->StocksRessources->newEntity();
                $stock = $this->Ressources->StocksRessources->Stocks
                                 ->find()
                                 ->select()
                                 ->innerJoinWith('AchatsDetails')
                                 ->where('Stocks.produit_id = '.$this->request->data['produit'].' and depot_id = '.$this->request->data['depot_id'].' order by datestock DESC')//and AchatsDetails.achat_id = '.$achat_id)
                                 ->first();

                if($stock->qte > $qte){
                    $stock->qte = $stock->qte - $qte; 
                    $qte = 0; 
                    $stockressource->qte = $qte;
                }
                else {
                    $qte = $qte - $stock->qte; 
                    $stockressource->qte = $stock->qte; 
                }
                $stockressource->stock_id = $stock->id; 
                $this->Ressources->StocksRessources->Stocks->save($stock);
                $this->Ressources->StocksRessources->save($stockressource);
            }
             
            if ($this->Ressources->save($ressource)) {
                //diminuer la quantité du stock 
                if(isset($stock) && $stock->qte != 0)
                {
                    $stock->qte = $stock->qte - $ressource->qte ;  
                    $this->Ressources->StocksRessources->Stocks->save($stock); 
                }
                if (isset($this->request->data['parc_id']))
                {
                    $parcsressource = $this->Ressources->ParcsRessources->newEntity(); 
                    $parcsressource->parc_id = $this->request->data['parc_id'];
                    $parcsressource->ressource_id = $ressource->id;
                    $parcsressource->dateparc = date('Y-m-d');
                    $this->Ressources->ParcsRessources->save($parcsressource);
                }
                $etatRessource = $this->Ressources->EtatsRessources->newEntity(); 
                $etatRessource->ressource_id = $ressource->id; 
                $etatRessource->dateetat = $parcsressource->dateparc; 
                $etatRessource->types_etats_ressource_id = $this->request->data['types_etats_ressource_id'];
                $this->Ressources->EtatsRessources->save($etatRessource); 

                foreach ($this->request->data['Pieces'] as $piecedata) {
                    $piece = $this->Ressources->PiecesRessources->pieces
                                  ->find()
                                  ->select()
                                  ->where('ref = '.$piecedata['ref'])
                                  ->first(); 
                    if(!isset($piece)){
                        $piece = $this->Ressources->PiecesRessources->pieces->newEntity(); 
                        $piece = $this->Ressources->patchEntity($piece, $piecedata);
                        $this->Ressources->PiecesRessources->pieces->save($piece);
                    }  
                    $pieceRessource = $this->Ressources->PiecesRessources->newEntity(); 
                    $pieceRessource->piece_id = $piece->id; 
                    $pieceRessource->ressource_id = $ressource->id; 
                    $this->Ressources->PiecesRessources->save($pieceRessource); 
                }

                $affectation = $this->Ressources->Affectations->newEntity();
                $affectation->ressource_id = $ressource->id; 
                $affectation->dateaffectation = $ressource->datedebutcirculation; 
                $this->Ressources->Affectations->save($affectation);

                if($this->request->data['type_affectation'] == 0)
                {
                    $affectationa = $this->Ressources->Affectations->AffectationsAdministrations->newEntity();
                    $affectationa->affectation_id = $affectation->id; 
                    $affectationa->departement_id = $this->request->data['location_id']; 
                    $affectationa->personnel_id = $personnel->id; 
                    $this->Ressources->Affectations->AffectationsAdministrations->save($affectationa);
                }
                else{
                    $affectationc = $this->Ressources->Affectations->AffectationsChantier->newEntity();
                    $affectationc->affectation_id = $affectation->id; 
                    $affectationc->chantier_id = $this->request->data['location_id']; 
                    $affectationc->personnel_id = $personnel->id; 
                    $this->Ressources->Affectations->AffectationsChantier->save($affectationc);
                }
                $this->Flash->success(__('The {0} has been saved.', 'Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ressource'));
            }
        }
        $detailsMarches = $this->Ressources->Affectations->AffectationsChantier->Chantiers->Marches->DetailsMarches->find('list')
                               ->select()
                               ->where('id = (select id from details_marches d1 where id = id order by d1.id DESC limit 1)');
        $typesEtatsRessource = $this->Ressources->EtatsRessources->typesEtatsRessource->find('list', ['limit' => 200]);
        $typesRessources = $this->Ressources->TypesRessources->find('list', ['limit' => 200]);
        $proprietaires = $this->Ressources->Machines->Proprietaires->find('list', ['limit' => 200]);
        $typesProduits = $this->Ressources->StocksRessources->Stocks->Produits->TypesProduits->find('list', ['limit' => 200]);
        $parcs = $this->Ressources->ParcsRessources->Parcs->find('list', ['limit' => 200]);
        //$stocks = $this->Ressources->Stocks->find('list', ['limit' => 200]);
        $this->set(compact('ressource', 'typesProduits', 'proprietaires', 'typesRessources', 'typesRessource', 'detailsMarches', 'parcs', 'typesEtatsRessource'));
        $this->set('_serialize', ['ressource']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ressource id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ressource = $this->Ressources->get($id, [
            'contain' => ['PiecesRessources', 'PiecesRessources.Pieces', 'EtatsRessources', 'EtatsRessources.typesEtatsRessource']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datedebutcirculation'); 
            $this->toValideTime('datedebutservice'); 
            $ressource = $this->Ressources->patchEntity($ressource, $this->request->data);
            if ($this->Ressources->save($ressource)) {
                if ($this->request->data['types_etats_ressource_id'] != end($ressource->etats_ressources)->TypesEtatsRessource['id'])
                {
                    $etatRessource = $this->Ressources->EtatsRessources->newEntity(); 
                    $etatRessource->ressource_id = $ressource->id; 
                    $etatRessource->dateetat = $parcsressource->dateparc; 
                    $etatRessource->types_etats_ressource_id = $this->request->data['types_etats_ressource_id'];
                    $this->Ressources->EtatsRessources->save($etatRessource); 
                }
                $added = array_filter($this->request->data['Pieces'], function($obj){
                    
                    if (Empty($obj['id'])) {
                        return true; 
                    }
                    return false;
                });
                $deleted = array_filter($ressource->pieces_ressources, function($obj){
                        $piece = $obj['piece']; 
                        if (!Empty($piece['id'])) {
                            foreach ($this->request->data['Pieces'] as $details) {
                                if($piece['id'] == $details['id'])
                                    return false; 
                            }
                        }
                        return true;
                    });

                $modified = array_filter($this->request->data['Pieces'], function($obj) use ($ressource){
                    if(!Empty($obj['id'])){
                        foreach ($ressource->pieces_ressources as $piecesressource) {
                            $piece = $piecesressource->piece; 
                            if($obj['id'] == $piece['id'])
                            {
                                if (($obj['ref'] != $piece['ref']) ||
                                    ($obj['description'] != $piece['description']) )
                                    return true;
                            }  
                        }
                        return false; 
                    }
                    return false; 
                });
                $this->addDetails($added, $ressource); 
                $this->deleteDetails($deleted, $ressource);
                $this->modifyDetails($modified);   
                $this->Flash->success(__('The {0} has been saved.', 'Ressource'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ressource'));
            }
        }
        $typesEtatsRessource = $this->Ressources->EtatsRessources->typesEtatsRessource->find('list', ['limit' => 200]);
        $typesRessources = $this->Ressources->TypesRessources->find('list', ['limit' => 200]);
        $proprietaires = $this->Ressources->Machines->Proprietaires->find('list', ['limit' => 200]);
        $typesProduits = $this->Ressources->StocksRessources->Stocks->Produits->TypesProduits->find('list', ['limit' => 200]);
        $parcs = $this->Ressources->ParcsRessources->Parcs->find('list', ['limit' => 200]);
        $this->set(compact('ressource', 'typesEtatsRessource', 'typesRessources', 'typesProduits', 'parcs'));
        $this->set('_serialize', ['ressource']);
    }

    public function deleteDetails($deleted, $ressource)
    {
        foreach ($deleted as $details) {
            $pieceRessource = $this->Ressources->PiecesRessources
                                   ->find()
                                   ->select()
                                   ->where('piece_id = '.$details['id'].' and ressource_id = '.$ressource->id); 
            $this->Ressources->PiecesRessources->delete($details);
        }
    }

    public function modifyDetails($modified)
    {
        foreach ($modified as $details) {
            $piece = $this->Ressources->PiecesRessources->Pieces->newEntity(); 
            $piece->id = $details['id']; 
            $piece->ref = $details['ref']; 
            $piece->description = $details['description']; 
            
            $this->Ressources->PiecesRessources->Pieces->save($piece); 
        }
    }

    public function addDetails($added, $ressource)
    {
        foreach ($added as $piecedata) {
            $piece = $this->Ressources->PiecesRessources->pieces
                          ->find()
                          ->select()
                          ->where('ref = "'.$piecedata['ref'].'"')
                          ->first(); 
            if(!isset($piece)){
                $piece = $this->Ressources->PiecesRessources->pieces->newEntity(); 
                $piece = $this->Ressources->patchEntity($piece, $piecedata);
                $this->Ressources->PiecesRessources->pieces->save($piece);
            }   
            $pieceRessource = $this->Ressources->PiecesRessources
                                   ->find()
                                   ->select()
                                   ->where('piece_id = '.$piece->id.' and ressource_id='.$ressource->id)
                                   ->first(); 
            if(!isset($pieceRessource)){
                $pieceRessource = $this->Ressources->PiecesRessources->newEntity(); 
                $pieceRessource->piece_id = $piece->id; 
                $pieceRessource->ressource_id = $ressource->id; 
                $this->Ressources->PiecesRessources->save($pieceRessource); 
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Ressource id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ressource = $this->Ressources->get($id, ['contain'=>['StocksRessources']]);
        if ($this->Ressources->delete($ressource)) {
            //augmenter qte stock apres suppression 
            foreach ($ressource->stocks_ressources as $stockressource) {
                $stock = $this->Ressources->StocksRessources->Stocks->get($stockressource->stock_id);
                $stock->qte = $stock->qte + $stockressource->qte;
                $this->Ressources->Stocks->save($stock);
                $this->Ressources->Stocks->StocksRessources->delete($stockressource); 
            }
            $this->Flash->success(__('The {0} has been deleted.', 'Ressource'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Ressource'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
