<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Avenants Controller
 *
 * @property \App\Model\Table\AvenantsTable $Avenants
 *
 * @method \App\Model\Entity\Avenant[] paginate($object = null, array $settings = [])
 */
class AvenantsController extends AppController
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
            if (($this->request->data['critere']=='marche_id')) {
                 
                  $avenants = $this->Avenants->find()->innerJoinWith('Marches')->innerJoinWith('Marches.DetailsMarches')->select()->where('DetailsMarches.intitule LIKE "%'.$rech.'%" and DetailsMarches.id = (select id from details_marches M1 where id = M1.id order by M1.id DESC limit 1 )');

            } else {
                if (($this->request->data['critere']=='dateavenant')) {
                    
                 $time = substr($rech, 6, 4).
                            substr($rech, 2, 4).
                            substr($rech, 0, 2);
                        $rech = $time;
                        $avenants = $this->Avenants->find()->select()->where('Avenants.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                } else {
                    $avenants = $this->Avenants->find()->select()->where('Avenants.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }
                 
                }
        }else{
            $avenants=$this->Avenants; 
        }
        $this->paginate = [
            'contain' => ['Marches', 'Marches.DetailsMarches']
        ];
        $avenants = $this->paginate($avenants);

        $this->set(compact('avenants'));
        $this->set('_serialize', ['avenants']);
    }

    /**
     * View method
     *
     * @param string|null $id Avenant id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $avenant = $this->Avenants->get($id, [
            'contain' => ['Marches', 'Marches.detailsMarches','Documents']
        ]);
        $iddevis = $this->Avenants->Devis->find()->select()->where('avenant_id = '.$avenant->id)->first()->id; 
        $devi = $this->Avenants->Devis->get($iddevis, [
            'contain' => ['Lots'=> [
                'sort' => ['Lots.id' => 'ASC']
            ], 'Lots.Parties'=> [
                'sort' => ['Parties.id' => 'ASC']
            ], 'Lots.Parties.Articles'=> [
                'sort' => ['Articles.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle'=> [
                'sort' => ['DetailsArticle.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle.Unites'
        ]]);

        $this->loadModel('Documents');
        $documents = $this->Documents->find()->select()->where('Documents.id = \''.$avenant['document_id'].'\'')->first();

        $this->set(compact('avenant', 'devi','documents'));
        $this->set('_serialize', ['avenant']);
    }

    public function getDetailsProjet($iddetails = null){
        $details = $this->Avenants->Marches->DetailsMarches->get($iddetails); 
        $this->set('details', $details);
        $this->set('_serialize', ['details']);
    }

    public function listeUnite(){
        $unite = array();
        $this->loadModel('Unites'); 
        $unite = $this->Unites->find();
        $this->set('unite', $unite);
        $this->set('_serialize', ['unite']);
    }

    public function getDevis($iddetails = null){
        $idMarche = $this->Avenants->Marches->DetailsMarches->get($iddetails)->marche_id; 
        $idDevi = $this->Avenants->Marches->Devis->find()
                       ->select()->where('marche_id = '
                       .$idMarche)->last()->id;
        $devi = $this->Avenants->Marches->Devis->get($idDevi, [
            'contain' => ['Marches', 'Marches.DetailsMarches', 'Lots'=> [
                'sort' => ['Lots.id' => 'ASC']
            ], 'Lots.Parties'=> [
                'sort' => ['Parties.id' => 'ASC']
            ], 'Lots.Parties.Articles'=> [
                'sort' => ['Articles.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle'=> [
                'sort' => ['DetailsArticle.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle.Unites'
        ]]); 

        $unites= $this->Avenants->LotsAvenants->PartiesAvenants->ArticlesAvenants->DetailsArticlesAvenants->unites->find('list'); 
        $this->set(compact('unites', 'devi'));
        $this->set('_serialize', ['devi']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $avenant = $this->Avenants->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('dateavenant');
            $details= $this->Avenants->Marches->DetailsMarches->get($this->request->data['details_marche_id']);
            $marche_id = $details->marche_id; 

            $avenant = $this->Avenants->patchEntity($avenant, $this->request->data);

             /******************************* sauvgarde de document  ****************************/
             $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Avenants'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Avenants';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle="Avenants-".$this->request->data['numero'];
                                          //  debug($Documents->libelle);die();
                                if ($this->Documents->save($Documents)){
                                    $tags="Avenants";
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
                                      $avenant->document_id=$Documents->id;
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

            /********************************************************/

            $avenant->marche_id = $marche_id;
            if ($this->Avenants->save($avenant)) {
                $devi = $this->Avenants->Marches->Devis->newEntity(); 
                $devi->intitule = "Devis apres récéption de l'avenant N° ".$avenant->numero ; 
                $devi->datedevis = $avenant->dateavenant; 
                $devi->avenant_id = $avenant->id; 
                $devi->marche_id = $marche_id; 
                $this->Avenants->Marches->Devis->save($devi); 
                $this->addLots($this->request->data['Lots'], $devi->id); 
                if($details['montant'] != $this->request->data['montant'] || $details['delai'] != $this->request->data['delai']){
                    $details_marche = $this->Avenants->Marches->DetailsMarches->newEntity(); 
                    $details_marche->datedetails = $avenant->dateavenant;  
                    $details_marche->marche_id = $marche_id;  
                    $details_marche->avenant_id = $avenant->id; 
                    $details_marche->intitule = $details->intitule;  //intitulé
                    $details_marche->delai =  $this->request->data['nouveauDelai'] ;  
                    $details_marche->montant = $this->request->data['nouveauMontant'];   
                    $this->Avenants->Marches->DetailsMarches->save($details_marche);
                } 
                $this->Flash->success(__('The {0} has been saved.', 'Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Avenant'));
            }
        }
        $detailsMarches = $this->Avenants->Marches->DetailsMarches->find('list')
                               ->select()
                               ->where('id = (select id from details_marches d1 where id = id order by d1.id DESC limit 1)');
        $this->set(compact('avenant', 'detailsMarches'));
        $this->set('_serialize', ['avenant']);
    }

    public function deleteLots ($lots = null){
        foreach ($lots as $lot) {
            $this->Avenants->Marches->Devis->Lots->delete($lot); 
        }
    }

    public function deleteParties ($Parties = null){
        foreach ($Parties as $partie) {
            $this->Avenants->Marches->Devis->Lots->Parties->delete($partie); 
        }
    }

    public function deleteArticles ($Articles = null){
        foreach ($Articles as $article) {
            $this->Avenants->Marches->Devis->Lots->Parties->Articles->delete($article);                  
        }
    }

    public function addLots ($lots = null, $iddevi= null){
        foreach ($lots as $lot) {
            $l = $this->Avenants->Devis->Lots->newEntity();
            $l->devi_id = $iddevi;  
            $l->numero = $lot['numero']; 
            $l->intitule = $lot['intitule']; 
            $this->Avenants->Marches->Devis->Lots->save($l);
            $this->addParties($lot['Parties'], $l->id); 
        }
    }

    public function addParties ($Parties = null, $id = null){
        foreach ($Parties as $partie) {
            $p = $this->Avenants->Marches->Devis->Lots->Parties->newEntity();
            $p->lot_id = $id; 
            $p->numero = $partie['numero']; 
            $p->libelle = $partie['libelle']; 
            $this->Avenants->Marches->Devis->Lots->Parties->save($p);
            $this->addArticles($partie['Articles'], $p->id);
        }
    }

    public function addArticles ($Articles = null, $id = null){
        foreach ($Articles as $article) {
            $a = $this->Avenants->Marches->Devis->Lots->Parties->Articles->newEntity();
            $a->partie_id = $id; 
            $a->numero = $article['numero']; 
            $a->libelle = $article['libelle']; 
            $this->Avenants->Marches->Devis->Lots->Parties->Articles->save($a);
            $a_d = $this->Avenants->Marches->Devis->Lots->Parties
                        ->Articles->DetailsArticle->newEntity();
            $a_d->article_id = $a->id; 
            $a_d->qte = $article['qte']; 
            $a_d->prix = $article['prix']; 
            $a_d->unite_id = $article['unite_id'];
            $this->Avenants->Marches->Devis->Lots->Parties
                 ->Articles->DetailsArticle->save($a_d);
        }
    }

    public function updateLots ($newlots = null, $oldlots = null){
        $oldlot = array();
        foreach ($newlots as $lot) {
            foreach ($oldlots as $l) {
                if($l['id'] == $lot['id']){
                    $oldlot = $l;
                    break; 
                }
            }  
            $lot1 = $this->Avenants->Marches->Devis->Lots->newEntity();
            $lot1 = $this->Avenants->Marches->Devis->Lots->patchEntity($lot1, $lot); 
            $lot1['id'] = $lot['id']; 
            if ($oldlot['numero'] != $lot['numero'] || $oldlot['intitule'] != $lot['intitule'])
                $this->Avenants->Marches->Devis->Lots->save($lot1);
            $addedParties = array_filter($lot['Parties'], function($obj){
                if (Empty($obj['id'])) {
                    return true; 
                }
                return false;
            });
            $deletedParties = array_filter($oldlot['parties'],function($obj) use ($lot){
                    if (!Empty($obj['id'])) {
                        foreach ($lot['Parties'] as $details) {
                            if($obj['id'] == $details['id'])
                                return false; 
                        }
                    }
                    return true;
                });  
            $remainingParties = array_filter($lot['Parties'], function($obj) use ($oldlot){
                    if (!Empty($obj['id'])) {
                        foreach ($oldlot['parties'] as $details) {
                            if($obj['id'] == $details['id'])
                                return true; 
                        }
                    }
                    return false;
                });
            $this->deleteParties($deletedParties);
            $this->addParties($addedParties, $lot['id']);
            $this->updateParties($remainingParties, $oldlot['parties']);
        }
    }

    public function updateParties ($newParties = null, $oldParties = null){
        $oldpartie = array();
        foreach ($newParties as $partie) {
            foreach ($oldParties as $p) {
                if($p['id'] == $partie['id']){
                    $oldpartie = $p;   
                    break; 
                }
            }
            $partie1 = $this->Avenants->Marches->Devis->Lots->Parties->newEntity();
            $partie1 = $this->Avenants->Marches->Devis->Lots->Parties->patchEntity($partie1, $partie); 
            $partie1['id'] = $partie['id']; 
            if ($oldpartie['numero'] != $partie['numero'] 
                || $oldpartie['libelle'] != $partie['libelle'])
                $this->Avenants->Marches->Devis->Lots->Parties->save($partie1);
            $addedArticles = array_filter($partie['Articles'], function($obj){
                if (Empty($obj['id'])) {
                    return true; 
                }
                return false;
            });
            $deletedArticles = array_filter($oldpartie['articles'], function($obj) use ($partie){
                    if (!Empty($obj['id'])) {
                        foreach ($partie['Articles'] as $details) {
                            if($obj['id'] == $details['id'])
                                return false; 
                        }
                    }
                    return true;
                });  
            $remainingArticles = array_filter($partie['Articles'], function($obj) use ($oldpartie) {
                    if (!Empty($obj['id'])) {
                        foreach ($oldpartie['articles'] as $details) {
                            if($obj['id'] == $details['id'])
                                return true; 
                        }
                    }
                    return false;
                }); 
            $this->deleteArticles($deletedArticles);
            $this->addArticles($addedArticles, $partie['id']);
            $this->updateArticle($remainingArticles, $oldpartie['articles']);
        }
    }

    public function updateArticle($newArticles = null, $oldArticles = null){
        $oldarticle = array();
        foreach ($newArticles as $article) {
            foreach ($oldArticles as $a) {
                if($a['id'] == $article['id']){
                    $oldarticle = $a; 
                    break; 
                }
            }
            $article1 = $this->Avenants->Marches->Devis->Lots->Parties->Articles->newEntity();
            $article1 = $this->Avenants->Marches->Devis->Lots->Parties->Articles->patchEntity($article1, $article); 
            $article1['id'] = $article['id']; 
            if ($oldarticle['numero'] != $article['numero'] || $oldarticle['libelle'] != $article['libelle'])
                $this->Avenants->Marches->Devis->Lots->Parties->Articles->save($article1);

            $oldDetailsArticle = end($oldarticle->details_article);

            $detailsarticle1 = $this->Avenants->Marches->Devis->Lots->Parties
                                    ->Articles->DetailsArticle
                                    ->newEntity();
            $detailsarticle1 = $this->Avenants->Marches->Devis->Lots->Parties
                                    ->Articles->DetailsArticle
                                    ->patchEntity($detailsarticle1, $article); 
            $detailsarticle1['id'] = $oldDetailsArticle['id']; 

            if ($article['unite_id']!= $oldDetailsArticle['unite_id'] ||
                $article['qte'] != $oldDetailsArticle['qte'] ||
                $article['prix'] != $oldDetailsArticle['prix']  )
                    $this->Avenants->Marches->Devis->Lots->Parties
                         ->Articles->DetailsArticle
                         ->save($detailsarticle1);
        }
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
     * @param string|null $id Avenant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $avenant = $this->Avenants->get($id, [
            'contain' => ['Marches', 'Marches.detailsMarches']
        ]);
        $iddevis = $this->Avenants->Devis->find()->select()->where('avenant_id = '.$avenant->id)->first()->id; 
        $devi = $this->Avenants->Devis->get($iddevis, [
            'contain' => ['Lots'=> [
                'sort' => ['Lots.id' => 'ASC']
            ], 'Lots.Parties'=> [
                'sort' => ['Parties.id' => 'ASC']
            ], 'Lots.Parties.Articles'=> [
                'sort' => ['Articles.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle'=> [
                'sort' => ['DetailsArticle.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle.Unites'
        ]]); 
        $details = $this->Avenants->Marches->DetailsMarches->find()->
                        select()->where('DetailsMarches.avenant_id = '.$avenant->id.' order by id DESC')->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('dateavenant');
            $addedLots = array_filter($this->request->data['Lots'], function($obj){
                    
                    if (Empty($obj['id'])) {
                        return true; 
                    }
                    return false;
                });
            $deletedLots = array_filter($devi->lots, function($obj){
                    if (!Empty($obj['id'])) {
                        foreach ($this->request->data['Lots'] as $details) {
                            if($obj['id'] == $details['id'])
                                return false; 
                        }
                    }
                    return true;
                }); 
            $remainingLots = array_filter($devi->lots, function($obj){
                    if (!Empty($obj['id'])) {
                        foreach ($this->request->data['Lots'] as $details) {
                            if($obj['id'] == $details['id'])
                                return true; 
                        }
                    }
                    return false;
                });
            $avenant = $this->Avenants->patchEntity($avenant, $this->request->data);
             /******************************* sauvgarde de document  ****************************/
             $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Avenants'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Avenants';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle="Avenants-".$this->request->data['numero'];
                                if ($this->Documents->save($Documents)){
                                    $tags="Avenants";
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
                                      $avenant->document_id=$Documents->id;
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

            /********************************************************/

            if ($this->Avenants->save($avenant)) {
                $this->deleteLots($deletedLots);
                $this->addLots($addedLots, $devi->id);
                $this->updateLots($this->request->data['Lots'], $remainingLots);
                $this->Flash->success(__('The {0} has been saved.', 'Avenant'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Avenant'));
            }
        }
        $detailsMarches = $this->Avenants->Marches->DetailsMarches->find('list')
                                                ->select()
                                                ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $unites= $this->Avenants->LotsAvenants->PartiesAvenants
                      ->ArticlesAvenants->DetailsArticlesAvenants->unites->find('list'); 
        $this->set(compact('avenant', 'detailsMarches', 'details', 'unites', 'devi'));
        $this->set('_serialize', ['avenant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Avenant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $avenant = $this->Avenants->get($id);
        if ($this->Avenants->delete($avenant)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Avenant'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Avenant'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
