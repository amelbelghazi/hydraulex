<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Situations Controller
 *
 * @property \App\Model\Table\SituationsTable $Situations
 *
 * @method \App\Model\Entity\Situation[] paginate($object = null, array $settings = [])
 */
class SituationsController extends AppController
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
            if (($this->request->data['critere']=='Attachements_Travail_id')) {
              $situations = $this->Situations->find()->innerJoinWith('AttachementsTravaux')->select()->where('AttachementsTravaux.intitule LIKE "%'.$rech.'%"');

            } else {
                if (($this->request->data['critere']=='datesituation')) {
                  $time = substr($rech, 6, 4).
                            substr($rech, 2, 4).
                            substr($rech, 0, 2);
                        $rech = $time;
                  $situations = $this->Situations->find()->select()->where('Situations.'.$this->request->data['critere'].'LIKE "%'.$rech.'%"');
                
                } else {
                        $situations = $this->Situations->find()->select()->where('Situations.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                    }
                
                 
                }
        }else{
            $situations=$this->Situations; 
        }
        $this->paginate = [
            'contain' => ['AttachementsTravaux']
        ];
        $situations = $this->paginate($situations);

        $this->set(compact('situations'));
        $this->set('_serialize', ['situations']);
    }

    /**
     * View method
     *
     * @param string|null $id Situation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $situation = $this->Situations->get($id, [
            'contain' => ['AttachementsTravaux', 'RemboursementsAvance', 'SituationsDetails']
        ]);

        $this->set('situation', $situation);
        $this->set('_serialize', ['situation']);
    }

    public function totalSituation($attachementid = null){
        $total = $this->Situations->AttachementsTravaux
                      ->DetailsAttachements->find('all')->select('sum(DetailsAttachements.qte * DetailsArticle.prix)')
                      ->innerJoinWith('DetailsArticle')->where('DetailsAttachements.attachements_travail_id ='. $attachementid)
                      ->first()['sum(DetailsAttachements']['qte * DetailsArticle'];
        $this->set('total', $total);
        $this->set('_serialize', ['total']);
    }

    public function toValideTime($champ = null){
        $time = substr($this->request->data[$champ], 6, 4).
                substr($this->request->data[$champ], 2, 4).
                substr($this->request->data[$champ], 0, 2);
        $this->request->data[$champ] = $time; 
    }

    public function getDevis ($attachementid = null,$alote = null, $tous = null){
        //$alote = $this->request->params['pass'][0]; 
        //$tous = $this->request->params['pass'][1]; 
        $attachementsTravaux = $this->Situations->AttachementsTravaux->get($attachementid, [
            'contain' => ['DetailsAttachements', 'Devis']
        ]);
        $devi = $this->Situations->AttachementsTravaux->Devis->get($attachementsTravaux->devi_id,  [
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

        $unites= $this->Situations->AttachementsTravaux->Devis
                      ->Lots->Parties->Articles
                      ->DetailsArticle->unites->find('list'); 
        $this->set(compact('unites', 'devi', 'attachementsTravaux', 'alote', 'tous'));
        $this->set('_serialize', ['devi']);
    }

    public function getAttachements($detailsmarche = null)
    {
        $attachements = array(); 
        $idmarche = $this->Situations->AttachementsTravaux->Devis->Marches->detailsMarches->get($detailsmarche)->marche_id;
        $attachements = $this->Situations->attachementsTravaux->find()
                            ->select()->innerJoinWith('Devis')->where('Devis.marche_id = '.$idmarche); 

        $this->set('attachements', $attachements);
        $this->set('_serialize', ['attachements']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $situation = $this->Situations->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('datesituation'); 
            $situation = $this->Situations->patchEntity($situation, $this->request->data);
            if ($this->Situations->save($situation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Situation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Situation'));
            }
        }
        $detailsMarches = $this->Situations->AttachementsTravaux->Devis->Marches->DetailsMarches->find('list')
                        ->select()
                        ->where('id = (select id from details_marches d1 where id = d1.id order by d1.id DESC limit 1)');
        $this->set(compact('situation', 'detailsMarches'));
        $this->set('_serialize', ['situation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Situation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $situation = $this->Situations->get($id, [
            'contain' => ['AttachementsTravaux', 'AttachementsTravaux.Devis', 'AttachementsTravaux.Devis.Marches', 'AttachementsTravaux.Devis.Marches.DetailsMarches']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('datesituation'); 
            $situation = $this->Situations->patchEntity($situation, $this->request->data);
            if ($this->Situations->save($situation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Situation'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Situation'));
            }
        }
        $this->set(compact('situation', 'attachementsTravaux'));
        $this->set('_serialize', ['situation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Situation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $situation = $this->Situations->get($id);
        if ($this->Situations->delete($situation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Situation'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Situation'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
