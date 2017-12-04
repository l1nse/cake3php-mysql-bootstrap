<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contactos Controller
 *
 * @property \App\Model\Table\ContactosTable $Contactos
 */
class ContactosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Entidades']
        ];
        $contactos = $this->paginate($this->Contactos);

        $this->set(compact('contactos'));
        $this->set('_serialize', ['contactos']);
    }

    public function view($id = null , $idcalendario = null)
    {
        

        //rescato cotizacion activa
        if(isset($id) && is_numeric($id))
        {
            $contacto = $this->Contactos->get($id);
        }

        if(isset($idcalendario) && is_numeric($idcalendario))
        {
            $contacto = $this->Contactos->get($id);
            $this->set(compact('idcalendario'));
        }
        
        $this->set('contacto', $contacto);

        $this->set('_serialize', ['contacto']);
    }

    /**
     * View method
     *
     * @param string|null $id Contacto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewAjax()
    {
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $id = $this->request->data['id'];

        if(is_numeric($id)){
            $contacto = $this->Contactos->get($id, [
                'contain' => ['Entidades']
            ])->toArray();
   
            $result = true;
        }

        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $contacto));
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addAjax()
    {
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        
        $contacto = $this->Contactos->newEntity();
        
        if ($this->request->is('post')) {
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            if ($this->Contactos->save($contacto)) {
                $result = true;
                $this->Flash->success(__('Se agrego contacto correctamente!.'));
            }else{
                /*$x = $contacto->errors();
                 if ($x) {
                  debug($contacto);
                  debug($x);
                  return false; */
                                 
                 
                $debug = 'No se puede agregar el contacto, favor vuelva a intentar!';
                $this->Flash->error(__( $debug));
            }
        }
        
        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contacto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editAjax()
    {
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $id = $this->request->data['id'];

        $contacto = $this->Contactos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            if ($this->Contactos->save($contacto)) {
                $result = true;
                $this->Flash->success(__('Se edito contacto correctamente!.'));
            }else{
                $debug = 'No se puede agregar el contacto, favor vuelva a intentar!';
                $this->Flash->error(__( $debug));
            }
        }
        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $contacto));
    }

     public function desactivar()
    {
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $id = $this->request->data['id'];

        $contacto = $this->Contactos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contacto = $this->Contactos->patchEntity($contacto, $this->request->getData());
            if ($this->Contactos->save($contacto)) {
                $result = true;
                $this->Flash->success(__('Se desactivo contacto correctamente!.'));
            }else{
                $debug = 'No se puede agregar el contacto, favor vuelva a intentar!';
                $this->Flash->error(__( $debug));
            }
        }
        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $contacto));
    }
         public function activar($id = null)
    {
        $contacto = $this->Contactos->get($id, [
            'contain' => []
        ]);
        if(is_numeric($id)){
             $rs_active['active'] = 1; 
                $contacto = $this->Contactos->patchEntity($contacto, $rs_active);
                if ($this->Contactos->save($contacto)) {
                    $this->Flash->success(__('El contacto fue activado correctamente.'));

                    return $this->redirect(['action' => 'activarContacto']);
                }
                $this->Flash->error(__('Por favor intente nuevamente!.'));
        }
        $this->set('_serialize', ['entidade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contacto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contacto = $this->Contactos->get($id);
        if ($this->Contactos->delete($contacto)) {
            $this->Flash->success(__('The contacto has been deleted.'));
        } else {
            $this->Flash->error(__('The contacto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ajaxList(){
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $rs_user = $this->request->session()->read('Auth.User');
        
        $html .= '<div class="">';
        if ($this->request->is('post')) {
            $entidade_id = $this->request->data['entidade_id'];
            if(is_numeric($entidade_id)){
                $rs = $this->Contactos->find('all')->where(['entidade_id' => $entidade_id, 'active' => '1'])->toArray();
                $result = true;
                if(is_array($rs) && count($rs)>0){
                    $html .= '<table class="table table-bordered table-striped ">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                    $html .= '<th>Nombre Completo</th>';
                    $html .= '<th>Email</th>';
                    $html .= '<th>Teléfono</th>';
                    $html .= '<th>Cargo</th>';
                    $html .= '<th>Descripción</th>';
                    $html .= '<th>Nacionalidad</th>';
                    $html .= '<th>Acciones</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    
                    foreach ($rs as $row) {
                        $html .= '<tr>';
                        $html .= '<td>'.$row['name'] .'</td>';
                        $html .= '<td><a href="mailto:'.$row['email'].'">'.$row['email'] .'</a></td>';
                        //$html .= '<td style="text-align: center;"><a href="tel:'.$row['telefono'].'">'.$row['telefono'] .'</a></td>';
                        $html .= '<td style="text-align: center;">'.$row['telefono'] .'</td>';
                        $html .= '<td>'.$row['cargo'] .'</td>';
                        $html .= '<td>'.$row['descripcion'] .'</td>';
                        $html .= '<td>'.$row['nacionalidad'] .'</td>';
                        if($rs_user[0]['role']=='admin' || $rs_user[0]['role']=='gerente'){
                        $html .= '<td style="text-align: center;">
                                    <a class="btn btn-warning btn-xs" href="javascript:editModal('.$row['id'].', \''.$row['name'].'\', '.$row['entidade_id'].')" data-toggle="tooltip" data-placement="left" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a class="btn btn-danger btn-xs" href="javascript:delModal('.$row['id'].', '.$row['entidade_id'].')" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>';
                        }else{
                            $html .= '<td style="text-align: center;">
                                    <a class="btn btn-warning btn-xs" href="javascript:editModal('.$row['id'].', \''.$row['name'].'\', '.$row['entidade_id'].')" data-toggle="tooltip"  data-toggle="tooltip" data-placement="left" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                    
                                </td>';
                        }
                        $html .= '</tr>';
                    }
                    $html .= '</tbody>';
                    $html .= '</table>';
                }else{
                    $html  = '<div class="alert alert-warning" role="alert"><center>No existen contactos asociados a esta empresa!</center></div>';
                }
            }
            
        }
        $html .= '</div>';
        
        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    //Funcion que muestra los contactos pendientes y desactivados. y envia el array
    public function activarContacto()
    {
        $rs_contacto = $this->Contactos->find('all')->contain(['Entidades'])->where(['Contactos.active <>' => '1'])->toArray();
        $this->loadModel('RolesPermisos');

        $rol = $this->_getRol();
        $permisos = array(75, 98, 78, 123);
        $permiso = $this->RolesPermisos->find('all')->where(['RolesPermisos.role_id' => $rol , 'RolesPermisos.permiso_id IN' => $permisos])->toArray();
        if(isset($permiso) && count($permiso) > 0)
        {
            foreach ($permiso as $row ) {
                $comprueba = $row['permiso_id'];
                if(in_array($comprueba, $permisos))
                {
                    $permisos2[] = $comprueba;
                }                
            }
            //var_dump($permiso); die;        
        }else
        {
            $permisos2[] = 0;
        }

        $this->set('contactos', $rs_contacto);
        $this->set('permisos2', $permisos2);

    }

   
}
