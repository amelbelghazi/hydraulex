<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Achats Controller
 *
 * @property \App\Model\Table\AchatsTable $Achats
 *
 * @method \App\Model\Entity\Achat[] paginate($object = null, array $settings = [])
 */
class AchatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if($this->request->data){
            //debug($this->request->data);
            $rech = $this->request->data['search'];
            if (($this->request->data['critere']=='departement_id')) {
                   $achats = $this->Achats->find()->innerJoinWith('Departements')->select()->where('Departements.nom LIKE "%'.$rech.'%"');

            } else {
                if (($this->request->data['critere']=='fournisseur_id')) {
                    $achats = $this->Achats->find()->innerJoinWith('Fournisseurs')->select()->where('Fournisseurs.nom LIKE "%'.$rech.'%"');
                } else {
                    if (($this->request->data['critere']=='regle')) {
                        if (($rech=='oui')|| ($rech=='Oui')) {
                             $achats = $this->Achats->find()->select()->where('Achats.'.$this->request->data['critere'].'  LIKE "%0%"');
                        } else {
                           if (($rech=='non')|| ($rech=='Non')) {

                             $achats = $this->Achats->find()->select()->where('Achats.'.$this->request->data['critere'].'  LIKE "%1%"');

                           }
                        }
                    } else {
                        $achats = $this->Achats->find()->select()->where('Achats.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                }
            }
        }else{
            $achats=$this->Achats; 
        }
        $this->paginate = [
            'contain' => ['Departements', 'Fournisseurs', 'ModesReglements']
        ];
        $achats = $this->paginate($achats);

        $this->set(compact('achats'));
        $this->set('_serialize', ['achats']);
    }

    /**
     * View method
     *
     * @param string|null $id Achat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $achat = $this->Achats->get($id, [
            'contain' => ['Departements', 'Fournisseurs', 'ModesReglements', 'AchatsDetails', 'BonsReceptions', 'BonsReceptions.BonsCommandes', 'Dettes']
        ]);

        $this->set('achat', $achat);
        $this->set('_serialize', ['achat']);
    }
    
    public function listeProduits(){
        $produits = array(); 
        $produits = $this->Achats->AchatsDetails->Stocks->Produits
                     ->find()->select('nom'); 
        $this->set('produits', $produits);
        $this->set('_serialize', ['produits']);
    }

    public function getProduit($produit_name = null, $key = null){
        $produit = $this->Achats->AchatsDetails->Stocks->Produits
                     ->find()->select()->where('Produits.nom = "'.$produit_name.'"')->first(); 
        if(!isset($produit)){
            $produit = $this->Achats->AchatsDetails->Stocks->Produits->newEntity();
            $produit->nom = $produit_name;
        }

        $typesProduits = $this->Achats->AchatsDetails->Stocks->Produits->TypesProduits->find('list', ['limit' => 200]);
        $depots = $this->Achats->AchatsDetails->Stocks->Depots->find('list', ['limit' => 200]);
        $unites = $this->Achats->AchatsDetails->Stocks->Produits->Unites->find('list', ['limit' => 200]);
        $this->set(compact('produit', 'typesProduits', 'depots', 'unites', 'key')); 
        $this->set('_serialize', ['produit']);
    }

    public function listeFournisseurs(){
        $fournisseurs = array(); 
        $fournisseurs = $this->Achats->Fournisseurs->find(); 
        $this->set('fournisseurs', $fournisseurs);
        $this->set('_serialize', ['fournisseurs']);
    }

    public function listeDepots(){
        $depots = array(); 
        $depots = $this->Achats->AchatsDetails->Stocks->Depots->find(); 
        $this->set('depots', $depots);
        $this->set('_serialize', ['depots']);
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
        $depot = $this->Achats->AchatsDetails->Stocks->Depots->newEntity();
        $fournisseur = $this->Achats->Fournisseurs->newEntity();
        $achat = $this->Achats->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datebon'); 
            $achat = $this->Achats->patchEntity($achat, $this->request->data);
            if ($this->Achats->save($achat)) {
                if ($this->request->data['regle'] == 1){
                    $dette = $this->Achats->Dettes->newEntity();
                    $dette->datedette = $achat->datebon; 
                    $dette->achat_id = $achat->id; 
                    $dette->etat = 'En cours';//non payé
                    if ($this->Achats->Dettes->save($dette)){ 
                        $versement = $this->Achats->Dettes->Versements->newEntity();
                        $versement->dateversement = $achat->datebon;
                        $versement->dette_id = $dette->id;
                        $versement->montant = $this->request->data('versement');
                        $this->Achats->Dettes->Versements->save($versement);
                    }
                }
                $mode = $this->Achats->ModesReglements->get($this->request->data['modes_reglement_id'])->libelle;
                if ($mode == "Chèque"){
                    $cheque = $this->Achats->Cheques->newEntity();
                    $cheque->numero = $this->request->data['cheque'];
                    $cheque->etat = "Non encaissé";
                    $cheque->achat_id = $achat->id; 
                    $this->Achats->Cheques->save($cheque);
                }
                foreach ($this->request->data['AchatsDetails'] as $detail) {
                    if($detail['id'] == '')
                    {
                        $produit = $this->Achats->AchatsDetails->Stocks->Produits->newEntity();
                        $produit->nom = $details['nom'];
                        $produit->code = $details['code'];
                        $produit->unite_id = $details['unite_id'];
                        $produit->qte = 0;
                        $produit->qtealert = 0;
                        $produit->types_produit_id = $details['types_produit_id'];
                        $this->Achats->AchatsDetails->Stocks->Produits->save($produit);
                    }
                    $detailsachats = $this->Achats->AchatsDetails->newEntity(); 
                    $detailsachats->prix = $detail['prix']; ;  
                    $detailsachats->qte = $detail['qte'];  
                    $detailsachats->achat_id = $achat->id; 
                    $this->Achats->AchatsDetails->save($detailsachats);
                    $stock = $this->Achats->AchatsDetails->Stocks->newEntity(); 
                    $stock->datestock = $achat->datebon; 
                    $stock->qte = $detailsachats->qte; 
                    $stock->prix = $detailsachats->prix;
                    $stock->produit_id = $detail['id'];
                    $stock->achats_detail_id = $detailsachats->id;
                    $stock->depot_id = $detail['depot_id'];
                    $this->Achats->AchatsDetails->Stocks->save($stock); 
                }
                $this->Flash->success(__('The {0} has been saved.', 'Achat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Achat'));
            }
        }
        $produits = $this->Achats->AchatsDetails->Stocks->Produits->find('list', ['limit' => 200]);
        $departements = $this->Achats->Departements->find('list', ['limit' => 200]);
        $fournisseurs = $this->Achats->Fournisseurs->find('list', ['limit' => 200]);
        $modesReglements = $this->Achats->ModesReglements->find('list', ['limit' => 200]);
        $this->set(compact('achat', 'departements', 'produits', 'fournisseurs', 'fournisseur', 'modesReglements'));
        $this->set('_serialize', ['achat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Achat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $depot = $this->Achats->AchatsDetails->Stocks->Depots->newEntity();
        $fournisseur = $this->Achats->Fournisseurs->newEntity();
        $achat = $this->Achats->get($id, [
            'contain' => ['AchatsDetails', 'AchatsDetails.Stocks', 'AchatsDetails.Stocks.Produits', 'AchatsDetails.Stocks.Produits.Unites', 'AchatsDetails.Stocks.Produits.TypesProduits', 'Cheques', 'Dettes', 'Dettes.Versements', 'ModesReglements']
        ]);
        $dette = $this->Achats->Dettes->find()->select()
                      ->where('Dettes.achat_id = '.$achat->id)
                      ->contain(['Versements'])
                      ->first(); 
        $cheque = $this->Achats->Cheques->find()->select()->where('Cheques.achat_id = '.$achat->id)->first(); 
        $depot = $this->Achats->AchatsDetails->Stocks->Depots->newEntity();
        $fournisseur = $this->Achats->Fournisseurs->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datebon'); 
            $achat = $this->Achats->patchEntity($achat, $this->request->data);
            if ($this->Achats->save($achat)) {
                $mode = $this->Achats->ModesReglements->get($this->request->data['modes_reglement_id'])->libelle;
                if ($mode == "Chèque"){
                   // 
                    if($cheque->numero != $this->request->data['cheque']){
                        $cheque->numero = $this->request->data['cheque'];
                        $this->Achats->Cheques->save($cheque);
                    }
                }
                else{
                    if(isset($cheque)){
                        $this->Achats->Cheques->delete($cheque);
                    }
                }
                if ($achat->regle == 0){
                    if($this->request->data['regle'] == 1){
                        $dette = $this->Achats->Dettes->newEntity();
                        $dette->datedette = $achat->datebon; 
                        $dette->achat_id = $achat->id; 
                        $dette->etat = 'En cours';//non payé
                        if ($this->Achats->Dettes->save($dette)){ 
                            $versement = $this->Achats->Dettes->Versements->newEntity();
                            $versement->dateversement = $achat->datebon;
                            $versement->dette_id = $dette->id;
                            $versement->montant = $this->request->data('versement');
                            $this->Achats->Dettes->Versements->save($versement);
                        }
                    }
                }
                else {
                    $versement = $this->Achats->Dettes->Versements->newEntity();
                    $versement->dateversement = date('y-m-d');
                    $versement->dette_id = $dette->id;
                    $total = 0;
                    foreach ($dette->versements as $versement) {
                        $total += $versement->montant;
                    }
                    if($this->request->data['regle'] == 0)
                        $versement->montant = $achat->total - $total;
                    else 
                        $versement->montant = ($this->request->data('versement')) - $total;
                    if($versement->montant != 0)
                        $this->Achats->Dettes->Versements->save($versement);
                }
                $added = array_filter($this->request->data['AchatsDetails'], function($obj){
                    
                    if (Empty($obj['id_details'])) {
                        return true; 
                    }
                    return false;
                });
                $deleted = array_filter($achat->achats_details, function($obj){
                        if (!Empty($obj['id'])) {
                            foreach ($this->request->data['AchatsDetails'] as $details) {
                                if($obj['id'] == $details['id_details'])
                                    return false; 
                            }
                        }
                        return true;
                    });

                $modified = array_filter($this->request->data['AchatsDetails'], function($obj) use ($achat){
                    if(!Empty($obj['id_details'])){
                        foreach ($achat->achats_details as $details) {
                            if($obj['id_details'] == $details['id'])
                            {
                                if (($obj['qte'] != $details['qte']) ||
                                    ($obj['prix'] != $details['prix']) )
                                    return true;
                            }  
                        }
                        return false; 
                    }
                    return false; 
                });  
                $this->addDetails($added, $achat); 
                $this->deleteDetails($deleted);
                $this->modifyDetails($modified);  
                $this->Flash->success(__('The {0} has been saved.', 'Achat'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Achat'));
            }
        }
        $typesProduits = $this->Achats->AchatsDetails->Stocks->Produits->TypesProduits->find('list', ['limit' => 200]);
        $depots = $this->Achats->AchatsDetails->Stocks->Depots->find('list', ['limit' => 200]);
        $unites = $this->Achats->AchatsDetails->Stocks->Produits->Unites->find('list', ['limit' => 200]);
        $produits = $this->Achats->AchatsDetails->Stocks->Produits->find('list', ['limit' => 200]);
        $departements = $this->Achats->Departements->find('list', ['limit' => 200]);
        $fournisseurs = $this->Achats->Fournisseurs->find('list', ['limit' => 200]);
        $modesReglements = $this->Achats->ModesReglements->find('list', ['limit' => 200]);
        $this->set(compact('achat', 'departements', 'fournisseurs', 'modesReglements', 'produits', 'depot', 'fournisseur', 'unites', 'depots', 'typesProduits', 'dette', 'cheque'));
        $this->set('_serialize', ['achat']);
    }

    public function deleteDetails($deleted)
    {
        foreach ($deleted as $details) {
            $this->Achats->AchatsDetails->delete($details);
        }
    }

    public function modifyDetails($modified)
    {
        foreach ($modified as $details) {
            $detailsachats = $this->Achats->AchatsDetails->newEntity(); 
            $detailsachats->prix = $details['prix'];  
            $detailsachats->qte = $details['qte']; 
            $detailsachats->id = $details['id_details'];
            $this->Achats->AchatsDetails->save($detailsachats);
            
            $stock = $this->Achats->AchatsDetails->Stocks
                          ->find()
                          ->select()
                          ->where('Stocks.achats_detail_id = '.$details['id_details'])
                          ->first(); 
            $stock->qte = $detailsachats->qte; 
            $stock->prix = $detailsachats->prix;
            $stock->depot_id = $details['depot_id'];
            $this->Achats->AchatsDetails->Stocks->save($stock); 
        }
    }

    public function addDetails($added, $achat)
    {
        foreach ($added as $details) {
            if($details['id'] == '')
            {
                $produit = $this->Achats->AchatsDetails->Stocks->Produits->newEntity();
                $produit->nom = $details['nom'];
                $produit->code = $details['code'];
                $produit->unite_id = $details['unite_id'];
                $produit->qte = 0;
                $produit->qtealert = 0;
                $produit->types_produit_id = $details['types_produit_id'];
                $this->Achats->AchatsDetails->Stocks->Produits->save($produit);
            }

            $detailsachats = $this->Achats->AchatsDetails->newEntity(); 
            $detailsachats->prix = $details['prix']; ;  
            $detailsachats->qte = $details['qte'];  
            $detailsachats->achat_id = $achat->id; 
            $this->Achats->AchatsDetails->save($detailsachats);

            $stock = $this->Achats->AchatsDetails->Stocks->newEntity(); 
            $stock->datestock = $achat->datebon; 
            $stock->qte = $detailsachats->qte; 
            $stock->prix = $detailsachats->prix;
            $stock->produit_id = $details['id'];
            $stock->achats_detail_id = $detailsachats->id;
            $stock->depot_id = $details['depot_id'];
            $this->Achats->AchatsDetails->Stocks->save($stock); 
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Achat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $achat = $this->Achats->get($id);
        if ($this->Achats->delete($achat)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Achat'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Achat'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
