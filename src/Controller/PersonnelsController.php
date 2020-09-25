<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Personnels Controller
 *
 * @property \App\Model\Table\PersonnelsTable $Personnels
 *
 * @method \App\Model\Entity\Personnel[] paginate($object = null, array $settings = [])
 */
class PersonnelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnes', 'Positions', 'EtatsPersonnel', 'Positions.PositionsAdministratives', 'Positions.PositionsAdministratives.Fonctions', 'Positions.PositionsChantiers.Fonctions']
        ];

        $personnels = $this->paginate($this->Personnels);

        $this->set(compact('personnels'));
        $this->set('_serialize', ['personnels']);
    }

    /**
     * View method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Personnes');
        
        $personnel = $this->Personnels->get($id, [
            'contain' => ['Personnes', 'Positions', 'AffectationsRessource', 'Avertissements', 'EquipesPersonnel', 'EtatsPersonnel', 'FormationsPersonnel', 'Gerants', 'Positions.PositionsAdministratives', 'Positions.PositionsChantiers', 'Responsables', 'Users', 'Positions.PositionsAdministratives.Fonctions', 'Positions.PositionsChantiers.Fonctions', 'Salaires']
        ]);
        $this->set('personnel', $personnel);
        $personne = $this->Personnes->get($personnel->personne_id, [
            'contain' => ['SituationsFamiliales', 'Sexes']
        ]);
        $this->set('personne', $personne);
        $this->set(compact('personnel', 'personne')); 
        $this->set('_serialize', ['personnel']);
    }

    public function listeChantier($details_marche_id = null){
        $chantiers = array();
        $details= $this->Personnels->Positions->PositionsChantiers->Chantiers->Marches->DetailsMarches->get($details_marche_id);
        $chantiers = $this->Personnels->Positions->PositionsChantiers->Chantiers
                          ->find()
                          ->select()
                          ->where(' marche_id = '.$details->marche_id);
        $this->set('chantiers', $chantiers);
        $this->set('_serialize', ['chantiers']);
    }

    public function listeDepartements(){
        $departements = array();
        $departements = $this->Personnels->Positions->PositionsAdministratives->Departements
                             ->find();
        $this->set('departements', $departements);
        $this->set('_serialize', ['departements']);
    }

    public function listeFonctionsAdministratives(){
        $fonctions = array();
        $fonctions = $this->Personnels->Positions->PositionsAdministratives->Fonctions
                             ->find()
                             ->select()
                             ->where('id in (select fonction_id from fonctions_administratives)');
        $this->set('fonctions', $fonctions);
        $this->set('_serialize', ['fonctions']);
    }

    public function listeFonctionsChantier($chantier_id = null){
        $fonctions = array();
        $fonctions = $this->Personnels->Positions->PositionsChantiers->Fonctions
                             ->find()
                             ->select()
                             ->where('id in (select fonction_id from fonctions_chantier)');
        $this->set('fonctions', $fonctions);
        $this->set('_serialize', ['fonctions']);
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
        $this->loadModel('Personnes');
        $this->loadModel('DocumentsTags');
        $personne = $this->Personnes->newEntity();
        $personnel = $this->Personnels->newEntity();
        $fonction = $this->Personnels->Positions->PositionsAdministratives->Fonctions->newEntity(); 
        if ($this->request->is('post')) {
            $this->toValideTime('datedenaissance');
            $personne = $this->Personnes->patchEntity($personne, $this->request->data);
            if ($this->Personnes->save($personne)) {
                $personnel = $this->Personnels->patchEntity($personnel, $this->request->data);
                $personnel->personne_id = $personne->id;
                if ($this->Personnels->save($personnel)) {
                    $contratdata = $this->request->data['Contrats'];
                    $time = substr($contratdata['dateetablissement'], 6, 4).
                        substr($contratdata['dateetablissement'], 2, 4).
                        substr($contratdata['dateetablissement'], 0, 2);
                    $contratdata['dateetablissement'] = $time; 
                    $contrat = $this->Personnels->ContratsPersonnels->Contrats->newEntity(); 
                    $contrat = $this->Personnels->ContratsPersonnels->Contrats->patchEntity($contrat, $contratdata);
                    if (!empty($this->request->data['document']['tmp_name'])) {
                        $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                        $filename = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_FILENAME));
                        $size = $this->request->data['document']['size'];
                        if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc'))) {
                            $file = 'Contrats-'.time() . '.' . $extension;
                            $path = WWW_ROOT . 'files' . DS . 'Contrats';
                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file))
                            {
                                $document = $this->Personnels->ContratsPersonnels->Contrats->Documents->newEntity();
                                $tag = $this->Personnels->ContratsPersonnels->Contrats->Documents->tags->newEntity();
                                $documenttag = $this->DocumentsTags->newEntity();
                                $this->request->data['document'] = $file;
                                $document->libelle = $filename ; 
                                $document->document = $file;  
                                $this->Personnels->ContratsPersonnels->Contrats->Documents->save($document);
                                $tag->libelle = 'Contrat';
                                $this->Personnels->ContratsPersonnels->Contrats->Documents->tags->save($tag);
                                $documenttag->document_id = $document->id; 
                                $documenttag->tag_id = $tag->id;
                                $this->DocumentsTags->save($documenttag);
                                $contrat->document_id = $document->id;
                            }
                        }
                    }
                    $this->Personnels->ContratsPersonnels->Contrats->save($contrat); 
                    $etatContrat = $this->Personnels->ContratsPersonnels->Contrats->EtatsContrats->newEntity(); 
                    $etatContrat->types_etats_contrat_id = $contratdata['types_etats_contrat_id'];
                    $etatContrat->contrat_id = $contrat->id; 
                    $this->Personnels->ContratsPersonnels->Contrats->EtatsContrats->save($etatContrat);

                    $contratPersonnel = $this->Personnels->ContratsPersonnels->newEntity(); 
                    $contratPersonnel->contrat_id = $contrat->id; 
                    $contratPersonnel->personnel_id = $personnel->id; 
                    $this->Personnels->ContratsPersonnels->save($contratPersonnel);

                    $fonctionsdata = $this->request->data['Fonctions']; 
                    $position = $this->Personnels->Positions->newEntity(); 
                    $position->personnel_id = $personnel->id; 
                    $position->dateposition = $contrat->dateetablissement; 
                    $this->Personnels->Positions->save($position);
                    if ($fonctionsdata['types_fonction_id'] == 1)
                    {
                        $positiona = $this->Personnels->Positions->PositionsAdministratives->newEntity(); 
                        $positiona->position_id = $position->id; 
                        $positiona->fonction_id = $fonctionsdata['fonction_id'];
                        $positiona->departement_id = $fonctionsdata['position'];
                        $this->Personnels->Positions->PositionsAdministratives->save($positiona);
                    }
                    else if ($fonctionsdata['types_fonction_id'] == 2)
                    {
                        $positionc = $this->Personnels->Positions->PositionsChantiers->newEntity(); 
                        $positionc->position_id = $position->id; 
                        $positionc->fonction_id = $fonctionsdata['fonction_id'];
                        $positionc->chantier_id = $fonctionsdata['position'];
                        $this->Personnels->Positions->PositionsChantiers->save($positionc);
                    }
                    $salaire = $this->Personnels->Salaires->newEntity(); 
                    $salaire->personnel_id = $personnel->id; 
                    $salaire->montant = $fonctionsdata['salaire']; 
                    $salaire->datesalaire = $contrat->dateetablissement; 
                    $this->Personnels->Salaires->save($salaire); 
                    $this->Flash->success(__('The {0} has been saved.', 'Personnel'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personnel'));
                }
            }
            else 
            {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personne'));
            }
        }
        $detailsMarches = $this->Personnels->Positions->PositionsChantiers->Chantiers->Marches->DetailsMarches->find('list')
                               ->select()
                               ->where('id = (select id from details_marches d1 where id = id order by d1.id DESC limit 1)');
        //$personnes = $this->Personnels->Personnes->find('list', ['limit' => 200]);
        $situationsFamiliales = $this->Personnes->SituationsFamiliales->find('list', ['limit' => 200]);
        $typesEtatsContrats = $this->Personnels->ContratsPersonnels->Contrats->EtatsContrats->TypesEtatsContrats->find('list', ['limit' => 200]);
        $sexes = $this->Personnes->Sexes->find('list', ['limit' => 200]);
        $typesPersonnels = $this->Personnels->TypesPersonnels->find('list', ['limit' => 200]);
        $this->set(compact('personnel', 'personnes', 'typesPersonnels', 'situationsFamiliales', 'sexes', 'detailsMarches', 'fonction', 'typesEtatsContrats'));
        $this->set('_serialize', ['personnel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personnel = $this->Personnels->get($id, [
            'contain' => ['Personnes', 'Positions', 'Salaires', 'Positions.PositionsAdministratives', 'Positions.PositionsChantiers', 'Positions.PositionsAdministratives.Fonctions', 'Positions.PositionsChantiers.Fonctions', 'ContratsPersonnels', 'ContratsPersonnels.Contrats', 'ContratsPersonnels.Contrats.EtatsContrats', 'ContratsPersonnels.Contrats.EtatsContrats.TypesEtatsContrats', 'Positions.PositionsAdministratives.Departements', 'Positions.PositionsChantiers.Chantiers', 'Positions.PositionsChantiers.Chantiers.Marches.DetailsMarches']
        ]);
        $fonctions = null; 
        $positions = null;
        /*if(end($personnel->positions)->has('positions_administratives') && !empty(end($personnel->positions)->positions_administratives)){
            $fonctions = $this->Personnels->Positions->PositionsAdministratives->Fonctions
                             ->find('list')
                             ->select()
                             ->where('id in (select fonction_id from fonctions_administratives)');; 
            $positions = $this->Personnels->Positions->PositionsAdministratives->Departements
                             ->find('list');
        } 
        else {
            $fonctions = $this->Personnels->Positions->PositionsChantiers->Fonctions
                             ->find('list')
                             ->select()
                             ->where('id in (select fonction_id from fonctions_chantier)');; 
            $positions = $this->Personnels->Positions->PositionsChantiers->Chantiers
                          ->find('list')
                          ->select()
                          ->where(' marche_id = '.end(end($personnel->positions)->positions_chantiers)->chantier->marche->id);
        }*/
       //$fonction = $this->Personnels->Positions->PositionsAdministratives->Fonctions->newEntity(); 
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datedenaissance');
            $personne = $this->Personnels->Personnes->newEntity(); 
            $personne = $this->Personnels->patchEntity($personne, $this->request->data);
            $personne->id = $this->request->data['id']; 
            $personnel = $this->Personnels->patchEntity($personnel, $this->request->data);
            $this->Personnels->Personnes->save($personne);
            $personnel->personne_id = $personne->id;
            if ($this->Personnels->save($personnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Personnel'));
            }
        }
        $situationsFamiliales = $this->Personnels->Personnes->SituationsFamiliales->find('list', ['limit' => 200]);
        $sexes = $this->Personnels->Personnes->Sexes->find('list', ['limit' => 200]);
        $typesPersonnels = $this->Personnels->TypesPersonnels->find('list', ['limit' => 200]);
        $this->set(compact('personnel', 'personnes', 'typesPersonnels', 'sexes', 'situationsFamiliales'));
        $this->set('_serialize', ['personnel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Personnel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personnel = $this->Personnels->get($id);
        if ($this->Personnels->delete($personnel)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Personnel'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Personnel'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
