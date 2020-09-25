<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BonsReceptions Controller
 *
 * @property \App\Model\Table\BonsReceptionsTable $BonsReceptions
 *
 * @method \App\Model\Entity\BonsReception[] paginate($object = null, array $settings = [])
 */
class BonsReceptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Achats', 'BonsCommandes']
        ];
        $bonsReceptions = $this->paginate($this->BonsReceptions);

        $this->set(compact('bonsReceptions'));
        $this->set('_serialize', ['bonsReceptions']);
    }

    /**
     * View method
     *
     * @param string|null $id Bons Reception id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bonsReception = $this->BonsReceptions->get($id, [
            'contain' => ['Achats', 'BonsCommandes', 'DetailsBonReception', 'DetailsBonReception.Produits', 'DetailsBonReception.Produits.Unites',]
        ]);

        $this->set('bonsReception', $bonsReception);
        $this->set('_serialize', ['bonsReception']);
    }

    public function getBonCommande($bon_id = null){
        $bonsCommande = $this->BonsReceptions->BonsCommandes->get($bon_id, [
            'contain' => ['DetailsBonCommande', 'DetailsBonCommande.Produits', 'DetailsBonCommande.Produits.Unites', 'DetailsBonCommande.Produits.TypesProduits']
        ]);
        $depots = $this->BonsReceptions->Achats->AchatsDetails->Stocks->Depots->find('list', ['limit' => 200]);
        
        $this->set(compact('bonsCommande', 'depots'));
        $this->set('_serialize', ['bonsReception']);
    }

    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }

    public function getInfosBC($bon_id = null){
        $bonsCommande = $this->BonsReceptions->BonsCommandes->get($bon_id, [
            'contain' => ['DetailsBonCommande', 'DetailsBonCommande.Produits', 'DetailsBonCommande.Produits.Unites', 'DetailsBonCommande.Produits.TypesProduits']
        ]);

        $this->set(compact('bonsCommande'));
        $this->set('_serialize', ['bonsCommande']);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bonsReception = $this->BonsReceptions->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datereception');
            $bonsReception = $this->BonsReceptions->patchEntity($bonsReception, $this->request->data);
            if ($this->BonsReceptions->save($bonsReception)) {
                $achat = $this->BonsReceptions->Achats->newEntity();
                $boncommande = $this->BonsReceptions->BonsCommandes->get($this->request->data['bons_commande_id']); 
                $achat = $this->BonsReceptions->Achats->patchEntity($achat, $this->request->data);
                $achat->datebon = $bonsReception->datereception; 
                $achat->departement_id = $boncommande->departement_id; 
                $achat->fournisseur_id = $boncommande->fournisseur_id; 
                $achat->bons_reception_id = $bonsReception->id; 
                $achat = $this->BonsReceptions->Achats->patchEntity($achat, $this->request->data);
                if ($this->BonsReceptions->Achats->save($achat)) {
                    if ($this->request->data['regle'] == 1){
                        $dette = $this->BonsReceptions->Achats->Dettes->newEntity();
                        $dette->datedette = $achat->datebon; 
                        $dette->achat_id = $achat->id; 
                        $dette->etat = 'En cours';//non payé
                        if ($this->BonsReceptions->Achats->Dettes->save($dette)){ 
                            $versement = $this->BonsReceptions->Achats->Dettes->Versements->newEntity();
                            $versement->dateversement = $achat->datebon;
                            $versement->dette_id = $dette->id;
                            $versement->montant = $this->request->data('versement');
                            $this->BonsReceptions->Achats->Dettes->Versements->save($versement);
                        }
                    }
                    $mode = $this->BonsReceptions->Achats->ModesReglements->get($this->request->data['modes_reglement_id'])->libelle;
                    if ($mode == "Chèque"){
                        $cheque = $this->BonsReceptions->Achats->Cheques->newEntity();
                        $cheque->numero = $this->request->data['cheque'];
                        $cheque->etat = "Non encaissé";
                        $cheque->achat_id = $achat->id; 
                        $this->BonsReceptions->Achats->Cheques->save($cheque);
                    }
                    foreach ($this->request->data['BonCommandeDetails'] as $detail) {
                        $detailsbon = $this->BonsReceptions->DetailsBonReception->newEntity(); 
                        $detailsbon->prix = $detail['prix'];   
                        $detailsbon->qte = $detail['qte'];  
                        $detailsbon->produit_id = $detail['id'];
                        $detailsbon->bons_reception_id = $bonsReception->id; 
                        $this->BonsReceptions->DetailsBonReception->save($detailsbon);
                        $detailsachats = $this->BonsReceptions->Achats->AchatsDetails->newEntity(); 
                        $detailsachats->prix = $detail['prix'];   
                        $detailsachats->qte = $detail['qte'];  
                        $detailsachats->achat_id = $achat->id; 
                        $this->BonsReceptions->Achats->AchatsDetails->save($detailsachats);
                        $stock = $this->BonsReceptions->Achats->AchatsDetails->Stocks->newEntity(); 
                        $stock->datestock = $achat->datebon; 
                        $stock->qte = $detailsachats->qte; 
                        $stock->prix = $detailsachats->prix;
                        $stock->produit_id = $detail['id'];
                        $stock->achats_detail_id = $detailsachats->id;
                        $stock->depot_id = $detail['depot_id'];
                        $this->BonsReceptions->Achats->AchatsDetails->Stocks->save($stock); 
                        debug($stock); 
                    }
                }
                $this->Flash->success(__('The {0} has been saved.', 'Bons Reception'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bons Reception'));
            }
        }
        $modesReglements = $this->BonsReceptions->Achats->ModesReglements->find('list', ['limit' => 200]);
        $bonsCommandes = $this->BonsReceptions->BonsCommandes->find('list', ['limit' => 200]);
        $this->set(compact('bonsReception', 'achats', 'modesReglements', 'bonsCommandes'));
        $this->set('_serialize', ['bonsReception']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bons Reception id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
   /*public function edit($id = null)
    {
        $bonsReception = $this->BonsReceptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bonsReception = $this->BonsReceptions->patchEntity($bonsReception, $this->request->data);
            if ($this->BonsReceptions->save($bonsReception)) {
                $this->Flash->success(__('The {0} has been saved.', 'Bons Reception'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Bons Reception'));
            }
        }
        $achats = $this->BonsReceptions->Achats->find('list', ['limit' => 200]);
        $bonsCommandes = $this->BonsReceptions->BonsCommandes->find('list', ['limit' => 200]);
        $this->set(compact('bonsReception', 'achats', 'bonsCommandes'));
        $this->set('_serialize', ['bonsReception']);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Bons Reception id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bonsReception = $this->BonsReceptions->get($id);
        if ($this->BonsReceptions->delete($bonsReception)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Bons Reception'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Bons Reception'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
