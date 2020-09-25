<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parcs Controller
 *
 * @property \App\Model\Table\ParcsTable $Parcs
 *
 * @method \App\Model\Entity\Parc[] paginate($object = null, array $settings = [])
 */
class ParcsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Wilayas', 'GardiensParcs', 'ResponsablesParcs',  'ResponsablesParcs.Responsables', 'ResponsablesParcs.Responsables.Personnels', 'ResponsablesParcs.Responsables.Personnels.Personnes', 'GardiensParcs.Gardiens', 'GardiensParcs.Gardiens.Personnels', 'GardiensParcs.Gardiens.Personnels.Personnes']
        ];
        $parcs = $this->paginate($this->Parcs);

        $this->set(compact('parcs'));
        $this->set('_serialize', ['parcs']);
    }

    /**
     * View method
     *
     * @param string|null $id Parc id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parc = $this->Parcs->get($id, [
            'contain' => ['Wilayas', 'GardiensParcs', 'ResponsablesParcs',  'ResponsablesParcs.Responsables', 'ResponsablesParcs.Responsables.Personnels', 'ResponsablesParcs.Responsables.Personnels.Personnes', 'GardiensParcs.Gardiens', 'GardiensParcs.Gardiens.Personnels', 'GardiensParcs.Gardiens.Personnels.Personnes']
        ]);

        $this->set('parc', $parc);
        $this->set('_serialize', ['parc']);
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
        $parc = $this->Parcs->newEntity();
        if ($this->request->is('post')) {
            $this->toValideTime('dateexploitation'); 
            $parc = $this->Parcs->patchEntity($parc, $this->request->data);

            if ($this->Parcs->save($parc)) {
                //sauvegarder les responsables 
                foreach ($this->request->data['responsables'] as $responsable) {
                    $personnel_id = $this->Parcs->ResponsablesParcs->Responsables->Personnels
                                         ->find()
                                         ->select()
                                         ->where(' personne_id ='.$responsable)
                                         ->first()->id;
                    $responsable = $this->Parcs->ResponsablesParcs->Responsables
                                         ->find()
                                         ->select()
                                         ->where(' personnel_id = '.$personnel_id)
                                         ->first();
                    if (!isset($responsable))
                    {
                        $responsable = $this->Parcs->ResponsablesParcs->Responsables->newEntity(); 
                        $responsable->personnel_id = $personnel_id;
                        $this->Parcs->ResponsablesParcs->Responsables->save($responsable); 
                    }
                    $responsableparc = $this->Parcs->ResponsablesParcs
                                         ->find()
                                         ->select()
                                         ->where(' parc_id = '.$parc->id.' and responsable_id='.$responsable->id)
                                         ->first();
                    if (!isset($responsableparc))
                    {
                        $responsableparc = $this->Parcs->ResponsablesParcs->newEntity(); 
                        $responsableparc->parc_id = $parc->id;
                        $responsableparc->responsable_id = $responsable->id;
                        $this->Parcs->ResponsablesParcs->save($responsableparc);
                    }
                }
                //sauvegarder les gardiens
                foreach ($this->request->data['gardiens'] as $gardien) {
                    $personnel_id = $this->Parcs->GardiensParcs->Gardiens->Personnels
                                 ->find()
                                 ->select()
                                 ->where(' personne_id ='.$gardien)
                                         ->first()->id;
                    $gardien = $this->Parcs->GardiensParcs->Gardiens
                                         ->find()
                                         ->select()
                                         ->where(' personnel_id = '.$personnel_id)
                                         ->first();  
                    if (!isset($gardien))
                    {
                        $gardien = $this->Parcs->GardiensParcs->Gardiens->newEntity(); 
                        $gardien->personnel_id = $personnel_id;
                        $this->Parcs->GardiensParcs->Gardiens->save($gardien); 
                    } 
                    $gardienparc = $this->Parcs->GardiensParcs
                                         ->find()
                                         ->select()
                                         ->where(' parc_id = '.$parc->id.' and gardien_id='.$gardien->id)
                                         ->first(); 
                    if (!isset($gardienparc))
                    {                     
                        $gardienparc = $this->Parcs->GardiensParcs->newEntity(); 
                        $gardienparc->parc_id = $parc->id;
                        $gardienparc->gardien_id = $gardien->id;
                        $this->Parcs->GardiensParcs->save($gardienparc);
                    }
                }
                $this->Flash->success(__('The {0} has been saved.', 'Parc'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Parc'));
            }
        }
        $wilayas = $this->Parcs->Wilayas->find('list', ['limit' => 200]);
        /*$responsables = $this->Parcs->Responsables->find('list', ['limit' => 200]);
        $gardiens = $this->Parcs->Gardiens->find('list', ['limit' => 200]);*/
        $personnes = $this->Parcs->ResponsablesParcs->Responsables->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $this->set(compact('parc', 'wilayas', 'personnes'));
        $this->set('_serialize', ['parc']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parc id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parc = $this->Parcs->get($id, [
            'contain' => ['ResponsablesParcs.Responsables', 'ResponsablesParcs.Responsables.Personnels', 'ResponsablesParcs', 'GardiensParcs', 'GardiensParcs.Gardiens', 'GardiensParcs.Gardiens.Personnels']
        ]);
        $responsablestab = array();
        $gardienstab = array();
        $responsables = $this->Parcs->ResponsablesParcs->Responsables->Personnels
                             ->find()
                             ->select('personne_id')
                             ->innerJoinWith('Responsables.ResponsablesParcs')
                             ->where('parc_id = '.$parc->id); 
        foreach ($responsables as $key => $value) {
            $responsablestab[$key] = $value['personne_id'];
        }
        $gardiens = $this->Parcs->GardiensParcs->Gardiens->Personnels
                         ->find()
                         ->select('personne_id')
                         ->innerJoinWith('Gardiens.GardiensParcs')
                         ->where('parc_id = '.$parc->id); 
        foreach ($gardiens as $key => $value) {
            $gardienstab[$key] = $value->personne_id;
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->toValideTime('dateexploitation'); 
            $parc = $this->Parcs->patchEntity($parc, $this->request->data);
            if ($this->Parcs->save($parc)) {
                //responsables
                $deleted = array_filter($parc->responsables_parcs, function($obj){
                        $personne_id = $obj['responsable']['personnel']['personne_id']; 
                        if (!Empty($this->request->data['responsables'])) {
                            foreach ($this->request->data['responsables'] as $details) {
                                if($personne_id == $details)
                                    return false; 
                            }
                        }
                        return true;
                });
                if (!Empty($this->request->data['responsables'])) 
                    $added = array_filter($this->request->data['responsables'] , function($obj) use ($parc){
                            if (!Empty($obj)) {
                                foreach ($parc->responsables_parcs as $details) {
                                    $personne_id = $details['personnel']['personne_id']; 
                                    if($obj == $personne_id)
                                        return false; 
                                }
                            }
                            return true;
                    });
                else 
                    $added = array();

                foreach ($deleted as $responsable) { 
                    $this->Parcs->ResponsablesParcs->delete($responsable); 
                }

                foreach ($added as $responsable) {
                    $personnel_id = $this->Parcs->ResponsablesParcs->Responsables->Personnels
                                         ->find()
                                         ->select()
                                         ->where(' personne_id ='.$responsable)
                                         ->first()->id;
                    $responsable = $this->Parcs->ResponsablesParcs->Responsables
                                         ->find()
                                         ->select()
                                         ->where(' personnel_id = '.$personnel_id)
                                         ->first();
                    if (!isset($responsable))
                    {
                        $responsable = $this->Parcs->ResponsablesParcs->Responsables->newEntity(); 
                        $responsable->personnel_id = $personnel_id;
                        $this->Parcs->ResponsablesParcs->Responsables->save($responsable); 
                    }
                    $responsableparc = $this->Parcs->ResponsablesParcs
                                         ->find()
                                         ->select()
                                         ->where(' parc_id = '.$parc->id.' and responsable_id='.$responsable->id)
                                         ->first();
                    if (!isset($responsableparc))
                    {
                        $responsableparc = $this->Parcs->ResponsablesParcs->newEntity(); 
                        $responsableparc->parc_id = $parc->id;
                        $responsableparc->responsable_id = $responsable->id;
                        $this->Parcs->ResponsablesParcs->save($responsableparc);
                    }
                }
                //gardien
                $deleted = array_filter($parc->gardiens_parcs, function($obj){
                        $personne_id = $obj['gardien']['personnel']['personne_id']; 
                        if (!Empty($this->request->data['gardiens'])) {
                            foreach ($this->request->data['gardiens'] as $details) {
                                if($personne_id == $details)
                                    return false; 
                            }
                        }
                        return true;
                });
                if (!Empty($this->request->data['gardiens'])) 
                    $added = array_filter($this->request->data['gardiens'] , function($obj) use ($parc){
                            if (!Empty($obj)) {
                                foreach ($parc->gardiens_parcs as $details) {
                                    $personne_id = $details['personnel']['personne_id']; 
                                    if($obj == $personne_id)
                                        return false; 
                                }
                            }
                            return true;
                    });
                else 
                    $added = array(); 

                foreach ($deleted as $gardien) { 
                    $this->Parcs->GardiensParcs->delete($gardien); 
                }

                foreach ($added as $gardien) {
                    $personnel_id = $this->Parcs->GardiensParcs->Gardiens->Personnels
                                 ->find()
                                 ->select()
                                 ->where(' personne_id ='.$gardien)
                                         ->first()->id;
                    $gardien = $this->Parcs->GardiensParcs->Gardiens
                                         ->find()
                                         ->select()
                                         ->where(' personnel_id = '.$personnel_id)
                                         ->first();  
                    if (!isset($gardien))
                    {
                        $gardien = $this->Parcs->GardiensParcs->Gardiens->newEntity(); 
                        $gardien->personnel_id = $personnel_id;
                        $this->Parcs->GardiensParcs->Gardiens->save($gardien); 
                    }
                    $gardienparc = $this->Parcs->GardiensParcs
                                         ->find()
                                         ->select()
                                         ->where(' parc_id = '.$parc->id.' and gardien_id='.$gardien->id)
                                         ->first(); 
                    if (!isset($gardienparc))
                    {                     
                        $gardienparc = $this->Parcs->GardiensParcs->newEntity(); 
                        $gardienparc->parc_id = $parc->id;
                        $gardienparc->gardien_id = $gardien->id;
                        $this->Parcs->GardiensParcs->save($gardienparc);
                    }
                }
                $this->Flash->success(__('The {0} has been saved.', 'Parc'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Parc'));
            }
        }
        $personnes = $this->Parcs->ResponsablesParcs->Responsables->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $wilayas = $this->Parcs->Wilayas->find('list', ['limit' => 200]);
        /*$responsables = $this->Parcs->Responsables->find('list', ['limit' => 200]);
        $gardiens = $this->Parcs->Gardiens->find('list', ['limit' => 200]);*/
        $this->set(compact('parc', 'wilayas', 'personnes', 'gardienstab', 'responsablestab'));
        $this->set('_serialize', ['parc']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parc id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parc = $this->Parcs->get($id);
        if ($this->Parcs->delete($parc)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Parc'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Parc'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
