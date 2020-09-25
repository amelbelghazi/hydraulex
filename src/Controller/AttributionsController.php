<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Attributions Controller²
 *
 * @property \App\Model\Table\AttributionsTable $Attributions
 *
 * @method \App\Model\Entity\Attribution[] paginate($object = null, array $settings = [])
 */
class AttributionsController extends AppController
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
            if (($this->request->data['critere']=='affaire_id')) {
                 
                  $attributions = $this->Attributions->find()->innerJoinWith('Soumissions')->innerJoinWith('Soumissions.Affaires')->select()->where('Affaires.intitule LIKE "%'.$rech.'%" and Soumissions.id = (select id from soumissions S1 where id = S1.id order by S1.id DESC limit 1 )');

            } else {
                if (($this->request->data['critere']=='soumissionnaire_id')) {
                    
                 $attributions = $this->Attributions->find()->innerJoinWith('Soumissions')->innerJoinWith('Soumissions.Soumissionnaires')->select()->where('Soumissionnaires.nom LIKE "%'.$rech.'%" and Soumissions.id = (select id from soumissions S1 where id = S1.id order by S1.id DESC limit 1 )');
                } else {
                    $attributions = $this->Attributions->find()->select()->where('Attributions.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }
                 
                }
        }else{
            $attributions=$this->Attributions; 
        }
        $this->paginate = [
            'contain' => ['Soumissions', 'Soumissions.Affaires', 'Soumissions.Soumissionnaires']
        ];   
        $attributions = $this->paginate($attributions);

        $this->set(compact('attributions'));
        $this->set('_serialize', ['attributions']);
    }

    /**
     * View method
     *
     * @param string|null $id Attribution id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attribution = $this->Attributions->get($id, [
            'contain' => ['Soumissions', 'Soumissions.Affaires', 'Soumissions.Soumissionnaires']
        ]);

        $this->set('attribution', $attribution);
        $this->set('_serialize', ['attribution']);
    }

    public function listeSoumissionnaires($idaffaire = null){
        //$this->autoRender = false;
        $idaffaire = $this->request->params['pass'][0]; 
        //debug($idaffaire); 
        //$this->layout = null;
        $soumissionnaires = array();
        $this->loadModel('Soumissionnaires'); 
        $soumissionnaires = $this->Soumissionnaires->find()
                ->select()->innerJoinWith('Soumissions')
                ->where('Soumissions.affaire_id = '.$idaffaire);
        $this->set('soumissionnaires', $soumissionnaires);
        $this->set('_serialize', ['soumissionnaires']);
            //$this->set(compact('soumissionnaires'));
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Societes'); 
        $attribution = $this->Attributions->newEntity();
        if ($this->request->is('post')) {
            
            $affaire_id = $this->request->data['affaire_id']; 
            $soumissionnaire_id = $this->request->data['soumissionnaire_id']; 
            $soumission = $this->Attributions->Soumissions->find()
                                ->select()
                                ->where('Soumissions.affaire_id ='.$affaire_id.' and Soumissions.soumissionnaire_id = '.$soumissionnaire_id)
                                ->first(); 
            $attribution = $this->Attributions->patchEntity($attribution, $this->request->data);
            $attribution->soumission_id = $soumission->id; 
            $attribution->dateattribution = date('Y-m-d'); 
            if ($this->Attributions->save($attribution)) {
                $this->addMarche($soumissionnaire_id, $affaire_id, $soumission); 
                $this->Flash->success(__('The {0} has been saved.', 'Attribution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribution'));
            }
        }

        //$soumissions = $this->Attributions->Soumissions->find('list', ['limit' => 200]);
        $affaires = $this->Attributions->Soumissions->Affaires->find('list', ['limit' => 200]);
        //$soumissionnaires  = $this->Attributions->Soumissions->Soumissionnaires->find('list', ['limit' => 200]);
        $this->set(compact('attribution', 'affaires'));
        $this->set('_serialize', ['attribution']);

        
    }

    public function addMarche($soumissionnaire_id = null, $affaire_id = null, $soumission = null){
        $this->loadModel('Marches'); 
        $soumissionnaire = $this->Attributions->Soumissions->Soumissionnaires->get($soumissionnaire_id);
        $societe = $this->Societes->find()
                        ->select()
                        ->where('Societes.nom like "%'.$soumissionnaire->nom.'%"')
                        ->first();
        if ($societe != null){
            $maitres_oeuvre = $this->Marches->MaitresOeuvres->find()
                        ->select()
                        ->where('MaitresOeuvres.nom like "%'.$soumissionnaire->nom.'%"')
                        ->first();
            if ($maitres_oeuvre == null)
            { 
                $maitres_oeuvre = $this->Marches->MaitresOeuvres->newEntity();
                $maitres_oeuvre = $this->setMaitreOeuvre($soumissionnaire) ; 
                $this->Marches->MaitresOeuvres->save($maitres_oeuvre);
            }
            $marche = $this->Marches->newEntity();
            $marche->affaire_id = $affaire_id; 
            $marche->maitres_oeuvre_id = $maitres_oeuvre->id;
            if($this->Marches->save($marche))
            {
                $this->addDetailsMarche($marche->id, $soumission, $affaire_id); 
                $this->addEtatMarche($marche->id); 
            }
            else 
            { 
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'marche'));
            }
         }
    }

    public function setMaitreOeuvre ($soumissionnaire = null){
        $maitres_oeuvre = $this->Marches->MaitresOeuvres->newEntity();
        if($soumissionnaire != null){
            $maitres_oeuvre->nom = $soumissionnaire->nom; 
            $maitres_oeuvre->adresse = $soumissionnaire->adresse;
            $maitres_oeuvre->NumeroFixe = $soumissionnaire->NumeroFixe;
            $maitres_oeuvre->numeroPortable = $soumissionnaire->numeroPortable;
            $maitres_oeuvre->fax = $soumissionnaire->fax;
            $maitres_oeuvre->nif = $soumissionnaire->nif;
            $maitres_oeuvre->nis = $soumissionnaire->nis;
            $maitres_oeuvre->nrcf = $soumissionnaire->nrcf;
            $maitres_oeuvre->article = $soumissionnaire->article;
            $maitres_oeuvre->compte = $soumissionnaire->compte;
            $maitres_oeuvre->email = $soumissionnaire->email;
            $maitres_oeuvre->agence = $soumissionnaire->agence;
        }
        return  $maitres_oeuvre;
    }

    public function addDetailsMarche($id = null, $soumission = null, $affaire_id= null){

        $affaire = $this->Attributions->Soumissions->Affaires->find()
                                ->select()->innerJoinWith('Soumissions')
                                ->where('Soumissions.affaire_id ='.$affaire_id)
                                ->first();
                        $detailsmarche = $this->Attributions->Soumissions->Affaires->Marches->DetailsMarches->newEntity();
                        $detailsmarche->marche_id = $id;
                        $detailsmarche->datedetails =  date('Y-m-d');
                        $detailsmarche->intitule =  $affaire->intitule;
                        $detailsmarche->montant =  $soumission->montant;
                        $detailsmarche->delai =  $soumission->delais;
        $this->Attributions->Soumissions->Affaires->Marches->DetailsMarches->save($detailsmarche);
    }

    public function addEtatMarche($id = null){

        $this->loadModel('Etats'); 
        $etat = $this->Etats->find()
                                ->select('id')
                                ->where('Etats.libelle = "En cours"')
                                ->first();
                        $etatmarche = $this->Attributions->Soumissions->Affaires->Marches->EtatsMarches->newEntity();
                        $etatmarche->marche_id = $id;
                        $etatmarche->dateetat =  date('Y-m-d');
                        $etatmarche->etat_id =  $etat->id;
                        $this->Attributions->Soumissions->Affaires->Marches->EtatsMarches->save($etatmarche);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attribution id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attribution = $this->Attributions->get($id, [
            'contain' => ['Soumissions', 'Soumissions.Affaires']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $affaire_id = $attribution->soumission->affaire_id;
            $soumissionnaire_id = $this->request->data['soumissionnaire_id']; 
            $soumission = $this->Attributions->Soumissions->find()
                                ->select()
                                ->where('Soumissions.affaire_id ='.$affaire_id.' and Soumissions.soumissionnaire_id = '.$soumissionnaire_id)
                                ->first(); 
            $attribution = $this->Attributions->patchEntity($attribution, $this->request->data);
            $attribution->soumission_id = $soumission->id; 
            if ($this->Attributions->save($attribution)) {
                $this->editMarche($affaire_id, $soumissionnaire_id); 
                $this->editDetailsMarche($affaire_id, $soumission); 
                $this->Flash->success(__('The {0} has been saved.', 'Attribution'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attribution'));
            }
        }
        $soumissionnaires = $this->Attributions->Soumissions->Soumissionnaires->find('list')
                            ->select()->innerJoinWith('Soumissions')
                            ->where('Soumissions.affaire_id = '.$attribution->soumission->affaire_id);                    
        $this->set(compact('attribution', 'soumissionnaires'));
        $this->set('_serialize', ['attribution']);
    }

    public function editMarche($affaire_id = null, $soumissionnaire_id = null){
        $this->loadModel('Marches');
        $marche = $this->Marches->find()
                                ->select()
                                ->where('Marches.affaire_id ='.$affaire_id)
                                ->first(); 
        $soumissionnaire = $this->Attributions->Soumissions->Soumissionnaires->get($soumissionnaire_id);
        $maitres_oeuvre = $this->Marches->MaitresOeuvres->find()
                        ->select()
                        ->where('MaitresOeuvres.nom like "%'.$soumissionnaire->nom.'%"')
                        ->first();
        if ($maitres_oeuvre == null)
        { 
            $maitres_oeuvre = $this->Marches->MaitresOeuvres->newEntity();
            $maitres_oeuvre = $this->setMaitreOeuvre($soumissionnaire) ; 
            $this->Marches->MaitresOeuvres->save($maitres_oeuvre);
        }
        $marche->maitres_oeuvre_id = $maitres_oeuvre->id; 
        $this->Marches->save($marche);                         
    }

    public function editDetailsMarche($affaire_id = null, $soumission = null){
        $this->loadModel('Marches');
        $marche = $this->Marches->find()
                                ->select()
                                ->where('Marches.affaire_id ='.$affaire_id)
                                ->first(); 
        $detailsmarche = $this->Marches->DetailsMarches->find()
                        ->select()
                        ->where('DetailsMarches.marche_id = '.$marche->id)
                        ->last();
        if ($detailsmarche != null)
        { 
            $detailsmarche->montant = $soumission->montant;
            $detailsmarche->delai  = $soumission->delais ; 
            $this->Marches->DetailsMarches->save($detailsmarche);
        }                        
    }
    /**
     * Delete method
     *
     * @param string|null $id Attribution id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attribution = $this->Attributions->get($id);
        if ($this->Attributions->delete($attribution)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attribution'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attribution'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
