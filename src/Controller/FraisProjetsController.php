<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FraisProjets Controller
 *
 * @property \App\Model\Table\FraisProjetsTable $FraisProjets
 *
 * @method \App\Model\Entity\FraisProjet[] paginate($object = null, array $settings = [])
 */
class FraisProjetsController extends AppController
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
                $fraisProjets = $this->FraisProjets->find()->innerJoinWith('Affaires')->select()->where('Affaires.intitule LIKE "%'.$rech.'%"');
            } else {
                if (($this->request->data['critere']=='datefrais')) {
                    $time = substr($rech, 6, 4).
                            substr($rech, 2, 4).
                            substr($rech, 0, 2);
                    $rech = $time;
                    $fraisProjets = $this->FraisProjets->find()->select()->where('FraisProjets.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                }
            }
        }else{
            $fraisProjets=$this->FraisProjets; 
        }
        $this->paginate = [
            'contain' => ['Affaires', 'DetailsFraisProjets']
        ];
        $fraisProjets = $this->paginate($fraisProjets);

        $this->set(compact('fraisProjets'));
        $this->set('_serialize', ['fraisProjets']);
    }

    /**
     * View method
     *
     * @param string|null $id Frais Projet id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fraisProjet = $this->FraisProjets->get($id, [
            'contain' => ['Affaires', 'DetailsFraisProjets','Documents']
        ]);

        $this->loadModel('Documents');
        $documents = $this->Documents->find()->select()->where('Documents.id = \''.$fraisProjet['document_id'].'\'')->first();
        $this->set(compact('documents'));

        $this->set('fraisProjet', $fraisProjet);
        $this->set('_serialize', ['fraisProjet']);
    }

    public function listTypesFrais(){
        $typesFrais = $this->FraisProjets->DetailsFraisProjets->TypesFrais->find('list', ['limit' => 200]);

        $this->set(compact('$typesFrais'));
        $this->set('_serialize', '$typesFrais');
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
        $fraisProjet = $this->FraisProjets->newEntity();
        $detailsFraisProjet = $this->FraisProjets->DetailsFraisProjets->newEntity();
        $typesFrai = $this->FraisProjets->DetailsFraisProjets->TypesFrais->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datefrais'); 
           $fraisProjet = $this->FraisProjets->patchEntity($fraisProjet, $this->request->data);
           /******************************* sauvgarde de document  ****************************/
        $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'FraisProjets'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'FraisProjets';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle='FraisProjets-'.$this->request->data['affaire_id'];
                                if ($this->Documents->save($Documents)){
                                    $tags="FraisProjets";
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
                                      $fraisProjet->document_id=$Documents->id;
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
           //debug($this->request->data['DetailsFraisProjets']); die(); 
            if ($this->FraisProjets->save($fraisProjet)) {
                //$detailsFraisProjets = $this->request->data['DetailsFraisProjets'];
                foreach ($this->request->data['DetailsFraisProjets'] as $details) {
                    $detailsFraisProjet = $this->FraisProjets->DetailsFraisProjets->newEntity();
                    $detailsFraisProjet->frais_projet_id = $fraisProjet->id; 
                    $detailsFraisProjet->montant = $details['montant']; 
                    $detailsFraisProjet->observation = $details['observation']; 
                    $detailsFraisProjet->types_frais_id = $details['types_frais_id']; 
                    $this->FraisProjets->DetailsFraisProjets->save($detailsFraisProjet);
                } 
                $this->Flash->success(__('The {0} has been saved.', 'Frais Projet'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Frais Projet'));
            }
        }
        $typesFrais = $this->FraisProjets->DetailsFraisProjets->TypesFrais->find('list', ['limit' => 200]);
        $affaires = $this->FraisProjets->Affaires->find('list', ['limit' => 200]);
        $this->set(compact('fraisProjet', 'typesFrais', 'affaires', 'typesFrai'));
        $this->set('_serialize', ['fraisProjet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Frais Projet id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $fraisProjet = $this->FraisProjets->get($id, [
            'contain' => ['DetailsFraisProjets']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datefrais'); 
            $added = array_filter($this->request->data['DetailsFraisProjets'], function($obj){
                    
                    if (Empty($obj['id'])) {
                        return true; 
                    }
                    return false;
                });
            $deleted = array_filter($fraisProjet->details_frais_projets, function($obj){
                    if (!Empty($obj['id'])) {
                        foreach ($this->request->data['DetailsFraisProjets'] as $details) {
                            if($obj['id'] == $details['id'])
                                return false; 
                        }
                    }
                    return true;
                }); 
            $modified = array_filter($this->request->data['DetailsFraisProjets'], function($obj) use ($fraisProjet){
                    if(!Empty($obj['id'])){
                        foreach ($fraisProjet->details_frais_projets as $details) {
                            if($obj['id'] == $details['id'])
                            {
                                if (($obj['types_frais_id'] != $details['types_frais_id']) ||
                                    ($obj['montant'] != $details['montant']) ||
                                    ($obj['observation'] != $details['observation']) )
                                    return true;
                            }  
                        }
                        return false; 
                    }
                    return false; 
                });
            $fraisProjet = $this->FraisProjets->patchEntity($fraisProjet, $this->request->data);

            
            /******************************* sauvgarde de document  ****************************/
        $this->loadModel('Documents');
        $this->loadModel('DocumentsTags');
          $Documents = $this->Documents->newEntity(); 
           if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];

                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc', 'xls', 'xlsx','txt'))) {
                        $file = 'FraisProjets'.time().'.'. $extension;
                        $path = WWW_ROOT . 'files' . DS . 'FraisProjets';

                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;

                                $Documents = $this->Documents->patchEntity($Documents, $this->request->data);

                                $Documents->libelle='FraisProjets-'.$this->request->data['affaire_id'];
                                if ($this->Documents->save($Documents)){
                                    $tags="FraisProjets";
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
                                      $fraisProjet->document_id=$Documents->id;
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
            if ($this->FraisProjets->save($fraisProjet)) {
                $this->deleteDetails($deleted);
                $this->addDetails($added, $fraisProjet->id);  
                $this->modifyDetails($modified); 
                $this->Flash->success(__('The {0} has been saved.', 'Frais Projet'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Frais Projet'));
            }
        }
        $typesFrais = $this->FraisProjets->DetailsFraisProjets->TypesFrais->find('list', ['limit' => 200]);
        $affaires = $this->FraisProjets->Affaires->find('list', ['limit' => 200]);
        $this->set(compact('fraisProjet', 'typesFrais', 'affaires'));
        $this->set('_serialize', ['fraisProjet']);
    }

    public function deleteDetails($deleted)
    {
        foreach ($deleted as $details) {
            $this->FraisProjets->DetailsFraisProjets->delete($details);
        }
    }

    public function modifyDetails($modified)
    {
        foreach ($modified as $details) {
            $frai = $this->FraisProjets->DetailsFraisProjets->newEntity(); 
            $frai = $this->FraisProjets->DetailsFraisProjets->patchEntity($frai, $details);
            $frai->id = $details->id; 
            $this->FraisProjets->DetailsFraisProjets->save($details);
        }
    }

    public function addDetails($added, $frais_projet_id)
    {
        foreach ($added as $details) {
            $frai = $this->FraisProjets->DetailsFraisProjets->newEntity(); 
            $frai = $this->FraisProjets->DetailsFraisProjets->patchEntity($frai, $details);
            $frai->frais_projet_id = $frais_projet_id; 
            $this->FraisProjets->DetailsFraisProjets->save($frai);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Frais Projet id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fraisProjet = $this->FraisProjets->get($id);
        if ($this->FraisProjets->delete($fraisProjet)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Frais Projet'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Frais Projet'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
