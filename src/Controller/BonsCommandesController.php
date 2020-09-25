<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BonsCommandes Controller
 *
 *
 * @method \App\Model\Entity\BonsCommande[] paginate($object = null, array $settings = [])
 */
class BonsCommandesController extends AppController
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
                $bonsCommandes = $this->BonsCommandes->find()->innerJoinWith('Departements')->select()->where('Departements.nom LIKE "%'.$rech.'%"');
            } else {
                if (($this->request->data['critere']=='datebon')) {
                    $time = substr($rech, 6, 4).
                            substr($rech, 2, 4).
                            substr($rech, 0, 2);
                    $rech = $time;
                    $bonsCommandes = $this->BonsCommandes->find()->select()->where('BonsCommandes.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                } else {
                    if (($this->request->data['critere']=='fournisseur_id')) {
                        $bonsCommandes = $this->BonsCommandes->find()->innerJoinWith('Fournisseurs')->select()->where('Fournisseurs.nom LIKE "%'.$rech.'%"');
                    } else {
                        $bonsCommandes = $this->BonsCommandes->find()->select()->where('BonsCommandes.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                }
            }
        }else{
            $bonsCommandes=$this->BonsCommandes; 
        }
        $this->paginate = [
            'contain' => ['Departements', 'Fournisseurs']
        ];
        $bonsCommandes = $this->paginate($bonsCommandes);
        $this->set(compact('bonsCommandes'));
        $this->set('_serialize', ['bonsCommandes']);
    }

    /**
     * View method
     *
     * @param string|null $id Bons Commande id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bonsCommande = $this->BonsCommandes->get($id, [
            'contain' => []
        ]);

        $this->set('bonsCommande', $bonsCommande);
        $this->set('_serialize', ['bonsCommande']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Stocks'); 
        $bonsCommande = $this->BonsCommandes->newEntity();
        $fournisseur = $this->BonsCommandes->Fournisseurs->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datebon'); 
            $bonsCommande = $this->BonsCommandes->patchEntity($bonsCommande, $this->request->data);
            if ($this->BonsCommandes->save($bonsCommande)) {
                foreach ($this->request->data['BonCommandeDetails'] as $detail) {
                    $detailsbc = $this->BonsCommandes->DetailsBonCommande->newEntity(); 
                    if($detail['id'] == '')
                    {
                        $produit = $this->Stocks->Produits->newEntity();
                        $produit->nom = $details['nom'];
                        $produit->code = $details['code'];
                        $produit->unite_id = $details['unite_id'];
                        $produit->qte = 0;
                        $produit->qtealert = 0;
                        $produit->types_produit_id = $details['types_produit_id'];
                        $this->Stocks->Produits->save($produit);
                        $detailsbc->produit_id = $produit->id; 
                    }
                    else 
                        $detailsbc->produit_id = $detail['id']; 
                    $detailsbc->prixachat = $detail['prix']; ;  
                    $detailsbc->qte = $detail['qte'];
                    $detailsbc->bons_commande_id = $bonsCommande->id; 
                    $this->BonsCommandes->DetailsBonCommande->save($detailsbc);
                }
                $this->Flash->success(__('The {0} has been saved.', 'Bons Commande'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bons Commande'));
            }
        }
        $produits = $this->Stocks->Produits->find('list', ['limit' => 200]);
        $departements = $this->BonsCommandes->Departements->find('list', ['limit' => 200]);
        $fournisseurs = $this->BonsCommandes->Fournisseurs->find('list', ['limit' => 200]);
        $this->set(compact('bonsCommande', 'depot', 'fournisseur', 'produits', 'departements', 'fournisseurs', 'modesReglements'));
        $this->set('_serialize', ['bonsCommande']);
    }

    public function listeProduits(){
        $this->loadModel('Stocks'); 
        $produits = array(); 
        $produits = $this->Stocks->Produits
                     ->find()->select('nom'); 
        $this->set('produits', $produits);
        $this->set('_serialize', ['produits']);
    }

    public function getProduit($produit_name = null, $key = null){
        $this->loadModel('Stocks'); 
        $produit = $this->Stocks->Produits
                     ->find()->select()->where('Produits.nom = "'.$produit_name.'"')->first(); 
        if(!isset($produit)){
            $produit = $this->Stocks->Produits->newEntity();
            $produit->nom = $produit_name;
        }

        $typesProduits = $this->Stocks->Produits->TypesProduits->find('list', ['limit' => 200]);
        $depots = $this->Stocks->Depots->find('list', ['limit' => 200]);
        $unites = $this->Stocks->Produits->Unites->find('list', ['limit' => 200]);
        $this->set(compact('produit', 'typesProduits', 'depots', 'unites', 'key')); 
        $this->set('_serialize', ['produit']);
    }

    public function listeFournisseurs(){
        $fournisseurs = array(); 
        $fournisseurs = $this->BonsCommandes->Fournisseurs->find(); 
        $this->set('fournisseurs', $fournisseurs);
        $this->set('_serialize', ['fournisseurs']);
    }

    public function listeDepots(){
        $this->loadModel('Stocks');
        $depots = array(); 
        $depots = $this->Stocks->Depots->find(); 
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
     * Edit method
     *
     * @param string|null $id Bons Commande id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Stocks'); 
        $fournisseur = $this->BonsCommandes->Fournisseurs->newEntity();
        $bonsCommande = $this->BonsCommandes->get($id, [
            'contain' => ['DetailsBonCommande', 'DetailsBonCommande.Produits', 'DetailsBonCommande.Produits.Unites', 'DetailsBonCommande.Produits.TypesProduits']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datebon'); 
            $bonsCommande = $this->BonsCommandes->patchEntity($bonsCommande, $this->request->data);
            if ($this->BonsCommandes->save($bonsCommande)) {
                $added = array_filter($this->request->data['BonCommandeDetails'], function($obj){
                    
                    if (Empty($obj['id_details'])) {
                        return true; 
                    }
                    return false;
                });
                $deleted = array_filter($bonsCommande->details_bon_commande, function($obj){
                        if (!Empty($obj['id'])) {
                            foreach ($this->request->data['BonCommandeDetails'] as $details) {
                                if($obj['id'] == $details['id_details'])
                                    return false; 
                            }
                        }
                        return true;
                    });

                $modified = array_filter($this->request->data['BonCommandeDetails'], function($obj) use ($bonsCommande){
                    if(!Empty($obj['id_details'])){
                        foreach ($bonsCommande->details_bon_commande as $details) {
                            if($obj['id_details'] == $details['id'])
                            {
                                if (($obj['qte'] != $details['qte']) ||
                                    ($obj['prix'] != $details['prixachat']) )
                                    return true;
                            }  
                        }
                        return false; 
                    }
                    return false; 
                }); 
                $this->deleteDetails($deleted);
                $this->addDetails($added, $bonsCommande);  
                $this->modifyDetails($modified); 
                $this->Flash->success(__('The {0} has been saved.', 'Bons Commande'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bons Commande'));
            }
        }
        $typesProduits = $this->Stocks->Produits->TypesProduits->find('list', ['limit' => 200]);
        $unites = $this->Stocks->Produits->Unites->find('list', ['limit' => 200]);
        $produits = $this->Stocks->Produits->find('list', ['limit' => 200]);
        $departements = $this->BonsCommandes->Departements->find('list', ['limit' => 200]);
        $fournisseurs = $this->BonsCommandes->Fournisseurs->find('list', ['limit' => 200]);
        $this->set(compact('bonsCommande', 'departements', 'produits', 'typesProduits', 'unites', 'fournisseurs', 'fournisseur'));
        $this->set('_serialize', ['bonsCommande']);
    }

    public function deleteDetails($deleted)
    {
        foreach ($deleted as $details) {
            $this->BonsCommandes->DetailsBonCommande->delete($details);
        }
    }

    public function modifyDetails($modified)
    {
        foreach ($modified as $details) {
            $detailsachats = $this->BonsCommandes->DetailsBonCommande->newEntity(); 
            $detailsachats->prix = $details['prix'];  
            $detailsachats->qte = $details['qte'];   
            $detailsachats->id = $details['id_details'];
            $this->BonsCommandes->DetailsBonCommande->save($detailsachats);
        }
    }

    public function addDetails($added, $bonsCommande)
    {
        $this->loadModel('Stocks');
        foreach ($added as $details) {
            $detailsbc = $this->BonsCommandes->DetailsBonCommande->newEntity(); 
            if($details['id'] == '')
            {
                $produit = $this->Stocks->Produits->newEntity();
                $produit->nom = $details['nom'];
                $produit->code = $details['code'];
                $produit->unite_id = $details['unite_id'];
                $produit->qte = 0;
                $produit->qtealert = 0;
                $produit->types_produit_id = $details['types_produit_id'];
                $this->Stocks->Produits->save($produit);
                $detailsbc->produit_id = $produit->id; 
            }
            else 
                $detailsbc->produit_id = $details['id']; 
            $detailsbc->prixachat = $details['prix']; ;  
            $detailsbc->qte = $details['qte'];
            $detailsbc->bons_commande_id = $bonsCommande->id; 
            $this->BonsCommandes->DetailsBonCommande->save($detailsbc); 
        }
    }
    /**
     * Delete method
     *
     * @param string|null $id Bons Commande id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bonsCommande = $this->BonsCommandes->get($id);
        if ($this->BonsCommandes->delete($bonsCommande)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Bons Commande'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Bons Commande'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
