<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 *
 * @method \App\Model\Entity\Document[] paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
{
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {  
        $this->paginate = [
            'contain' => ['Tags']
        ];
        
        if($this->request->data){
            $rech = $this->request->data['search'];
            if ($this->request->data['critere']=='Tags') {
                $documents = $this->Documents->find();
                $documents->matching('Tags', function ($q) use ($rech) {
                return $q->where(['Tags.libelle LIKE "%'.$rech.'%"']);
                });
            } else{
                $documents = $this->Documents->find()->select()->where('Documents.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
            }
        }else{
            $documents=$this->Documents; 
        }
        $documents = $this->paginate($documents);
        $this->set(compact('documents'));
        $this->set('_serialize', ['documents']);
       //debug($this->request->data);
    }

 
    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => ['Tags', 'PiecesIdentites']
        ]);
        $this->loadModel('DocumentsTags');
        $this->loadModel('Tags');
                               

        $tags = $this->Tags->find()
                ->select()->innerJoinWith('DocumentsTags')
                ->where('DocumentsTags.document_id = '.$id);

        $this->set(compact('tags'));
        $this->set('document', $document);
        $this->set('_serialize', ['document']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $this->loadModel('DocumentsTags');
        $document = $this->Documents->newEntity();


        if ($this->request->is('post')) {
            //*********************************************
           //debug($this->request->data);die();

            if (!empty($this->request->data['document']['tmp_name'])) {

                $extension = strtolower(pathinfo($this->request->data['document']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['document']['size'];
                    if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc'))) {
                        $file = $this->request->data['libelle'].'.'. $extension;
                        $path = WWW_ROOT . 'img' . DS . 'Documents';
                            if (move_uploaded_file($this->request->data['document']['tmp_name'], $path . DS . $file)) {
                                $this->request->data['document'] = $file;
                            }else{
                                $this->Flash->error(__('4 The {0} could not be saved. Please, try again.', 'documents'));
                            }
                    }else{
                            $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer. 
                        Les fichiers autoriser sont " .jpg, .png, .jpeg,.pdf,.gif,.docx,.doc"', 'documents'));
                    }
            }
                $document = $this->Documents->patchEntity($document, $this->request->data);
                    if ($this->Documents->save($document)){
                        $tags=explode(',', $this->request->data['tags_list']);
                            foreach ($tags as $tag_1) {
                                $tag1=trim($tag_1);
                                    if (!empty($tag1)) {
                                        $tag = $this->Documents->Tags->find()->select()->where('Tags.libelle = \''.$tag1.'\'')->first();
                                        if (!isset($tag)) {
                                            $tag = $this->Documents->Tags->newEntity();
                                            $tag->libelle= $tag1;
                                            $this->Documents->Tags->save($tag);
                                        }
                                        $documentstag = $this->DocumentsTags->newEntity();
                                        $documentstag->document_id=$document->id;
                                        $documentstag->tag_id=$tag->id;
                                        $this->Documents->DocumentsTags->save($documentstag);
                                    }
                            }//endforeach
                        $this->Flash->success(__('Le {0} a été enregistré.', 'documents '));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer', 'documents'));
                    }
        }
        $tags = $this->Documents->Tags->find('list', ['limit' => 200]);
        $this->set(compact('document', 'tags'));
        $this->set('_serialize', ['document']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => ['Tags']
        ]);

        $this->loadModel('DocumentsTags');
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            $document = $this->Documents->patchEntity($document, $this->request->data);
                    if ($this->Documents->save($document)){
                        $tags=explode(',', $this->request->data['tags_list']);
                            foreach ($tags as $tag_1) {
                                $tag1=trim($tag_1);
                                    if (!empty($tag1)) {
                                        $tag = $this->Documents->Tags->find()->select('id')->where('Tags.libelle = \''.$tag1.'\'')->first();
                                        if (!isset($tag)) {
                                            $tag = $this->Documents->Tags->newEntity();
                                            $tag->libelle= $tag1;
                                            $this->Documents->Tags->save($tag);
                                        }

                                        $tags_id=$tag->id;
                                        
                                        $documentstag=$this->DocumentsTags->find()->select()->where('DocumentsTags.document_id = \''.$id.'\' AND DocumentsTags.tag_id = \''.$tags_id.'\'')->first();

                                       if (empty($documentstag)) {
                                        $documentstag = $this->DocumentsTags->newEntity();
                                        $documentstag->document_id=$document->id;
                                        $documentstag->tag_id=$tag->id;
                                        $documentstag->tag_libelle=$tag->libelle;
                                        $this->Documents->DocumentsTags->save($documentstag);
                                       }

                                    }
                            }//endforeach
                        $this->Flash->success(__('Le {0} a été enregistré.', 'documents '));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer', 'documents'));
                    }
        }
        $tags = $this->Documents->Tags->find('list', ['limit' => 200]);
        $this->set(compact('document', 'tags'));
        $this->set('_serialize', ['document']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Document'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Document'));
        }
        return $this->redirect(['action' => 'index']);
    }


}
