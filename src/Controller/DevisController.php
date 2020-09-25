<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Devis Controller
 *
 * @property \App\Model\Table\DevisTable $Devis
 *
 * @method \App\Model\Entity\Devi[] paginate($object = null, array $settings = [])
 */
class DevisController extends AppController
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
                $devis = $this->Devis->find()->innerJoinWith('Marches')->innerJoinWith('Marches.DetailsMarches')->select()->where('DetailsMarches.intitule LIKE "%'.$rech.'%" and DetailsMarches.id = (select id from details_marches M1 where id = M1.id order by M1.id DESC limit 1 )');
            } else {
                $devis = $this->Devis->find()->select()->where('Devis.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                
                 
            }
        }else{
            $devis=$this->Devis; 
        }
        
        $this->paginate = [
            'contain' => ['Marches', 'Marches.DetailsMarches','Documents']
        ];
        $devis = $this->paginate($devis);
      
        $this->set(compact('devis'));
        $this->set('_serialize', ['devis']);
    }

    /**
     * View method
     *
     * @param string|null $id Devi id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Documents');
        $devi = $this->Devis->get($id, [
            'contain' => ['Lots'=> [
                'sort' => ['Lots.id' => 'ASC']
            ], 'Lots.Parties'=> [
                'sort' => ['Parties.id' => 'ASC']
            ], 'Lots.Parties.Articles'=> [
                'sort' => ['Articles.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle'=> [
                'sort' => ['DetailsArticle.id' => 'ASC']
            ], 
            'Lots.Parties.Articles.DetailsArticle.Unites', 'Marches', 'Marches.DetailsMarches','Documents'
            ]
        ]);
        $documents = $this->Documents->find()->select()->where('Documents.id = \''.$devi['document_id'].'\'')->first();
        $this->set(compact('documents'));
        $this->set('devi', $devi);
        $this->set('_serialize', ['devi']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $devi = $this->Devis->newEntity();
        if ($this->request->is('post')) {
            $marche_id = $this->Devis->Marches->DetailsMarches->get($this->request->data['details_marche_id'])->marche_id;
            $devi = $this->Devis->patchEntity($devi, $this->request->data);
            $devi->marche_id = $marche_id;

        /******************************* sauvgarde de document  ****************************/
        $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Devis'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Devis';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle=$this->request->data['intitule'];
                                if ($this->Documents->save($Documents)){
                                    $tags="Devis";
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
                                      $devi->document_id=$Documents->id;
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
            
            if ($this->Devis->save($devi)) {
                $this->addLots($this->request->data['Lots'], $devi->id); 
                $this->Flash->success(__('The {0} has been saved.', 'Devi'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Devi'));
            }
        }
        $detailsMarches = $this->Devis->Marches->DetailsMarches->find('list')
                                                ->select()
                                                ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');

        $this->set(compact('devi', 'detailsMarches'));
        $this->set('_serialize', ['devi']);
    }

    public function listeUnite(){
        $unite = array();
        $this->loadModel('Unites'); 
        $unite = $this->Unites->find();
        $this->set('unite', $unite);
        $this->set('_serialize', ['unite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Devi id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $devi = $this->Devis->get($id, [
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
        $details = $this->Devis->Marches->DetailsMarches->find()->
                        select()->where('DetailsMarches.marche_id = '.$devi->marche_id.' order by id DESC')->first();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
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
             
            $devi = $this->Devis->patchEntity($devi, $this->request->data);
            /******************************* sauvgarde de document  ****************************/
        $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'Devis'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'Devis';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle=$this->request->data['intitule'];
                                if ($this->Documents->save($Documents)){
                                    $tags="Devis";
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
                                      $devi->document_id=$Documents->id;
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
            if ($this->Devis->save($devi)) {
                $this->deleteLots($deletedLots);
                $this->addLots($addedLots, $devi->id);
                $this->updateLots($this->request->data['Lots'], $remainingLots);
                $this->Flash->success(__('le {0} a bien été sauvegardé.', 'devis'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('le {0} n\'a pas pu être sauvegardé. Veuillez réessayer.', 'devis'));
            }
        }
        $detailsMarches = $this->Devis->Marches->DetailsMarches->find('list')
                                                ->select()
                                                ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $unites= $this->Devis->Lots->Parties->Articles->DetailsArticle->unites->find('list'); 

        $this->set(compact('devi', 'detailsMarches', 'details', 'unites'));
        $this->set('_serialize', ['devi']);
    }

    public function deleteLots ($lots = null){
        foreach ($lots as $lot) {
            $this->Devis->Lots->delete($lot); 
        }
    }

    public function deleteParties ($Parties = null){
        foreach ($Parties as $partie) {
            $this->Devis->Lots->Parties->delete($partie); 
        }
    }

    public function deleteArticles ($Articles = null){
        foreach ($Articles as $article) {
            $this->Devis->Lots->Parties->Articles->delete($article);                  
        }
    }

    public function addLots ($lots = null, $id = null){
        foreach ($lots as $lot) {
            $l = $this->Devis->Lots->newEntity();
            $l->devi_id = $id; 
            $l->numero = $lot['numero']; 
            $l->intitule = $lot['intitule']; 
            $this->Devis->Lots->save($l);
            $this->addParties($lot['Parties'], $l->id); 
        }
    }

    public function addParties ($Parties = null, $id = null){
        foreach ($Parties as $partie) {
            $p = $this->Devis->Lots->Parties->newEntity();
            $p->lot_id = $id; 
            $p->numero = $partie['numero']; 
            $p->libelle = $partie['libelle']; 
            $this->Devis->Lots->Parties->save($p);
            $this->addArticles($partie['Articles'], $p->id);
        }
    }

    public function addArticles ($Articles = null, $id = null){
        foreach ($Articles as $article) {
            $a = $this->Devis->Lots->Parties->Articles->newEntity();
            $a->partie_id = $id; 
            $a->numero = $article['numero']; 
            $a->libelle = $article['libelle']; 
            $this->Devis->Lots->Parties->Articles->save($a);
            $a_d = $this->Devis->Lots->Parties->Articles->DetailsArticle->newEntity();
            $a_d->article_id = $a->id; 
            $a_d->qte = $article['qte']; 
            $a_d->prix = $article['prix']; 
            $a_d->unite_id = $article['unite_id'];
            $this->Devis->Lots->Parties->Articles->DetailsArticle->save($a_d);
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
            $lot1 = $this->Devis->Lots->newEntity();
            $lot1 = $this->Devis->Lots->patchEntity($lot1, $lot); 
            $lot1['id'] = $lot['id']; 
            if ($oldlot['numero'] != $lot['numero'] || $oldlot['intitule'] != $lot['intitule'])
                $this->Devis->Lots->save($lot1);
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
            $partie1 = $this->Devis->Lots->Parties->newEntity();
            $partie1 = $this->Devis->Lots->Parties->patchEntity($partie1, $partie); 
            $partie1['id'] = $partie['id']; 
            if ($oldpartie['numero'] != $partie['numero'] 
                || $oldpartie['libelle'] != $partie['libelle'])
                $this->Devis->Lots->Parties->save($partie1);
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
            $article1 = $this->Devis->Lots->Parties->Articles->newEntity();
            $article1 = $this->Devis->Lots->Parties->Articles->patchEntity($article1, $article); 
            $article1['id'] = $article['id']; 
            if ($oldarticle['numero'] != $article['numero'] || $oldarticle['libelle'] != $article['libelle'])
                $this->Devis->Lots->Parties->Articles->save($article1);

            $oldDetailsArticle = end($oldarticle->details_article);

            $detailsarticle1 = $this->Devis->Lots->Parties->Articles->DetailsArticle->newEntity();
            $detailsarticle1 = $this->Devis->Lots->Parties->Articles->DetailsArticle->patchEntity($detailsarticle1, $article); 
            $detailsarticle1['id'] = $oldDetailsArticle['id']; 

            if ($article['unite_id']!= $oldDetailsArticle['unite_id'] ||
                $article['qte'] != $oldDetailsArticle['qte'] ||
                $article['prix'] != $oldDetailsArticle['prix']  )
                    $this->Devis->Lots->Parties->Articles->DetailsArticle->save($detailsarticle1);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Devi id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $devi = $this->Devis->get($id);
        if ($this->Devis->delete($devi)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Devi'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Devi'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
