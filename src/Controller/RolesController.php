<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $roles = $this->Roles->find('all');

        $this->set(compact('roles'));
        $this->set('_serialize', ['roles']);
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Permisos']
        ]);

        $this->loadModel('RolesPermisos');

        $rolesPermiso = $this->RolesPermisos->find('all')->contain(['Permisos'])->where(['RolesPermisos.role_id' => $id])->toArray(); //

        $this->set(compact('role' , 'rolesPermiso'));
        
        $this->set('_serialize', ['role']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();

        $this->loadModel('RolesPermisos');
        if ($this->request->is('post')) {
           

           // PIDO EL ARRAY DE PERMISOS ENVIADOS POR POST
           $rs_permiso_id =  $this->request->getData('permiso_id');
            //SE CRA UN ROL UTILIZANDO LOS DATOS RECIBIDOS POR POST
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            //SE GUARDA EL ROL
            if ($this->Roles->save($role)) {
                //SE RESCATA EL ID DEL ROL CREADO
                $role_id = $role->id;


                $this->loadModel('Permisos');

                    // SE RECORRE EL ARRAY DE PERMISOS
                    foreach ($rs_permiso_id as  $row) {
                        
                        //echo $row." <br>";
                        $padre = $this->Permisos->find('all')->where(['Permisos.id' => $row ])->limit(1)->toArray();
                        


                        $rs_exist_permiso = $this->RolesPermisos->find('all')->where(['permiso_id' => $padre[0]['padre']])->where(['role_id' => $role_id])->toArray();
                        
                        

                        if(count($rs_exist_permiso)==0){

                            $role_permiso_padre = $this->RolesPermisos->newEntity();
                            $rs_role_permiso_padre['role_id'] = $role_id;
                            $rs_role_permiso_padre['permiso_id'] = $padre[0]['padre'];
                            $role_permiso_padre = $this->Roles->patchEntity($role_permiso_padre, $rs_role_permiso_padre);
                            
                            $this->RolesPermisos->save($role_permiso_padre);
                        
                        }

                        //CREA UN NUEVO ROL_PERMISO VACIO
                        $role_permiso = $this->RolesPermisos->newEntity();
                        //AGREGA UN ROLE_ID A ROL_PERMISO
                        $rs_role_permiso['role_id'] = $role_id;
                        //AGREGA UN PERMISO AL ROL_PERMISO
                        $rs_role_permiso['permiso_id'] = $row;
                        //VUELVE A GENERAR UN OBJETO ROLE_PERMISO ESTA VES LLENO 
                        $role_permiso = $this->Roles->patchEntity($role_permiso, $rs_role_permiso);
                        //GUARDA EL ROLE_ PERMISO
                        if($this->RolesPermisos->save($role_permiso)){
                            var_dump('exito');
                        }else{
                            var_dump('no exito');
                        }
                        //VUELVE A HACER EL CICLO
                                    
                    } 

                
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }

         $this->loadModel('Permisos');
         

        $padres = $this->Permisos->find('all')->where(['Permisos.active' => 1, 'Permisos.nivel' => 0])->toArray();
        $hijos = $this->Permisos->find('all')->where(['Permisos.active' => 1, 'Permisos.nivel' => 1])->toArray();

        $this->set(compact('role','padres','hijos'));
        $this->set('_serialize', ['role']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        $this->loadModel('Permisos');
        $this->loadModel('RolesPermisos');
        if ($this->request->is(['patch', 'post', 'put'])) {

            //ARRAY CON LOS ID DE LOS PERMISOS SELECCIONADOS
            $rs_permiso_id =  $this->request->getData('permiso_id');
            

            $role = $this->Roles->patchEntity($role, $this->request->getData());


            if ($this->Roles->save($role)) {
                $role_id = $role->id;

                //var_dump($this->Roles->save($role)); die;        

                foreach ($rs_permiso_id as  $row) {
                    
                    $padre = $this->Permisos->find('all')->where(['Permisos.id' => $row ])->limit(1)->toArray();
                        //var_dump($padre[0]['padre']); die;

                        $rs_exist_permiso = $this->RolesPermisos->find('all')->where(['permiso_id' => $padre[0]['padre']])->where(['role_id' => $role_id])->toArray();
                        
                        

                        if(count($rs_exist_permiso)==0){

                            $role_permiso_padre = $this->RolesPermisos->newEntity();
                            $rs_role_permiso_padre['role_id'] = $role_id;
                            $rs_role_permiso_padre['permiso_id'] = $padre[0]['padre'];
                            $role_permiso_padre = $this->Roles->patchEntity($role_permiso_padre, $rs_role_permiso_padre);
                            
                            $this->RolesPermisos->save($role_permiso_padre);
                        
                        }

                        //CREA UN NUEVO ROL_PERMISO VACIO
                        $role_permiso = $this->RolesPermisos->newEntity();
                        //AGREGA UN ROLE_ID A ROL_PERMISO
                        $rs_role_permiso['role_id'] = $role_id;
                        //AGREGA UN PERMISO AL ROL_PERMISO
                        $rs_role_permiso['permiso_id'] = $row;
                        //VUELVE A GENERAR UN OBJETO ROLE_PERMISO ESTA VES LLENO 
                        $role_permiso = $this->Roles->patchEntity($role_permiso, $rs_role_permiso);
                        //GUARDA EL ROLE_ PERMISO
                        if($this->RolesPermisos->save($role_permiso)){
                            var_dump('exito');
                        }else{
                            var_dump('no exito');
                        }
                        //VUELVE A HACER EL CICLO
                                    
                    } 
                $this->Flash->success(__('El rol fue modificado.'));

                return $this->redirect(['action' => 'edit/'.$role_id]);
            }
            $this->Flash->error(__('El rol no pudo ser modificado. Intentelo nuevamente mas tarde'));
        }
        
        

        $hijos = $this->Permisos->find('all')->where(['Permisos.active' => 1, 'Permisos.nivel' => 1])->toArray();
        $padres = $this->Permisos->find('all')->where(['Permisos.active' => 1, 'Permisos.nivel' => 0])->toArray();

        $this->loadModel('RolesPermisos');

        $rolesPermiso = $this->RolesPermisos->find('all')->contain(['Permisos'])->where(['RolesPermisos.role_id' => $id])->toArray(); //




        //var_dump($rolesPermiso); die;

        $this->set(compact('role','hijos' ,'rolesPermiso','padres'));
        $this->set('_serialize', ['role']);
    }

     public function anular($id = null)
    {
        $rs_rol = $this->Roles->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_rol = $this->Roles->patchEntity($rs_rol, $rs_active);

                if ($this->Roles->save($rs_rol)) {
                    $this->Flash->success(__('La entidad fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
         {
            $rs_rol = $this->Roles->get($id,[
                'contain' => []
            ]);
            //var_dump($this->Users->get($id)); die;

            if(is_numeric($id))
            {
                $rs_active['active'] = 1; 

                $rs_rol = $this->Roles->patchEntity($rs_rol, $rs_active);

                    if ($this->Roles->save($rs_rol)) {
                        $this->Flash->success(__('La entidad fue activada correctamente.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->success(__('Por favor intente nuevamente!.'));
             }
            return $this->redirect(['action' => 'index']);
        }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



}
