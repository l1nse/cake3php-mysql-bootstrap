<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CalendariosAsistentes Controller
 *
 * @property \App\Model\Table\CalendariosAsistentesTable $CalendariosAsistentes
 */
class CalendariosAsistentesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        var_dump($loadpermisos); die;
        $this->paginate = [
            'contain' => ['Reuinions', 'Users']
        ];
        $calendariosAsistentes = $this->paginate($this->CalendariosAsistentes);

        $this->set(compact('calendariosAsistentes'));
        $this->set('_serialize', ['calendariosAsistentes']);
    }

    /**
     * View method
     *
     * @param string|null $id Calendarios Asistente id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if(is_numeric($id))
        {
             $calendariosAsistente = $this->CalendariosAsistentes->get($id, [
            'contain' => ['Reuinions', 'Users']
            ]);     
        }else
        {
            return $this->redirect(['controller' => 'Users' ,'action' => 'home']);       
        }
       

        $this->set('calendariosAsistente', $calendariosAsistente);
        $this->set('_serialize', ['calendariosAsistente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $calendariosAsistente = $this->CalendariosAsistentes->newEntity();
        if ($this->request->is('post')) {
            $calendariosAsistente = $this->CalendariosAsistentes->patchEntity($calendariosAsistente, $this->request->getData());
            if ($this->CalendariosAsistentes->save($calendariosAsistente)) {
                $this->Flash->success(__('The calendarios asistente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calendarios asistente could not be saved. Please, try again.'));
        }
        $reuinions = $this->CalendariosAsistentes->Reuinions->find('list', ['limit' => 200]);
        $users = $this->CalendariosAsistentes->Users->find('list', ['limit' => 200]);
        $this->set(compact('calendariosAsistente', 'reuinions', 'users'));
        $this->set('_serialize', ['calendariosAsistente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calendarios Asistente id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if(is_numeric($id))
        {
            $calendariosAsistente = $this->CalendariosAsistentes->get($id, [
            'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $calendariosAsistente = $this->CalendariosAsistentes->patchEntity($calendariosAsistente, $this->request->getData());
                if ($this->CalendariosAsistentes->save($calendariosAsistente)) {
                    $this->Flash->success(__('The calendarios asistente has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }else
                {
                    $this->Flash->error(__('The calendarios asistente could not be saved. Please, try again.'));    
                }
                
            }
            $reuinions = $this->CalendariosAsistentes->Reuinions->find('list', ['limit' => 200]);
            $users = $this->CalendariosAsistentes->Users->find('list', ['limit' => 200]);    
        }else
        {
            return $this->redirect(['controller' => 'Users' ,'action' => 'home']);        
        }
        
        $this->set(compact('calendariosAsistente', 'reuinions', 'users'));
        $this->set('_serialize', ['calendariosAsistente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calendarios Asistente id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $idcalendario = null , $idempresa = null )
    {
        
        if(is_numeric($id) && is_numeric($idcalendario) && is_numeric($idempresa))
        {
            
            //$this->request->allowMethod(['post', 'delete']);
            $calendariosAsistente = $this->CalendariosAsistentes->get($id);

            $id_user = $this->_getUser($calendariosAsistente->user_id);
            $contador  = 0;
            

            $rs_user = $this->_getUserFull($id_user);
            $user = $rs_user->name." ".$rs_user->apellido1." ".$rs_user->apellido2;

            $calendario = $this->_getReunion($idcalendario);

            //var_dump($calendario->observacion); die;
            $this->loadModel('correos');
            $descripcion = "<b>Reunion N°: ".$idcalendario."</b><br><br><b>Enviado por: </b>".$user."<br><br><b>Asunto:</b> ".'Reunion cancelada'."<br><br>";
             

            if ($this->CalendariosAsistentes->delete($calendariosAsistente)) {

                 
                
                if($this->correos->enviarcorreo(10, $idcalendario ,$this->_getUserNameAsig($id_user),$this->_getUserEmailAsig($id_user), $descripcion))
                
                
                $this->Flash->success(__('Se borro el asistente correctamente.'));

                return $this->redirect(['controller' => 'calendarios' ,'action' => 'edit' , $idcalendario , $idempresa ]);
                
            }else
            {
                return $this->redirect(['controller' => 'calendarios' ,'action' => 'view' , $idcalendario , $idempresa ]);    
                $this->Flash->error(__('No se pudo borrar al asistente.'));
            }           
 
        }else {
            
            return $this->redirect(['controller' => 'Users' ,'action' => 'home']);    

        }

        
    }
}
