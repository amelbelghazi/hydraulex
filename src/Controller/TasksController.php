<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[] paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personnes','Status','Status.TypesStatus']
        ];

       
        
        $tasks = $this->paginate($this->Tasks);
      
        /**$this->set(compact('tasks'));**/
        $this->set(compact('tasks'));
        $this->set('_serialize', ['tasks']);
    }

 

function validateDate($champ = null)
{
   $time = substr($this->request->data[$champ], 6, 4).
            substr($this->request->data[$champ], 2, 4).
            substr($this->request->data[$champ], 0, 2);
    $this->request->data[$champ] = $time; 
   }
    
    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $task = $this->Tasks->get($id,[
            'contain' => ['Personnes','Status', 'Status.TypesStatus']
        ]);

        $this->set('task', $task);
        $this->set('_serialize', ['task']);
    }  
    /**
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();

        if ($this->request->is('post')) {
            $this->ValidateDate('datedebut');
            $this->ValidateDate('datefin');

            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $status = $this->Tasks->Status->newEntity();
   
                $status->task_id = $task->id;    
                $status->types_statu_id = $this->request->data['types_statu_id'];                                         
                $this->Tasks->Status->save($status);
                $this->Flash->success(__('The {0} has been saved.', 'Task'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Task'));
            }

        }
        $personne = $this->Tasks->Personnes
                         ->find('list')
                         ->select()
                         ->where('Personnes.id in (select personne_id from Personnels)');
                         
        $status= $this->Tasks->Status->TypesStatus
                      ->find('list');

        $this->set(compact('task', 'personne' , 'status'));
        $this->set('_serialize', ['task']);

    }

        
    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Status','Status.TypesStatus']
        ]); 

        if ($this->request->is(['patch', 'post', 'put'])) {
             $this->validateDate('datedebut');
             $this->validateDate('datefin');

            
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
            
                $status = $this->Tasks->Status->newEntity();
                $status->task_id = $task->id;
                $status->types_statu_id = $this->request->data['types_statu_id'];
                $this->Tasks->Status->save($status);
                $this->Flash->success(__('The {0} has been saved.', 'Task'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Task'));
            }
        }
        
         $personne = $this->Tasks->Personnes
                         ->find('list')
                         ->select()
                         ->where('Personnes.id in (select personne_id from Personnels)');

        $status  = $this->Tasks->Status->TypesStatus
                        ->find('list');

        $this->set(compact('task', 'personne' , 'status'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Task'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Task'));
        }
        return $this->redirect(['action' => 'index']);
    }
           

public function changerStatus($id = null)
    {
        $status = $this->Tasks->Status->newEntity();
        $idtypestatus =  $this->Tasks->Status->TypesStatus->find()
                              ->select()
                              ->where('libelle = "Effectuée"')
                              ->first()->id; 
        $status->task_id = $id; 
        $status->types_statu_id = $idtypestatus; 
      
        if (!$this->Tasks->Status->save($status)){
            $this->Flash->error(__('Le {0} n\'a pas été enregistré. Veuillez réessayer.', 'Status'));
        }
        return $this->redirect(['action' => 'index']);
    }
  }  