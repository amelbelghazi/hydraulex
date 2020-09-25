<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContratsPersonnels Controller
 *
 * @property \App\Model\Table\ContratsPersonnelsTable $ContratsPersonnels
 *
 * @method \App\Model\Entity\ContratsPersonnel[] paginate($object = null, array $settings = [])
 */
class ContratsPersonnelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contrats', 'Personnels', 'Personnels.Personnes', 'Contrats.EtatsContrats', 'Contrats.EtatsContrats.TypesEtatsContrats']
        ];
        $contratsPersonnels = $this->paginate($this->ContratsPersonnels);

        $this->set(compact('contratsPersonnels'));
        $this->set('_serialize', ['contratsPersonnels']);
    }

    /**
     * View method
     *
     * @param string|null $id Contrats Personnel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contratsPersonnel = $this->ContratsPersonnels->get($id, [
            'contain' => ['Contrats', 'Personnels']
        ]);

        $this->set('contratsPersonnel', $contratsPersonnel);
        $this->set('_serialize', ['contratsPersonnel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contratsPersonnel = $this->ContratsPersonnels->newEntity();
        if ($this->request->is('post')) {
            $contratsPersonnel = $this->ContratsPersonnels->patchEntity($contratsPersonnel, $this->request->data);
            $contratdata = $this->request->data['Contrats'];
            $personnel = $this->ContratsPersonnels->Personnels
                                          ->find()
                                          ->select()
                                          ->where(' personne_id = '.$contratdata['personne_id'])
                                          ->first();
            $time = substr($contratdata['dateetablissement'], 6, 4).
                    substr($contratdata['dateetablissement'], 2, 4).
                    substr($contratdata['dateetablissement'], 0, 2);
            $contratdata['dateetablissement'] = $time; 
            $contrat = $this->ContratsPersonnels->Contrats->newEntity(); 
            $contrat = $this->ContratsPersonnels->Contrats->patchEntity($contrat, $contratdata);
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
            $this->ContratsPersonnels->Contrats->save($contrat); 
            $etatContrat = $this->ContratsPersonnels->Contrats->EtatsContrats->newEntity(); 
            $etatContrat->types_etats_contrat_id = $contratdata['types_etats_contrat_id'];
            $etatContrat->contrat_id = $contrat->id; 
            $this->ContratsPersonnels->Contrats->EtatsContrats->save($etatContrat);

            $contratsPersonnel->contrat_id = $contrat->id; 
            $contratsPersonnel->personnel_id = $personnel->id; 

            if ($this->ContratsPersonnels->save($contratsPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contrats Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contrats Personnel'));
            }
        }
        $typesEtatsContrats = $this->ContratsPersonnels->Contrats->EtatsContrats->typesEtatsContrats->find('list', ['limit' => 200]);
        $contrats = $this->ContratsPersonnels->Contrats->find('list', ['limit' => 200]);
        $personnes = $this->ContratsPersonnels->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $this->set(compact('contratsPersonnel', 'contrats', 'personnes', 'typesEtatsContrats'));
        $this->set('_serialize', ['contratsPersonnel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contrats Personnel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contratsPersonnel = $this->ContratsPersonnels->get($id, [
            'contain' => ['Contrats', 'Personnels', 'Personnels.Personnes', 'Contrats.EtatsContrats', 'Contrats.EtatsContrats.TypesEtatsContrats']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contratsPersonnel = $this->ContratsPersonnels->patchEntity($contratsPersonnel, $this->request->data);
            $contratdata = $this->request->data['Contrats'];
            $personnel = $this->ContratsPersonnels->Personnels
                                          ->find()
                                          ->select()
                                          ->where(' personne_id = '.$contratdata['personne_id'])
                                          ->first();
            $time = substr($contratdata['dateetablissement'], 6, 4).
                    substr($contratdata['dateetablissement'], 2, 4).
                    substr($contratdata['dateetablissement'], 0, 2);
            $contratdata['dateetablissement'] = $time; 
            $contrat = $this->ContratsPersonnels->Contrats->get($contratsPersonnel->contrat_id); 
            $contrat = $this->ContratsPersonnels->Contrats->patchEntity($contrat, $contratdata);
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
            $this->ContratsPersonnels->Contrats->save($contrat); 
            $etatContrat = $this->ContratsPersonnels->Contrats->EtatsContrats->newEntity(); 
            $etatContrat->types_etats_contrat_id = $contratdata['types_etats_contrat_id'];
            $etatContrat->contrat_id = $contrat->id; 
            $this->ContratsPersonnels->Contrats->EtatsContrats->save($etatContrat);

            $contratsPersonnel->personnel_id = $personnel->id; 

            if ($this->ContratsPersonnels->save($contratsPersonnel)) {
                $this->Flash->success(__('The {0} has been saved.', 'Contrats Personnel'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Contrats Personnel'));
            }
        }
        $typesEtatsContrats = $this->ContratsPersonnels->Contrats->EtatsContrats->typesEtatsContrats->find('list', ['limit' => 200]);
        $personnes = $this->ContratsPersonnels->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $contrats = $this->ContratsPersonnels->Contrats->find('list', ['limit' => 200]);
        $personnels = $this->ContratsPersonnels->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('contratsPersonnel', 'contrats', 'personnels', 'typesEtatsContrats', 'personnes'));
        $this->set('_serialize', ['contratsPersonnel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contrats Personnel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contratsPersonnel = $this->ContratsPersonnels->get($id);
        if ($this->ContratsPersonnels->delete($contratsPersonnel)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Contrats Personnel'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Contrats Personnel'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
