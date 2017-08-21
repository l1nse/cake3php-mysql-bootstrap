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
        $this->Auth->allow(['loadSubSistema', 'addAjax', 'editAjax','ajax_list','loadUser', 'listAuxiliar', 'listPasajeros', 'loadEmpresa', 'loadCargo' ,'addItem']);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
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

    public function formatDate($date){
        return substr($date, 6,4).'-'.substr($date, 3,2).'-'.substr($date, 0,2);
    }

    public function formatDateTime($date){
        return substr($date, 6,4).'-'.substr($date, 3,2).'-'.substr($date, 0,2).' '.substr($date, 10,5);
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

}
