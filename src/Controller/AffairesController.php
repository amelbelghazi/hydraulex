<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Affaires Controller
 *
 * @property \App\Model\Table\AffairesTable $Affaires
 *
 * @method \App\Model\Entity\Affaire[] paginate($object = null, array $settings = [])
 */
class AffairesController extends AppController
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
            if (($this->request->data['critere']=='dateaffaire')) {
                $time = substr($rech, 6, 4).
                        substr($rech, 2, 4).
                        substr($rech, 0, 2);
                $rech = $time;
                $affaires = $this->Affaires->find()->select()->where('Affaires.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
            }else{
                if (($this->request->data['critere']=='datecommission')) {
                    $time = substr($rech, 6, 4).
                        substr($rech, 2, 4).
                        substr($rech, 0, 2);
                    $rech = $time;
                    $affaires = $this->Affaires->find()->innerJoinWith('commissions')->select()->where('datecommission  LIKE "%'.$rech.'%" and Commissions.id = ( select id from commissions c1 where id=c1.id order by c1.id DESC limit 1  )');
                } else {
                    if (($this->request->data['critere']=='categories_affaire_id')) {

                        $affaires = $this->Affaires->find()->innerJoinWith('categoriesaffaires')->select()->where('categoriesaffaires.libelle LIKE "%'.$rech.'%"');
                    } else {
                        if (($this->request->data['critere']=='maitres_ouvrage_id')) {
                             $affaires = $this->Affaires->find()->innerJoinWith('MaitresOuvrages')->select()->where('MaitresOuvrages.nom LIKE "%'.$rech.'%"');
                         } else {
                            if (($this->request->data['critere']=='wilaya_id')) {
                                 $affaires = $this->Affaires->find()->innerJoinWith('Wilayas')->select()->where('Wilayas.nom LIKE "%'.$rech.'%"');
                             } else {
                                if (($this->request->data['critere']=='types_affaire_id')) {
                                     $affaires = $this->Affaires->find()->innerJoinWith('TypesAffaires')->select()->where('TypesAffaires.libelle LIKE "%'.$rech.'%"');
                                 } else {
                                    if (($this->request->data['critere']=='etats_affaire_id')) {
                                          $affaires = $this->Affaires->find()->innerJoinWith('EtatsAffaires')->innerJoinWith('EtatsAffaires.Etats')->select()->where('Etats.libelle LIKE "%'.$rech.'%" and EtatsAffaires.id = (select id from etats_affaires E1 where id = E1.id order by E1.id DESC limit 1 )');
                                      } else {
                                        $affaires = $this->Affaires->find()->select()->where('Affaires.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
                                    }
                                }
                            } 
                        }
                    }
                }
            

                
            }
        }else{
            $affaires=$this->Affaires; 
        }

        
        $this->paginate = [
            'contain' => ['CategoriesAffaires', 'MaitresOuvrages', 'Wilayas', 'TypesAffaires', 'EtatsAffaires', 'EtatsAffaires.Etats', 'Commissions']
        ];
        $affaires = $this->paginate($affaires);
        $etatsAffaire =$this->Affaires->EtatsAffaires->newEntity();
        $this->set(compact('affaires', 'etatsAffaire'));
        $this->set('_serialize', ['affaires']);
    }
    
    /**
     * View method
     *
     * @param string|null $id Affaire id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commission = $this->Affaires->Commissions->newEntity();
        $affaire = $this->Affaires->get($id, [
            'contain' => ['CategoriesAffaires', 'EtatsAffaires', 'EtatsAffaires.Etats', 'MaitresOuvrages', 'Wilayas', 'Commissions', 'FraisProjets', 'FraisProjets.DetailsFraisProjets', 'Marches', 'Soumissions']
        ]);

        $this->set('affaire', $affaire);
        $this->set(compact('affaire', 'commission'));
        $this->set('_serialize', ['affaire']);
    }

    public function setEtatAffaire($id = null){
        $etatAffaire = $this->Affaires->EtatsAffaires->newEntity();
        $etatAffaire->affaire_id = $id; 
        $etat_id = $this->Affaires->EtatsAffaires->Etats->find()
                    ->select('id')->where('Etats.libelle = \'En cours\'')->first()->id;  

        $etatAffaire->etat_id = $etat_id; 
        $etatAffaire->cause = 'Création'; 
        if (!$this->Affaires->EtatsAffaires->save($etatAffaire))
            $this->Flash->error(__('L\'{0} n\'a pas été enregistré. Veuillez réessayer.', 'Etat'));
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
        $affaire = $this->Affaires->newEntity();
        $commission = $this->Affaires->Commissions->newEntity();
        $categoriesAffaire = $this->Affaires->CategoriesAffaires->newEntity();
        $maitresOuvrage = $this->Affaires->MaitresOuvrages->newEntity();
        $typesAffaire = $this->Affaires->TypesAffaires->newEntity();
        if ($this->request->is('post')) {
            if (!empty($this->request->data['datecommission']))
            {
                $this->toValideTime('datecommission');
                $this->toValideTime('dateaffaire');  
                $affaire = $this->Affaires->patchEntity($affaire, $this->request->data); 
                if ($this->Affaires->save($affaire)) {
                    $commission = $this->Affaires->Commissions->patchEntity($commission, $this->request->data); 
                    $commission->affaire_id = $affaire->id;
                    if ($this->Affaires->Commissions->save($commission)) {
                        $this->Flash->success(__('L\'{0} a bien été enregistré.', 'Affaire'));
                        $this->setEtatAffaire($affaire->id); 
                         return $this->redirect(['action' => 'index']);
                    }
                    else{
                        $this->Flash->error(__('La {0} n\'a pas été enregistré. Veuillez réessayer.', 'Commission'));
                    }
                    
                    $this->Flash->error(__('L\'{0} n\'a pas été enregistré. Veuillez réessayer.', 'Affaire'));
                }
            }
            else{
                $this->Flash->error(__('La date de la {0} ne peux pas être vide!', 'commission'));
            }
        }
        $categoriesAffaires = $this->Affaires->CategoriesAffaires->find('list', ['limit' => 200]);
        $maitresOuvrages = $this->Affaires->MaitresOuvrages->find('list', ['limit' => 200]);
        $typesAffaires = $this->Affaires->TypesAffaires->find('list', ['limit' => 200]);
        $wilayas = $this->Affaires->Wilayas->find('list', ['limit' => 200]);
        $this->set(compact('affaire', 'categoriesAffaires', 'maitresOuvrages', 'wilayas', 'maitresOuvrage', 'categoriesAffaire', 'typesAffaires', 'typesAffaire'));
        $this->set('_serialize', ['affaire']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Affaire id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriesAffaire = $this->Affaires->CategoriesAffaires->newEntity();
        $maitresOuvrage = $this->Affaires->MaitresOuvrages->newEntity();
        $affaire = $this->Affaires->get($id, [
            'contain' => ['Commissions']
        ]);
        /*$commission = $this->Affaires->Commissions->find('all', [
            'conditions' => ['Commissions.affaire_id ='=> $affaire->id ]
        ]);*/
        if ($this->request->is(['patch', 'post', 'put'])) {
            $affaire = $this->Affaires->patchEntity($affaire, $this->request->data);
            if ($this->Affaires->save($affaire)) {
                $this->Flash->success(__('The {0} has been saved.', 'Affaire'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Affaire'));
            }
        }
        $categoriesAffaires = $this->Affaires->CategoriesAffaires->find('list', ['limit' => 200]);
        $maitresOuvrages = $this->Affaires->MaitresOuvrages->find('list', ['limit' => 200]);
        $wilayas = $this->Affaires->Wilayas->find('list', ['limit' => 200]);
        $typesAffaires = $this->Affaires->TypesAffaires->find('list', ['limit' => 200]);
        $this->set(compact('affaire', 'categoriesAffaires', 'maitresOuvrages', 'wilayas', 'categoriesAffaire', 'maitresOuvrage', 'typesAffaires'));
        $this->set('_serialize', ['affaire']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Affaire id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $affaire = $this->Affaires->get($id);
        if ($this->Affaires->delete($affaire)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Affaire'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Affaire'));
        }
        return $this->redirect(['action' => 'index']);
    }

    #protected
    public function changerEtat($id = null, $operation=null)
    {
        $etatAffaire = $this->Affaires->EtatsAffaires->newEntity();
        $etatAffaire->affaire_id = $id; 
        $etat_id = $this->Affaires->EtatsAffaires->Etats->find()
                    ->select('id')->where('Etats.libelle = "'.$operation.'"')->first()->id;  

        $etatAffaire->etat_id = $etat_id; 
        $etatAffaire->cause = 'Création'; 
        if (!$this->Affaires->EtatsAffaires->save($etatAffaire))
            $this->Flash->error(__('L\'{0} n\'a pas été enregistré. Veuillez réessayer.', 'Etat'));
        return $this->redirect(['action' => 'index']);
    }
}
