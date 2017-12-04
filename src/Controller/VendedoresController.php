<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Network\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class VendedoresController extends AppController
{

   /* public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add');
    }*/

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$users = $this->paginate($this->Users);
        $users = $this->Users->find('all')->contain(['Roles']);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Asignaciones','Roles' ,'FichaPersonales', 'Tickets']
        ]);

        $user['created'] = isset($user['created']) && $user['created']!='' ?  $this->formatDateViewC($user['created']) : '';

        $user['modified'] = isset($user['modified']) && $user['modified']!='' ?  $this->formatDateViewC($user['modified']) : '';

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['password'] = sha1(md5($this->request->data['password']));
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario fue agregado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
            $this->loadModel('Roles');
            $roles = $this->Roles->find('all')->where(['Roles.active' => 1])->toArray();

        $this->set(compact('user','roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(isset($this->request->data['password'])){
                $this->request->data['password'] = sha1(md5($this->request->data['password']));
            }
            
            //var_dump($this->request->data['password']); die;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario actualizado!.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
            $this->loadModel('Roles');
            $roles = $this->Roles->find('all')->where(['Roles.active' => 1])->toArray();

        $this->set(compact('user' ,'roles'));
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
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function anular($id = null)
    {
        $rs_user = $this->Users->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_user = $this->Users->patchEntity($rs_user, $rs_active);

                if ($this->Users->save($rs_user)) {
                    $this->Flash->success(__('La entidad fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
         {
            $rs_user = $this->Users->get($id,[
                'contain' => []
            ]);
            //var_dump($this->Users->get($id)); die;

            if(is_numeric($id))
            {
                $rs_active['active'] = 1; 

                $rs_user = $this->Users->patchEntity($rs_user, $rs_active);

                    if ($this->Users->save($rs_user)) {
                        $this->Flash->success(__('La entidad fue activada correctamente.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->success(__('Por favor intente nuevamente!.'));
             }
            return $this->redirect(['action' => 'index']);
        }

    public function login()
    {
        //phpinfo();
        if ($this->request->is('post')) {
            
            $username  = $this->request->data['username'];
            $password  = sha1(md5($this->request->data['password']));
            $user = $this->Auth->identify();
            //var_dump($password); die;

            $this->loadModel('users');
            $rs = $this->Users->find('all')->where(['username' => $username, 'password' => $password, 'active' => '1'])->toArray();

            if (count($rs)>0 && is_array($rs)) {
                $user = true;
                $this->Auth->setUser($rs);
                if($this->request->data['password']=='mitani123'){
                     return $this->redirect(['action' => 'cambiarClave']);
                }else{
                    return $this->redirect($this->Auth->redirectUrl());
                }
            }
            $this->Flash->error(__('Invalido username o contraseña, vuelva a intentar!'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function home(){
        $rs_user = $this->request->session()->read('Auth.User');

      
        $rs = $this->Users->find('all')->where(['username' => $rs_user[0]['username']])->toArray();

        $this->set('users', $rs[0]);

    }

    public function cambiarClave(){
        $id = $this->_getUser();
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if(isset($this->request->data['password'])){
                $this->request->data['password'] = sha1(md5($this->request->data['password']));
            }
            
            //var_dump($this->request->data['password']); die;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario actualizado!.'));

                //return $this->redirect(['action' => 'index']);
                return $this->redirect('/tickets/home');
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function cambiarEstado()
    {
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $user = $this->_getUser();
        $user = $this->_getUserFull($user);
        

        if($this->request->is('post')){
            
            $dondeestoy = $this->request->getData('dondeestoy');
            if(is_numeric($dondeestoy))
            {
                $rs_estoy['estado'] = $dondeestoy;
                $user = $this->Users->patchEntity($user, $rs_estoy);
                //var_dump("ex"); die;
                if($this->Users->save($user))
                {

                    $this->Flash->success(__('Estado cambiado.'));
                    $result = true;

                }else
                {
                    $debug = 'Error al cambiar el estado, intente nuevamente mas tarde';
                    $this->Flash->error(__( $debug));
                }
            }
            
            $this->loadModel('Digis');
            $digi = $this->Digis->newEntity();
            $digi['user_id'] = $user['id'];
            $digi['active'] = $dondeestoy;


            $observacion = $this->request->getData('observacion');
            
            if(isset($observacion) && $observacion != '')
            {
                $digi['observacion'] = $observacion;    
            }

            $date_salida = $this->request->getData('date_salida');

            if(isset($date_salida) && $date_salida != '')
            {
                $date_salida = $this->formatDateTimeCalendar($date_salida);
                $digi['fecha_desde'] = $date_salida;    
            }

            $date_vuelta = $this->request->getData('date_vuelta');

            if(isset($date_vuelta) && $date_vuelta != '')
            {
                $date_vuelta = $this->formatDateTimeCalendar($date_vuelta);
                $digi['fecha_hasta'] = $date_vuelta;    
            }


            if ($this->Digis->save($digi)) {               
                //$this->Flash->success(__('Estado cambiado.'));
                
            }else
            {
                $debug = 'Error al cambiar el estado, intente nuevamente mas tarde';
                //$this->Flash->error(__( $debug));
            }
            


        }
        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        

        return $this->response;
    }

}
