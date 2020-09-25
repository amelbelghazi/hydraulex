<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event; 

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Societes', 'Personnels']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Societes', 'Personnels', 'Personnels.Personnes']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
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
        $this->loadModel('Personnes'); 
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
           // -----------------------
            if (!empty($this->request->data['photo']['tmp_name'])) {
                $extension = strtolower(pathinfo($this->request->data['photo']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['photo']['size'];
                if (in_array($extension, array('jpg', 'png', 'jpeg', 'ico'))) {
                    $file = 'photo_profil-'.time().'.' . $extension;
                    $path = WWW_ROOT . 'img' . DS . 'users';
                    if (move_uploaded_file($this->request->data['photo']['tmp_name'], $path . DS . $file)) {
                        $this->request->data['photo'] = $file;
                        $user = $this->Users->patchEntity($user, $this->request->data);
                        $personne_id = $this->request->data['personne_id'];
                        $personnel = $this->Users->Personnels
                                          ->find()
                                          ->select()
                                          ->where(' personne_id = '.$personne_id)
                                          ->first();
                        $user->personnel_id = $personnel->id; 
                        $this->toValideTime('datedenaissance');
                        if ($this->Users->save($user)) {
                            $this->Flash->success(__('The {0} has been saved.', 'User'));
                                return $this->redirect(['action' => 'index']);
                            } 
                            else {
                                $this->Flash->error(__('4 The {0} could not be saved. Please, try again.', 'User'));
                            }

                        } else {
                            $this->Flash->error(__('3 The {0} could not be saved. Please, try again.', 'User'));
                        }
                    } else {
                        $this->Flash->error(__('2 The {0} could not be saved. Please, try again.', 'User'));
                    }
                } else {
                    $this->Flash->error(__('1 The {0} could not be saved. Please, try again.', 'User'));
                }
            }       
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $societes = $this->Users->Societes->find('list', ['limit' => 200]);
        $personnes = $this->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $this->set(compact('user', 'roles', 'societes', 'personnes'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        //debug($user);
        $personne = array();
        if($user->personnel_id != null)
            $personne = $this->Users->Personnels->Personnes->get($user->personnel_id, [
                'contain' => []
            ]);
        //debug($personnel); 
        if ($this->request->is(['patch', 'post', 'put'])) {

           // debug($this->request->data);die();

            if ($this->request->data['Modifier'] == "info") {
            $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The {0} has been saved.', 'User'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'User'));
                }
            }

            if ($this->request->data['Modifier'] == "photo") {

                 if (!empty($this->request->data['photo']['tmp_name'])) {
                $extension = strtolower(pathinfo($this->request->data['photo']['name'], PATHINFO_EXTENSION));
                $size = $this->request->data['photo']['size'];
                if (in_array($extension, array('jpg', 'png', 'jpeg', 'ico'))) {
                    $file = 'photo_profil-'.time().'.' . $extension;
                    $path = WWW_ROOT . 'img' . DS . 'users';
                    if (move_uploaded_file($this->request->data['photo']['tmp_name'], $path . DS . $file)) {

                        $this->request->data['photo'] = $file;
                       
                        $user = $this->Users->patchEntity($user, $this->request->data);
                        //debug($user);die();
                        if ($this->Users->save($user)) {
                            $this->Flash->success(__('The {0} has been saved.', 'User'));
                                return $this->redirect(['action' => 'index']);
                            } 
                            else {
                                $this->Flash->error(__('5 The {0} could not be saved. Please, try again.', 'User'));
                            }

                        } else {
                            $this->Flash->error(__('4 The {0} could not be saved. Please, try again.', 'User'));
                        }
                    } else {
                        $this->Flash->error(__('3 The {0} could not be saved. Please, try again.', 'User'));
                    }
                } else {
                    $this->Flash->error(__('2 The {0} could not be saved. Please, try again.', 'User'));
                }
            }


        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $societes = $this->Users->Societes->find('list', ['limit' => 200]);
        $personnes = $this->Users->Personnels->Personnes->find('list')->select()
                            ->where('Personnes.id in (select personne_id from Personnels)');
        $this->set(compact('user', 'roles', 'societes', 'personnes', 'personne'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The {0} has been deleted.', 'User'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'User'));
        }
        return $this->redirect(['action' => 'index']);
    }
	public function login()
    {
        if ($this->Auth->user('id')){
                $this->Flash->warning(__('Vous êtes déjà connecté.', 'User'));
                return $this->redirect(['controller'=> 'Pages', 'action' => 'display', 'home']);
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user); 
                $this->Flash->success(__('Vous êtes bien connecté.', 'User'));
                return $this->redirect(['controller'=> 'Pages', 'action' => 'display', 'home']);
            } 
            $this->Flash->error(__('Problème de connexion. Informations incorrectes', 'User'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $societes = $this->Users->Societes->find('list', ['limit' => 200]);
        $personnels = $this->Users->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'societes', 'personnels'));
        $this->set('_serialize', ['user']);
    }

    public function logout(){
        $this->Flash->success(__('Vous êtes bien déconnecté.'));  
        $this->redirect($this->Auth->logout());        
    }

    public function register()
    {
        //id($this->request->data['User']['passwordRetype'] != $this->request->data['User']['password'])
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('l\'utilisateur a bien été enregistré.'));
                return $this->redirect(['controller'=> 'Pages', 'action' => 'display', 'home']);
            } else {
                $this->Flash->error(__('L\'utilisateur n\'a pas pu être enregistré. Veuillez réessayer.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $societes = $this->Users->Societes->find('list', ['limit' => 200]);
        $personnels = $this->Users->Personnels->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'societes', 'personnels'));
        $this->set('_serialize', ['user']);
    }

    public function forgotpassword(){


    }

    public function profile ()
    {
        $auth=$this->request->session()->read('Auth');
        $user = $this->Users->get($auth['User']['id'], [
            'contain' => ['Roles', 'Societes', 'Personnels']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    
    public function beforeFilter(Event $event){ 
        $this->Auth->allow(['login', 'register', 'forgotpassword', 'logout']);
    }
}
