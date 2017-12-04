<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Session;
use Cake\Auth\DefaultPasswordHasher;



/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = array('Flash');

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        //Login
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'home'
            ],
            'flash' => [
                'params' => [
                    'class' => 'some-custom-class'
                ]   
            ],
            'authError' =>  false,
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
        
        $this->Auth->allow(['loadSubSistema', 'addAjax', 'editAjax','editServicio' ,'ajax_list','loadUser', 'listAuxiliar', 'listPasajeros', 'loadEmpresa', 'loadCargo' ,'addItems', 'getDetalleCotizacion', 'delItems', 'delPasajeros','concretar', 'listServicios','actualizarContactoCliente', 'deleteServicio', 'loadCobranza','loadFicha','loadUtilidad', 'enviarAprobar', 'aprobarFicha', 'aprobarControl','loadValorBruto']);

        
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        $loadPermisos = $this->loadPermisos();
      
        

        $action = $this->request->action;
        $controlador = $this->request->controller;

        $idUsuarioActual = $this->_getUser();
        $role_id = $this->_getRol();


        $this->loadModel('RolesPermisos');
        $permisos = $this->RolesPermisos->find('all')
        ->contain(['Permisos'])
        ->where(['RolesPermisos.role_id' => $role_id ])
        ->where(['Permisos.controlador' => $controlador ])
        ->where(['Permisos.action' => $action])
        ->where(['Permisos.active' => 1])
        ->toArray();
        
        
        //var_dump($permisos) ; die;
        if($this->request->controller != 'users' && $this->request->action != "login" )
        {
            if(count($permisos)>0)
            {
                $this->set('loadPermisos', $loadPermisos);    
            }else
            {
                //var_dump($this->request->controller."<br>".$this->request->action); die;
                //return $this->redirect(['controller' => 'Users','action' => 'home']);
            }
            
         

        }else
        {

        }

        $this->loadModel('Users');
        $id = $this->_getUser();
        
        if (isset($id))
        {
            $user = $this->Users->find('all')->where(['Users.id' => $id] )->toArray();
            $estado = $user[0]['estado'];
            $this->set('estado', $estado);    
        }
        
        //var_dump($estado); die;
        //$this->set('permisos', $permisos);
        
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }



        

    }

    /*public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view', 'display','add', 'logout']);
    }
*/

    public function isAuthorized($user)
    {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // Default deny
        return false;
    }

    public function _getUser(){
        $rs_user = $this->request->session()->read('Auth.User');
        $id = $rs_user[0]['id'];
        

        return $id;
    }



    public function _getRol(){
        $rs_user = $this->request->session()->read('Auth.User');
        $id = $rs_user[0]['role_id'];
        

        return $id;
    }

    public function _getUserEmail(){
        $rs_user = $this->request->session()->read('Auth.User');
        $username = $rs_user[0]['username'];
        /*$this->loadModel('Users');

        $rs = $this->Users->find('all')->where(['username' => $username])->toArray();*/

        return $username;
        //return 'felipe@mitani-holding.com';
        //return 'fanparedes@gmail.com';
    }
    public function _getUserName(){
        $rs_user = $this->request->session()->read('Auth.User');
        $username = $rs_user[0]['username'];
        $this->loadModel('Users');

        $rs = $this->Users->find('all')->where(['username' => $username])->toArray();

        return $rs[0]['name'].' '.$rs[0]['apellido1'];
    }


    public function _getUserAsig($id){
        $this->loadModel('Users');

        $rs = $this->Users->find('all')->where(['id' => $id])->toArray();

        return $rs[0]['id'];
    }

    public function _getUserEstado($id){
        $this->loadModel('Users');

        $rs = $this->Users->find('all')->where(['id' => $id])->toArray();

        return $rs[0]['estado'];
    }

    public function _getUserEmailAsig($id){
        $this->loadModel('Users');

        $rs = $this->Users->find('all')->where(['id' => $id])->toArray();

        return $rs[0]['username'];
    }
    public function _getUserNameAsig($id){
        
        $this->loadModel('Users');

        $rs = $this->Users->find('all')->where(['id' => $id])->toArray();

        return $rs[0]['name'].' '.$rs[0]['apellido1'];
    }
    public function _getUserFull($id){
        
        $this->loadModel('Users');

        $rs = $this->Users->find('all')->where(['id' => $id])->toArray();

        return $rs[0];
    }

     public function _getFichaFull($id){
        
        $this->loadModel('FichaPersonales');

        $rs = $this->FichaPersonales->find('all')->where(['id' => $id])->toArray();

        return $rs[0];
    }

     public function _getReunion($idreunion){
        
        $this->loadModel('Calendarios');

        $rs = $this->Calendarios->find('all')->where(['id' => $idreunion])->toArray();

        return $rs[0];
    }








    public function formatDate($date){
        //return substr($date, 6,4).'-'.substr($date, 3,2).'-'.substr($date, 0,2);
       // return '20171021';
        return date('20/10/2017',"Y-m-d");
    }

    public function formatDateTime($date){
        return substr($date, 6,4).'-'.substr($date, 3,2).'-'.substr($date, 0,2).' '.substr($date, 10,5);
    }

    
    public function formatDateTimeFicha($date){
        return substr($date, 6,4).'-'.substr($date, 3,2).'-'.substr($date, 0,2).' '.'00:00';
    }

    public function formatDateTimeCalendar($date){
        return substr($date, 6,4).'-'.substr($date, 3,2).'-'.substr($date, 0,2).substr($date, 10,8).':00';
    }

    public function formatDateView($date){
        return substr($date, 8,2).'-'.substr($date, 5,2).'-'.substr($date, 0,4);
    }

    public function formatDateViewB($date){
        return substr($date, 0,2).'-'.substr($date, 3,2).'-20'.substr($date, 6,2);
    }

    public function formatDateViewC($date){
        //return substr($date, 0,1).'-'.substr($date, 3,4).'-'.substr($date, 8,0);
        if($date!=''){
            //$date = new Date($date);
            return $date->format('d/m/Y');
        }else{
            return false;
        }

    }

    public function ExcelDateToDate($readDate){
        $phpexcepDate = $readDate-25569; //to offset to Unix epoch
        return strtotime("+$phpexcepDate days", mktime(0,0,0,1,1,1970));
    }



    private function loadPermisos(){

        $this->session = new Session();

        $idUsuarioActual = $this->_getUser();

        $role_id = $this->_getRol();

        //var_dump($role_id); die;

        $rs_permisos = false;
        $rs_permisos_hijo = false;
        $menu  = false;
        $nivel = false;
        if($idUsuarioActual!='' && $idUsuarioActual!=null){

            $this->loadModel('Roles');
            $this->loadModel('Permisos');
            $this->loadModel('RolesPermisos');
            $this->loadModel('Users');

            $rs_permisos = $this->RolesPermisos->find('all')
            ->contain(['Permisos', 'Roles'])
            ->where(['Permisos.nivel' => 0])
            ->where(['Roles.id' => $role_id])
            ->order(['Permisos.position' => 'ASC'])
            ->toArray();


            $rs_permisos_hijo = $this->RolesPermisos->find('all')
                                ->contain(['Permisos', 'Roles'])
                                ->where(['Permisos.nivel' => 1])
                                ->where(['Roles.id' => $role_id])
                                ->where(['Permisos.menu' => 1 ])
                                ->order(['Permisos.position' => 'ASC'])
                                ->toArray();

            
            foreach ($rs_permisos as  $row) {

                $name_1 = isset($row['permiso']['name']) && $row['permiso']['name']!=''  ? $row['permiso']['name'] : '' ;
                $controlador_1 = isset($row['permiso']['controlador']) && $row['permiso']['controlador']!=''  ? $row['permiso']['controlador'] : '' ;
                $action_1 = isset($row['permiso']['action']) && $row['permiso']['action']!=''  ? $row['permiso']['action'] : '' ;
                $nivel_1 = isset($row['permiso']['nivel']) && $row['permiso']['nivel']!=''  ? $row['permiso']['nivel'] : '' ;
                $icon1 = isset($row['permiso']['icono']) && $row['permiso']['icono']!=''  ? $row['permiso']['icono'] : '' ;
                //var_dump($icon); die;
                

                if(is_array($rs_permisos_hijo) && count($rs_permisos_hijo)>0 && $nivel_1 == ''){

                    $menu .= '<li class="dropdown"> 
                        <a href="'.APP_URI.$controlador_1.'/'.$action_1.'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "'.$icon1.'"></i> '.$name_1.'<span class="caret"></a> 
                            <ul class="dropdown-menu">
                        ';

                    

                    foreach($rs_permisos_hijo as $row2)
                            {
                                //var_dump($row2['permiso']['parametro']); 
                                $name_2 = isset($row2['permiso']['name']) && $row2['permiso']['name']!=''  ? $row2['permiso']['name'] : '' ;
                                $controlador_2 = isset($row2['permiso']['controlador']) && $row2['permiso']['controlador']!=''  ? $row2['permiso']['controlador'] : '' ;
                                $action_2 = isset($row2['permiso']['action']) && $row2['permiso']['action']!=''  ? $row2['permiso']['action'] : '' ;
                                $icon2 = isset($row2['permiso']['icono']) && $row2['permiso']['icono']!=''  ? $row2['permiso']['icono'] : '' ;
                                $parametro = isset($row2['permiso']['parametro']) && $row2['permiso']['parametro'] != '' ? $row2['permiso']['parametro'] : '';
                                //var_dump($row['permiso_id'].' = '.$row2['permiso']['padre'].'<br>'); 
                                if($row['permiso_id'] == $row2['permiso']['padre']){

                                    $menu .= '<li><a href="'.APP_URI.$controlador_2.'/'.$action_2.'/'.$parametro.'"><i class = "'.$icon2.'"> </i> '.$name_2.'</a></li>';    

                                }else{
                                } // end if
                                
                            }// end foreach
                            $menu .= '</ul></li>';

                }else{

                            
                            
                    } // END IF           

                            
            } //end foreach
        };        


        return $menu;
    }

   


}



