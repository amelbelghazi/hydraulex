<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AttachementsTravaux Controller
 *
 * @property \App\Model\Table\AttachementsTravauxTable $AttachementsTravaux
 *
 * @method \App\Model\Entity\AttachementsTravaux[] paginate($object = null, array $settings = [])
 */
class AttachementsTravauxController extends AppController
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
            if (($this->request->data['critere']=='devi_id')) {
              $attachementsTravaux = $this->AttachementsTravaux->find()->innerJoinWith('Devis')->select()->where('Devis.intitule LIKE "%'.$rech.'%"');

            } else {
                if (($this->request->data['critere']=='dateattachement')) {
                  $time = substr($rech, 6, 4).
                            substr($rech, 2, 4).
                            substr($rech, 0, 2);
                        $rech = $time;
                  $attachementsTravaux = $this->AttachementsTravaux->find()->select()->where('AttachementsTravaux.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                
                } else {
                        $attachementsTravaux = $this->AttachementsTravaux->find()->select()->where('AttachementsTravaux.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                
                 
                }
        }else{
            $attachementsTravaux=$this->AttachementsTravaux; 
        }
        $this->paginate = [
            'contain' => ['Devis']
        ];
        $attachementsTravaux = $this->paginate($attachementsTravaux);

        $this->set(compact('attachementsTravaux'));
        $this->set('_serialize', ['attachementsTravaux']);
    }

    /**
     * View method
     *
     * @param string|null $id Attachements Travaux id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attachementsTravaux = $this->AttachementsTravaux->get($id, [
            'contain' => ['DetailsAttachements', 'Devis']
        ]);
        $devi = $this->AttachementsTravaux->Devis->get($attachementsTravaux->devi_id, [
            'contain' => ['Lots'=> [
                'sort' => ['Lots.id' => 'ASC']
            ], 'Lots.Parties'=> [
                'sort' => ['Parties.id' => 'ASC']
            ], 'Lots.Parties.Articles'=> [
                'sort' => ['Articles.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle'=> [
                'sort' => ['DetailsArticle.id' => 'ASC'] 
            ], 'Lots.Parties.Articles.DetailsArticle.DetailsAttachements'=> [
                'sort' => ['DetailsAttachements.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle.Unites']
        ]); 
        $unites= $this->AttachementsTravaux->Devis
                      ->Lots->Parties->Articles
                      ->DetailsArticle->unites->find('list'); 
        $this->set(compact('attachementsTravaux', 'unites', 'devi'));
        $this->set('_serialize', ['attachementsTravaux']);
    }

    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }

    public function getDevis ($detailsmarcheid = null){
        $idmarche = $this->AttachementsTravaux->Devis->Marches->detailsMarches->get($detailsmarcheid)->marche_id;
        $iddevis = $this->AttachementsTravaux->Devis->find()
                     ->select()->where('marche_id = '.$idmarche.' and id = (select id from devis d1 where id = id order by d1.id DESC limit 1)')->first()->id;
        $devi = $this->AttachementsTravaux->Devis->get($iddevis,  [
            'contain' => ['Lots'=> [
                'sort' => ['Lots.id' => 'ASC']
            ], 'Lots.Parties'=> [
                'sort' => ['Parties.id' => 'ASC']
            ], 'Lots.Parties.Articles'=> [
                'sort' => ['Articles.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle'=> [
                'sort' => ['DetailsArticle.id' => 'ASC'] 
            ], 'Lots.Parties.Articles.DetailsArticle.DetailsAttachements'=> [
                'sort' => ['DetailsAttachements.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle.Unites']
        ]); 

        $unites= $this->AttachementsTravaux->Devis
                      ->Lots->Parties->Articles
                      ->DetailsArticle->unites->find('list'); 
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
        $attachementsTravaux = $this->AttachementsTravaux->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('dateattachement'); 
            $attachementsTravaux = $this->AttachementsTravaux->patchEntity($attachementsTravaux, $this->request->data);
            if ($this->AttachementsTravaux->save($attachementsTravaux)) {
                foreach ($this->request->data['DetailsArticle'] as $details) {
                    $detailsTravaux = $this->AttachementsTravaux->DetailsAttachements->newEntity();
                    $detailsTravaux->Attachements_Travail_id = $attachementsTravaux->id; 
                    $detailsTravaux->details_article_id = $details['id']; 
                    $detailsTravaux->qte = $details['qtemois'];
                    $this->AttachementsTravaux->DetailsAttachements->save($detailsTravaux);
                }
                $this->Flash->success(__('The {0} has been saved.', 'Attachements Travaux'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attachements Travaux'));
            }
        }
        /*$devis = $this->AttachementsTravaux->Devis->find('list')
                               ->select()
                               ->where('id = (select id from devis d1 where id = id order by d1.id DESC limit 1)');*/
       $detailsMarches = $this->AttachementsTravaux->Devis->Marches->DetailsMarches->find('list')
                        ->select()
                        ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $this->set(compact('attachementsTravaux', 'detailsMarches'));
        $this->set('_serialize', ['attachementsTravaux']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Attachements Travaux id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attachementsTravaux = $this->AttachementsTravaux->get($id, [
            'contain' => ['DetailsAttachements']
        ]);
        $devi = $this->AttachementsTravaux->Devis->get($attachementsTravaux->devi_id, [
            'contain' => ['Lots'=> [
                'sort' => ['Lots.id' => 'ASC']
            ], 'Lots.Parties'=> [
                'sort' => ['Parties.id' => 'ASC']
            ], 'Lots.Parties.Articles'=> [
                'sort' => ['Articles.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle'=> [
                'sort' => ['DetailsArticle.id' => 'ASC'] 
            ], 'Lots.Parties.Articles.DetailsArticle.DetailsAttachements'=> [
                'sort' => ['DetailsAttachements.id' => 'ASC']
            ], 'Lots.Parties.Articles.DetailsArticle.Unites']
        ]); 
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('dateattachement'); 
            $attachementsTravaux = $this->AttachementsTravaux->patchEntity($attachementsTravaux, $this->request->data);
            if ($this->AttachementsTravaux->save($attachementsTravaux)) {
                foreach ($this->request->data['DetailsArticle'] as $details) {
                    debug($details);
                    $detailsTravaux = $this->AttachementsTravaux->DetailsAttachements->newEntity();
                    $detailsTravaux->id = $details['id'];  
                    $detailsTravaux->qte = $details['qtemois'];
                    $this->AttachementsTravaux->DetailsAttachements->save($detailsTravaux);
                }
                $this->Flash->success(__('The {0} has been saved.', 'Attachements Travaux'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Attachements Travaux'));
            }
        }
        $unites= $this->AttachementsTravaux->Devis
                      ->Lots->Parties->Articles
                      ->DetailsArticle->unites->find('list');
        $devis = $this->AttachementsTravaux->Devis->find('list')
                      ->select()
                      ->where('id = (select id from devis d1 where id = id order by d1.id DESC limit 1)');
        $this->set(compact('attachementsTravaux', 'devis', 'devi', 'unites'));
        $this->set('_serialize', ['attachementsTravaux']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Attachements Travaux id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attachementsTravaux = $this->AttachementsTravaux->get($id);
        if ($this->AttachementsTravaux->delete($attachementsTravaux)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Attachements Travaux'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Attachements Travaux'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
