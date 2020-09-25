<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Odss Controller
 *
 * @property \App\Model\Table\OdssTable $Odss
 *
 * @method \App\Model\Entity\Ods[] paginate($object = null, array $settings = [])
 */
class OdssController extends AppController
{

    /**
     * Index method 
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        if(!empty($this->request->data)){
            //debug($this->request->data);
            $rech = $this->request->data['search'];
            if (($this->request->data['critere']=='marche_id')) {
                 $odss = $this->Odss->find()->innerJoinWith('Marches')->innerJoinWith('Marches.DetailsMarches')->select()->where('DetailsMarches.intitule LIKE "%'.$rech.'%" and DetailsMarches.id = (select id from details_marches M1 where id = M1.id order by M1.id DESC limit 1 )');

            } else {
                if (($this->request->data['critere']=='types_ODS_id')) {
               
               $odss = $this->Odss->find()->innerJoinWith('TypesOdss')->select()->where('TypesOdss.libelle LIKE "%'.$rech.'%"');
                } else {
                    if (($this->request->data['critere']=='dateODS')) {
                        $time = substr($rech, 6, 4).
                            substr($rech, 2, 4).
                            substr($rech, 0, 2);
                        $rech = $time;
                        $odss = $this->Odss->find()->select()->where('Odss.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    } else {
                        $odss = $this->Odss->find()->select()->where('Odss.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                }
                 
                }
        }else{
            $odss=$this->Odss; 
        }

        $this->paginate = [
            'contain' => ['TypesODSs', 'Marches', 'Marches.DetailsMarches']
        ];
        $odss = $this->paginate($odss);

        $this->set(compact('odss'));
        $this->set('_serialize', ['odss']);
    }
    /**
     * View method
     *
     * @param string|null $id Ods id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ods = $this->Odss->get($id, [
            'contain' => ['TypesODSs', 'Marches', 'Marches.DetailsMarches','Documents']
        ]);
        
         $this->loadModel('Documents');
        $documents = $this->Documents->find()->select()->where('Documents.id = \''.$ods['document_id'].'\'')->first();
        $this->set(compact('documents'));

        $this->set('ods', $ods);
        $this->set('_serialize', ['ods']);
    }

    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }

    public function ExistODS($idMarche = null){

        $count = $this->Odss->find()->select()->innerJoinWith('TypesODSs')
                            ->where('marche_id = '.$idMarche.' and TypesODSs.libelle in ("Départ", "Depart")')->count(); 

        return $count != 0; 
    }

    public function EtatMarche($idMarche = null){

        $libelle = $this->Odss->Marches->EtatsMarches->Etats->find()->select()->innerJoinWith('EtatsMarches')
                            ->where('EtatsMarches.marche_id = '.$idMarche.' order by EtatsMarches.id DESC')->first()->libelle; 
        return $libelle; 
    }
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {  
        $ods = $this->Odss->newEntity();
        $typesODS = $this->Odss->TypesODSs->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('dateODS');
               $marche_id = $this->Odss->Marches->DetailsMarches->get($this->request->data['details_marche_id'])->marche_id;
            $ods = $this->Odss->patchEntity($ods, $this->request->data);
                $this->loadModel('Documents');
                $this->loadModel('DocumentsTags');
                  $Documents = $this->Documents->newEntity(); 
                   if (!empty($this->request->data['document']['tmp_name'])) {

                        $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                        $size = $this->request->data['document']['size'];

                            if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                                $file = 'ODS'.time().'.'. $extension;
                                $path = WWW_ROOT . 'files' . DS . 'ODS';

                                    if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                        $this->request->data['document'] = $file;
                                        $Documents = $this->Documents->patchEntity($Documents, $this->request->data);
                                        $Documents->libelle='ODS-'.$this->request->data['numero'];
                                        if ($this->Documents->save($Documents)){
                                            $tags="ODS";
                                            $tag = $this->Documents->Tags->find()->select()->where('Tags.libelle = \''.$tags.'\'')->first();
                                            if (!isset($tag)) {
                                                $tag = $this->Documents->Tags->newEntity();
                                                $tag->libelle= $tags;
                                                $this->Documents->Tags->save($tag);
                                            }
                                            $documentstag = $this->DocumentsTags->newEntity();
                                            $documentstag->document_id=$Documents->id;
                                            $documentstag->tag_id=$tag->id;
                                            $this->Documents->DocumentsTags->save($documentstag);
                                              $ods->document_id=$Documents->id;
                                        } else {
                                            $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer', 'documents'));
                                        } 

                                    }else{
                                        $this->Flash->error(__('4 The {0} could not be saved. Please, try again.', 'documents'));
                                    }
                            }else{
                                    $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer. 
                                Les fichiers autoriser sont " .jpg, .png, .jpeg,.pdf,.gif,.docx,.doc"', 'documents'));
                            }
                    }


         
            $ods->marche_id = $marche_id; 
            $typeODS = $this->Odss->TypesODSs->get($ods->types_ODS_id)->libelle; 
            if (($typeODS == "Départ" || $typeODS == "Depart") && $this->ExistODS($ods->marche_id))
                 $this->Flash->error(__('L\'{0} de départ existe déjà et ne peut être dupliqué.', 'ODS'));
            else    
            {
                if (($typeODS == "Arret" || $typeODS == "Arrêt") 
                    && ($this->EtatMarche($ods->marche_id) == "Suspendu"))
                    $this->Flash->error(__('Le marché est déja suspendu, un {0} d\'arrêt ne peut être ajouté.', 'ODS'));
                else {
                    if (($typeODS == "Reprise") 
                    && ($this->EtatMarche($ods->marche_id) == "En cours"))
                        $this->Flash->error(__('Le marché est déja en cours, un {0} de reprise ne peut être ajouté.', 'ODS'));
                    else {
                        if ($this->Odss->save($ods)) {
                            $etatMarche = $this->Odss->Marches->EtatsMarches->newEntity();
                            $etatMarche->marche_id = $ods->marche_id; 
                            $etatMarche->dateetat = $ods->dateODS;
                            $etatMarche->ODS_id = $ods->id;
                            if ($typeODS == "Départ" || $typeODS == "Depart") 
                                //Ajout dans agenda date de début du projet
                                $a = 0;
                            else 
                            {
                                if ($typeODS == "Arret" || $typeODS == "Arrêt") 
                                {
                                    $etatMarche->etat_id = $this->Odss->Marches->EtatsMarches->Etats
                                                           ->find()->select()->where('Etats.libelle = "suspendu"')->first()
                                                           ->id;

                                    foreach ($this->request->data['chantiers'] as $chantier) {
                                        $odssChantier = $this->Odss->ODSsChantiers->newEntity();
                                        $odssChantier->chantier_id = $chantier;
                                        $odssChantier->ods_id = $ods->id;
                                        $this->Odss->ODSsChantiers->save($odssChantier);
                                        
                                    }   
                                }
                                else 
                                {    $etatMarche->etat_id = $this->Odss->Marches->EtatsMarches->Etats
                                                           ->find()->select()->where('Etats.libelle = "En cours"')->first()->id; 
                                    foreach ($this->request->data['chantiers'] as $chantier) {
                                        $odssChantier = $this->Odss->ODSsChantiers->newEntity();
                                        $odssChantier->chantier_id = $chantier;
                                        $odssChantier->ods_id = $ods->id;
                                        $this->Odss->ODSsChantiers->save($odssChantier);
                                    } 
                                } 
                                $this->Odss->Marches->EtatsMarches->save($etatMarche);
                            }
                            $this->Flash->success(__('The {0} has been saved.', 'Ods'));
                            return $this->redirect(['action' => 'index']);
                        } else {
                            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ods'));
                        }
                    }
                }
            }
        }
        $typesODSs = $this->Odss->TypesODSs->find('list', ['limit' => 200]);
        $detailsMarches = $this->Odss->Marches->DetailsMarches->find('list')
                                                ->select()
                                                ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $chantiers = $this->Odss->ODSsChantiers->Chantiers->find('list', ['limit' => 200]);
        $this->set(compact('ods', 'typesODSs', 'detailsMarches', 'typesODS', 'chantiers'));
        $this->set('_serialize', ['ods']);
    }

    public function listetypes(){
        $types = array();
        $types = $this->Odss->TypesODSs->find();
        $this->set('types', $types);
        $this->set('_serialize', ['types']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ods id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ods = $this->Odss->get($id, [
            'contain' => ['Marches', 'Marches.DetailsMarches', 'TypesODSs']
        ]);
        $typesODS = $this->Odss->TypesODSs->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('dateODS');
             /******************************* sauvgarde de document  ****************************/
                $this->loadModel('Documents');
                $this->loadModel('DocumentsTags');
                  $Documents = $this->Documents->newEntity(); 
                   if (!empty($this->request->data['document']['tmp_name'])) {

                        $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                        $size = $this->request->data['document']['size'];

                            if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                                $file = 'ODS'.time().'.'. $extension;
                                $path = WWW_ROOT . 'files' . DS . 'ODS';

                                    if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                        $this->request->data['document'] = $file;
                                        $Documents = $this->Documents->patchEntity($Documents, $this->request->data);
                                        $Documents->libelle='ODS-'.$this->request->data['numero'];
                                        if ($this->Documents->save($Documents)){
                                            $tags="ODS";
                                            $tag = $this->Documents->Tags->find()->select()->where('Tags.libelle = \''.$tags.'\'')->first();
                                            if (!isset($tag)) {
                                                $tag = $this->Documents->Tags->newEntity();
                                                $tag->libelle= $tags;
                                                $this->Documents->Tags->save($tag);
                                            }
                                            $documentstag = $this->DocumentsTags->newEntity();
                                            $documentstag->document_id=$Documents->id;
                                            $documentstag->tag_id=$tag->id;
                                            $this->Documents->DocumentsTags->save($documentstag);
                                        } else {
                                            $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer', 'documents'));
                                        } 

                                    }else{
                                        $this->Flash->error(__('4 The {0} could not be saved. Please, try again.', 'documents'));
                                    }
                            }else{
                                    $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer. 
                                Les fichiers autoriser sont " .jpg, .png, .jpeg,.pdf,.gif,.docx,.doc"', 'documents'));
                            }
                    }
            $marche_id = $this->Odss->Marches->DetailsMarches->get($this->request->data['details_marche_id'])->marche_id;
            $ods = $this->Odss->patchEntity($ods, $this->request->data);
            $ods->marche_id = $marche_id; 
            $ods->document_id=$Documents->id;
            $typeODS = $this->Odss->TypesODSs->get($ods->types_ODS_id)->libelle; 
            if (($typeODS == "Départ" || $typeODS == "Depart") && $this->ExistODS($ods->marche_id))
                 $this->Flash->error(__('L\'{0} de départ existe déjà et ne peut être dupliqué.', 'ODS'));
            else    
            {
                if (($typeODS == "Arret" || $typeODS == "Arrêt") 
                    && ($this->EtatMarche($ods->marche_id) == "Suspendu"))
                    $this->Flash->error(__('Le marché est déja suspendu, un {0} d\'arrêt ne peut être ajouté.', 'ODS'));
                else {
                    if (($typeODS == "Reprise") 
                    && ($this->EtatMarche($ods->marche_id) == "En cours"))
                        $this->Flash->error(__('Le marché est déja en cours, un {0} de reprise ne peut être ajouté.', 'ODS'));
                    else {
                        if ($this->Odss->save($ods)) {
                            if ($typeODS == "Départ" || $typeODS == "Depart") 
                                //Ajout dans agenda date de début du projet
                                $a = 0;
                            else 
                            {
                                $etatMarche = $this->Odss->Marches->EtatsMarches
                                               ->find()->select()
                                               ->where('EtatsMarches.marche_id = '.$ods->marche_id.' order by id DESC')
                                               ->first(); 
                                $etatMarche->dateetat = $ods->dateODS;
                                $etatMarche->ODS_id = $ods->id;
                                if ($typeODS == "Arret" || $typeODS == "Arrêt") 
                                    $etatMarche->etat_id = $this->Odss->Marches->EtatsMarches->Etats
                                                           ->find()->select()->where('Etats.libelle = "Suspendu"')->first()
                                                           ->id;
                                else 
                                    $etatMarche->etat_id = $this->Odss->Marches->EtatsMarches->Etats
                                                           ->find()->select()->where('Etats.libelle = "En cours"')->first()->id;

                                $this->Odss->Marches->EtatsMarches->save($etatMarche);
                            }
                            $this->Flash->success(__('The {0} has been saved.', 'Ods'));
                            return $this->redirect(['action' => 'index']);
                        } else {
                            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Ods'));
                        }
                    }
                }
            }
        }
        $typesODSs = $this->Odss->TypesODSs->find('list', ['limit' => 200]);
        $detailsMarches = $this->Odss->Marches->DetailsMarches->find('list')
                                                ->select()
                                                ->where('DetailsMarches.id = (select id from details_marches d1 where DetailsMarches.id = d1.id order by d1.id DESC limit 1)');
        $this->set(compact('ods', 'typesODSs', 'detailsMarches', 'typesODS'));
        $this->set('_serialize', ['ods']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ods id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ods = $this->Odss->get($id);
        if ($this->Odss->delete($ods)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Ods'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Ods'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
