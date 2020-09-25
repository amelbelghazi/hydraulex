<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
/**
 * Emails Controller
 *
 * @property \App\Model\Table\EmailsTable $Emails
 *
 * @method \App\Model\Entity\Email[] paginate($object = null, array $settings = [])
 */
class EmailsController extends AppController
{
    private $__Email;
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
            $emails = $this->Emails->find()->select()->where('Emails.'.$this->request->data['critere'].'  LIKE "%'.$rech.'%"');
        }else{
            $emails=$this->Emails; 
        }
        $emails = $this->paginate($emails);

        $this->set(compact('emails'));
        $this->set('_serialize', ['emails']);
    }

    /**
     * View method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => ['Attachements']
        ]);

        $this->set('email', $email);
        $this->set('_serialize', ['email']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    { 
        $this->loadModel('DocumentsTags'); 
        $email = $this->Emails->newEntity();
        $document = $this->Emails->Documents->newEntity();
        $tag = $this->Emails->Documents->tags->newEntity();
        $documenttag = $this->DocumentsTags->newEntity();
        if ($this->request->is('post')) {
            $email = $this->Emails->patchEntity($email, $this->request->data);
            if (!empty($this->request->data['attachment']['tmp_name'])) {
                $extension = strtolower(pathinfo($this->request->data['attachment']['name'], PATHINFO_EXTENSION));
                $filename = strtolower(pathinfo($this->request->data['attachment']['name'], PATHINFO_FILENAME));
                $size = $this->request->data['attachment']['size'];
                if (in_array($extension, array('jpg', 'png', 'jpeg','pdf','gif','docx','doc'))) {
                    $file = 'Attachements-'.time() . '.' . $extension;
                    $path = WWW_ROOT . 'files' . DS . 'Attachements';
                    if (move_uploaded_file($this->request->data['attachment']['tmp_name'], $path . DS . $file)) {
                        $this->request->data['attachment'] = $file;
                        $document->libelle = $filename ; 
                        $document->document = $file;  
                        $this->Emails->Documents->save($document);
                        $tag->libelle = 'email';
                        $this->Emails->Documents->tags->save($tag);
                        $documenttag->document_id = $document->id; 
                        $documenttag->tag_id = $tag->id;
                        $this->DocumentsTags->save($documenttag);
                        $email->document_id = $document->id;
                        
                        $this->__Email = new Email();
                        $this->__Email->transport('gmail');
                        $this->__Email->emailFormat('html');
                        $this->__Email->attachments($path . DS . $file);
                        $this->__Email->from([$email->expediteur => 'Hydraulex'])
                                      ->to($email->destinataire)
                                      ->subject($email->objet);
                        $this->__Email->send($email->message);

                        $this->set('success', 'L\'email a bien été envoyé !');
                    }else{
                        $this->Flash->error(__('4 The {0} could not be saved. Please, try again.', 'documents'));
                    }

                }else{
                        $this->Flash->error(__('Le {0} n\'a pas pu être enregistré. Veuillez réessayer. 
                    Les fichiers autoriser sont " .jpg, .png, .jpeg,.pdf,.gif,.docx,.doc"', 'documents'));
                }
            }
            $email->dateenvoi = date('Y-m-d'); 
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The {0} has been saved.', 'Email'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Email'));
            }
        }
        $this->set(compact('email'));
        $this->set('_serialize', ['email']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Email id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $email = $this->Emails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $email = $this->Emails->patchEntity($email, $this->request->data);
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The {0} has been saved.', 'Email'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Email'));
            }
        }
        $this->set(compact('email'));
        $this->set('_serialize', ['email']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Email id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $email = $this->Emails->get($id);
        if ($this->Emails->delete($email)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Email'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Email'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
