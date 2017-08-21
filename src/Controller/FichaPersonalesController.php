<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;

/**
 * FichaPersonales Controller
 *
 * @property \App\Model\Table\FichaPersonalesTable $FichaPersonales
 */
class FichaPersonalesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       // $this->paginate = [
         //   'contain' => ['Users', 'Empresas', 'TipoMovimientos', 'Areas', 'Cargos', 'Paises', 'Ciudades', 'Comunas', 'TipoCuentas', 'Bancos', 'Afps', 'Isapres']
        //];
        //$fichaPersonales = $this->paginate($this->FichaPersonales);

        //Contain trae el usuario a ficha persona
        $fichaPersonales = $this->FichaPersonales->find('all')
                        ->contain(['Users' , 'Empresas','Areas' ,'Cargos']);

        


        $this->set(compact('fichaPersonales'));
        $this->set('_serialize', ['fichaPersonales']);
    }

    


    /**
     * View method
     *
     * @param string|null $id Ficha Personale id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fichaPersonale = $this->FichaPersonales->get($id, [
            'contain' => ['Users', 'Empresas', 'TipoMovimientos', 'Areas', 'Cargos', 'Paises', 'Ciudades', 'Comunas', 'TipoCuentas', 'Bancos', 'Afps', 'Isapres', 'JefeAreas']
        ]);

        $fichaPersonale['fecha_nacimiento'] = isset($fichaPersonale['fecha_nacimiento']) && $fichaPersonale['fecha_nacimiento']!='' ?  $this->formatDateViewC($fichaPersonale['fecha_nacimiento']) : '';

         $user['created'] = isset($user['created']) && $user['created']!='' ?  $this->formatDateViewC($user['created']) : '';

        $user['modified'] = isset($user['modified']) && $user['modified']!='' ?  $this->formatDateViewC($user['modified']) : '';


        $this->set('fichaPersonale', $fichaPersonale);
        $this->set('_serialize', ['fichaPersonale']);
    }

    public function anexo()
    {
        $fichaPersonales = $this->FichaPersonales->find('all')
                        ->contain(['Users' , 'Empresas','Areas' ,'Cargos'])->order(['Users.name'=>'ASC']);

        $this->set(compact('fichaPersonales'));
        $this->set('_serialize', ['fichaPersonales']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //CREA UN OBJETO FICHA
        $fichaPersonale = $this->FichaPersonales->newEntity();

        //SI EL BOTON ENVIO INFORMACION POR POST
        if ($this->request->is('post')) {
            //RECIBE LA INFORMACION DEL POST
            $fichaPersonale = $this->FichaPersonales->patchEntity($fichaPersonale, $this->request->getData());

             //formatea la fecha nacimiento de la ficha 
            $fichaPersonale['fecha_nacimiento']  = trim($this->formatDate($this->request->data['fecha_nacimiento']));

            //var_dump($fichaPersonale); die;

            //CREA UN USUARIO CON TODOS LOS DATOS 
            $usuario = $this->_getUserFull($fichaPersonale->user_id);
            //var_dump($fichaPersonale); die;
            
            //FALTA UN IF QUE COMPRUEBE QUE LOS DATOS NO ESTAN VACIOS
            // if()
            if(($usuario->username != '') && ( $usuario->name )){
                $email['email'] = $usuario->username; 
                $name['name'] = $usuario->name;

                //$apellido1['apellido1'] = $usuario->apellido1;
                //$apellido2['apellido2'] = $usuario->apellido2;

                //Le pasamos los datos recogidos a ficha personal
                $fichaPersonale = $this->FichaPersonales->patchEntity($fichaPersonale, $email);    
                $fichaPersonale = $this->FichaPersonales->patchEntity($fichaPersonale, $name);

            //No se existen estos campos en la base de datos.
            //$fichaPersonale = $this->FichaPersonales->patchEntity($fichaPersonale, $apellido1);
            //$fichaPersonale = $this->FichaPersonales->patchEntity($fichaPersonale, $apellido2);

            //var_dump($fichaPersonale); die;

            //Modifica la fecha nacinmiento a un date
            $fichaPersonale['fecha_nacimiento']  = trim($this->formatDate($this->request->data['fecha_nacimiento']));

            //Guarda la ficha en la base de datos 
            if ($this->FichaPersonales->save($fichaPersonale)) {

                //Guardar apellido en usuario
                
                    if($this->request->data['apellido1'] != '')
                    {
                    $apellido1['apellido1'] = $this->request->data['apellido1'];
                    $usuario = $this->Users->patchEntity($usuario, $apellido1);
                    }
                

                
                    if($this->request->data['apellido2'] != '')
                    {    
                        $apellido2['apellido2'] = $this->request->data['apellido2'];                    
                        $usuario = $this->Users->patchEntity($usuario, $apellido2);
                    }
                

                $this->Users->save($usuario);


                $this->Flash->success(__('La ficha personal a sido creada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No fue posible crear la ficha intentelo nuevamente.'));
        }

            };
                                                        
            
        $users = $this->FichaPersonales->Users->find('list', ['limit' => 200]);
        $userAsignados = $this->FichaPersonales->Users->find('all')->where(['active' => 1])->order(['name' => 'ASC'])->toArray();

        $empresas = $this->FichaPersonales->Empresas->find('list', ['limit' => 200]);
        $tipoMovimientos = $this->FichaPersonales->TipoMovimientos->find('list', ['limit' => 200]);
        $areas = $this->FichaPersonales->Areas->find('list', ['limit' => 200]);
        $cargos = $this->FichaPersonales->Cargos->find('list', ['limit' => 200]);
        $paises = $this->FichaPersonales->Paises->find('list', ['limit' => 200]);
        $ciudades = $this->FichaPersonales->Ciudades->find('list', ['limit' => 200]);
        $comunas = $this->FichaPersonales->Comunas->find('list', ['limit' => 200]);
        $tipoCuentas = $this->FichaPersonales->TipoCuentas->find('list', ['limit' => 200]);
        $bancos = $this->FichaPersonales->Bancos->find('list', ['limit' => 200]);
        $afps = $this->FichaPersonales->Afps->find('list', ['limit' => 200]);
        $isapres = $this->FichaPersonales->Isapres->find('list', ['limit' => 200]);
        $cargos = $this->FichaPersonales->Cargos->find('list', ['limit' => 200]);

        $this->set(compact('fichaPersonale', 'users', 'empresas', 'tipoMovimientos', 'areas', 'cargos', 'paises', 'ciudades', 'comunas', 'tipoCuentas', 'bancos', 'afps', 'isapres'));
        $this->set('_serialize', ['fichaPersonale']);

       
        
        $this->set(compact('ticket', 'sistemas', 'users', 'userAsignados', 'subSistemas'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Ficha Personale id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fichaPersonale = $this->FichaPersonales->get($id, [
            'contain' => ['Users','Areas']
        ]);

        //$fichaPersonale['fecha_nacimiento'] = $this->formatDateViewC($fichaPersonale['fecha_nacimiento']);
        $fichaPersonale['fecha_nacimiento'] = isset($fichaPersonale['fecha_nacimiento']) && $fichaPersonale['fecha_nacimiento']!='' ?  $this->formatDateViewC($fichaPersonale['fecha_nacimiento']) : '';


        if ($this->request->is(['patch', 'post', 'put'])) {

            
            //var_dump($this->request->getData()); die;

            // crea una ficha
            $fichaPersonale = $this->FichaPersonales->patchEntity($fichaPersonale, $this->request->getData());
            //var_dump($fichaPersonale); die;

            //formatea la fecha nacimiento de la ficha 
            $fichaPersonale['fecha_nacimiento']  = trim($this->formatDate($this->request->data['fecha_nacimiento']));
           // var_dump($fichaPersonale); die;
            if ($this->FichaPersonales->save($fichaPersonale)) {

                //CREA UN USUARIO CON TODOS LOS DATOS 
            $usuario = $this->_getUserFull($fichaPersonale->user_id);

                //Guardar apellido en usuario
                if($this->request->data['apellido1'] != '')
                {

                    $usuario = $this->Users->patchEntity($usuario, $this->request->getData());
                    $usuario->apellido1 = $this->request->data['apellido1'];
                }

               if($this->request->data['apellido2'] != '')
                {    
                    $usuario->apellido2 = $this->request->data['apellido2'];
                }

                if($this->request->data['cargo_id'] != '')
                {    
                   $usuario->cargo_id = $this->request->data['cargo_id'];
                }

                //var_dump($this->request->data); die;
                if($this->Users->save($usuario)){

                    //var_dump("usuario modificado");
                }

                
                //var_dump($this->request->data['fecha_nacimiento']); die;


                $this->Flash->success(__('Ficha personal actualziada!.'));

                return $this->redirect(['action' => 'index']);
            } else {
                         
                         $x = $fichaPersonale->errors();
                         if ($x) {
                          debug($fichaPersonale);
                          debug($x);
                          return false;
                         }                
                         die;
                         
            }

            $this->Flash->error(__('Intentelo nuevamete'));
        }
        $users = $this->FichaPersonales->Users->find('list', ['limit' => 200]);
        $empresas = $this->FichaPersonales->Empresas->find('list', ['limit' => 200]);
        $tipoMovimientos = $this->FichaPersonales->TipoMovimientos->find('list', ['limit' => 200]);
        $areas = $this->FichaPersonales->Areas->find('list', ['limit' => 200]);
        $cargos = $this->FichaPersonales->Cargos->find('list', ['limit' => 200]);
        $paises = $this->FichaPersonales->Paises->find('list', ['limit' => 200]);
        $ciudades = $this->FichaPersonales->Ciudades->find('list', ['limit' => 200]);
        $comunas = $this->FichaPersonales->Comunas->find('list', ['limit' => 200]);
        $tipoCuentas = $this->FichaPersonales->TipoCuentas->find('list', ['limit' => 200]);
        $bancos = $this->FichaPersonales->Bancos->find('list', ['limit' => 200]);
        $afps = $this->FichaPersonales->Afps->find('list', ['limit' => 200]);
        $isapres = $this->FichaPersonales->Isapres->find('list', ['limit' => 200]);
        $this->set(compact('fichaPersonale', 'users', 'empresas', 'tipoMovimientos', 'areas', 'cargos', 'paises', 'ciudades', 'comunas', 'tipoCuentas', 'bancos', 'afps', 'isapres'));
        $this->set('_serialize', ['fichaPersonale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficha Personale id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fichaPersonale = $this->FichaPersonales->get($id);
        if ($this->FichaPersonales->delete($fichaPersonale)) {
            $this->Flash->success(__('The ficha personale has been deleted.'));
        } else {
            $this->Flash->error(__('The ficha personale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
     public function anular($id = null)
    {
        $rs_ficha = $this->FichaPersonales->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Areas->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_ficha = $this->FichaPersonales->patchEntity($rs_ficha, $rs_active);

                if ($this->FichaPersonales->save($rs_ficha)) {
                    $this->Flash->success(__('El area fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
    {
        $rs_ficha = $this->FichaPersonales->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 1; 

            $rs_ficha = $this->FichaPersonales->patchEntity($rs_ficha, $rs_active);

                if ($this->FichaPersonales->save($rs_ficha)) {
                    $this->Flash->success(__('El area fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function loadUser()
    {
        $this->autoRender = false;

        
        $result = false;
        $debug  = false;
        $email = false;


        $usuario = '';
        $name = '';
        $apellido1 = '';
        $apellido2 = '';

        
        if($this->request->is('post')){

            
            $usuario = $this->_getUserFull($this->request->data['usuario_id']);
            
            
            //&& ($apellido2 != '' agregar cuando la BD sea actualizada con todos los apellidos 2 
            if(($usuario->username!='') && ($usuario->name !='') ){ 
                $result = true;
                //var_dump($usuario); die;
            }else{
                $debug = 'No se encontraron datos asociados';
            }
           // var_dump($usuario);  die;  
        //    $html .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';

            
        }

        //echo json(array('result' => $result, 'debug' => $debug, 'email' => $usuario->username));

        echo json_encode(array('result' => $result, 'debug' => $debug, 'email' => $usuario->username, 'name' => $usuario->name , 'apellido1' => $usuario->apellido1, 'apellido2' => $usuario->apellido2  ));

    }

    public function loadEmpresa()
    {
        //var_dump("estoy en el controler"); die;
         $this->autoRender = false;

        $result = false;
        $debug  = false;
         $html = false;
        
        //var_dump("Load empresa"); die;
        if($this->request->is('post')){
            //var_dump("estoy en el post"); echo("<br>");

            //carga el modelo
            $this->loadModel('Areas');
            // var_dump("cargo el modelo"); echo("<br>");


            //pide los datos del js
            $empresa_id  = $this->request->data['empresa_id'];
            $area_id     = $this->request->data['area_id'];
            
            //var_dump($this->request->data['area_id']); die;


            

            //Hace la consulta a la base de datos y la almacena en un array 
            $rs_empresa = $this->Areas->find('all')->where(['empresa_id' => $empresa_id])->order(['name' => 'ASC'])->toarray();
            //var_dump($rs_empresa); die;

            if(is_array($rs_empresa) && count($rs_empresa)>0){

                $result = true;
                $debug = true;
                $html .= '<option value=""></option>';
                //var_dump($area_id); die;
                foreach ($rs_empresa as $row) {
                    if($area_id==$row['id']){
                        $html .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
                    }else{
                        $html .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        //var_dump("entro al else"); die;
                    }

                } // end foreach
            } // end if 
        }// end if post

        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
    } // end loadEmpresa

    public function loadCargo(){

            //var_dump("Estoy en el controlador"); die;
        $this->autoRender = false;

           $result = false;
            $debug = false;
            $html  = false;

            



            if($this->request->is('post')){

                //var_dump("estoy en el post"); die;
                //carga el modelo
            $this->loadModel('Cargos');
            // var_dump("cargo el modelo"); echo("<br>");

            //pide los datos del js
            $area_id     = $this->request->data['area_id'];

            $cargo_id    = isset($this->request->data['cargo_id']) && $this->request->data['cargo_id']!='' ? $this->request->data['cargo_id'] : '';
            //var_dump($this->request->data['area_id']); die;
            

            //Hace la consulta a la base de datos y la almacena en un array 
            $rs_cargos = $this->Cargos->find('all')->where(['area_id' => $area_id])->order(['name' => 'ASC'])->toarray();
            //var_dump($rs_cargos); die;
            
                if(is_array($rs_cargos) && count($rs_cargos)>0){
                $result = true;
                $debug = true;
                $html .= '<option value=""></option>';
                //var_dump($area_id); die;
                foreach ($rs_cargos as $row) {
                    if($cargo_id==$row['id']){
                        $html .= '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
                    }else{
                        $html .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        //var_dump("entro al else"); die;
                    }
                }//end foreach

                }//end if
            

            }//end if

        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

    }//end LoadCargo

    public function exportarExcel()
    {
     $this->viewBuilder()->layout(false);

         $fichaPersonales = $this->FichaPersonales->find('all')
                        ->contain(['Users' , 'Empresas','Areas' ,'Cargos']);
                        //->order(['Fichas.id' => 'DESC']);

        


        $this->set(compact('fichaPersonales'));
        $this->set('_serialize', ['fichaPersonales']);
    }// end export excel */


} 
