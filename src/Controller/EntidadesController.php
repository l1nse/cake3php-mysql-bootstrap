<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Entidades Controller
 *
 * @property \App\Model\Table\EntidadesTable $Entidades
 */
class EntidadesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        /*$this->paginate = [
            'contain' => ['Ciudades', 'Comunas', 'Paises']
        ];
        $entidades = $this->paginate($this->Entidades);
        */

        $entidades = $this->Entidades->find('all')->toArray();        
        
        $this->loadModel('RolesPermisos');
        $rol = $this->_getRol();
        $permisos = array(94, 72, 122, 71 , 77);
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
        

        $this->set(compact('entidades','permisos2')) ;
        $this->set('_serialize', ['entidades']);
    }

    /**
     * View method
     *
     * @param string|null $id Entidade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entidade = $this->Entidades->get($id, [
            'contain' => ['Ciudades', 'Comunas', 'Paises', 'Despachos']
        ]);


        $this->set('entidade', $entidade);
        $this->set('_serialize', ['entidade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entidade = $this->Entidades->newEntity();
        if ($this->request->is('post')) {
            $entidade = $this->Entidades->patchEntity($entidade, $this->request->getData());
            if ($this->Entidades->save($entidade)) {
                $this->Flash->success(__('The entidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entidade could not be saved. Please, try again.'));
        }
        $ciudades = $this->Entidades->Ciudades->find('list', ['limit' => 200]);
        $comunas = $this->Entidades->Comunas->find('list', ['limit' => 200]);
        $paises = $this->Entidades->Paises->find('list', ['limit' => 200]);
        $this->set(compact('entidade', 'ciudades', 'comunas', 'paises'));
        $this->set('_serialize', ['entidade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Entidade id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    //1 es index ,  2 es activar empresa varia segun de que vista se llame 
    public function edit($id = null,$ventana = null)
    {
        if(is_numeric($ventana))
        {
            if($ventana == "1")
            {
                $entidade = $this->Entidades->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $entidade = $this->Entidades->patchEntity($entidade, $this->request->getData());
                    $entidade ->active = '0';
                    if ($this->Entidades->save($entidade)) {
                        $this->Flash->success(__('The entidade has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The entidade could not be saved. Please, try again.'));
                }
                $ciudades = $this->Entidades->Ciudades->find('list', ['limit' => 200]);
                $comunas = $this->Entidades->Comunas->find('list', ['limit' => 200]);
                $paises = $this->Entidades->Paises->find('list', ['limit' => 200]);
                $this->set(compact('entidade', 'ciudades', 'comunas', 'paises'));
                $this->set('_serialize', ['entidade']);            
            }
            else if($ventana == '2')
            {
                $entidade = $this->Entidades->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $entidade = $this->Entidades->patchEntity($entidade, $this->request->getData());
                    $entidade ->active = '0';
                    if ($this->Entidades->save($entidade)) {
                        $this->Flash->success(__('The entidade has been saved.'));

                        return $this->redirect(['action' => 'activar-empresas']);
                    }
                    $this->Flash->error(__('The entidade could not be saved. Please, try again.'));
                }
                $ciudades = $this->Entidades->Ciudades->find('list', ['limit' => 200]);
                $comunas = $this->Entidades->Comunas->find('list', ['limit' => 200]);
                $paises = $this->Entidades->Paises->find('list', ['limit' => 200]);
                $this->set(compact('entidade', 'ciudades', 'comunas', 'paises'));
                $this->set('_serialize', ['entidade']);   
            }
        
        }else
        {
            return $this->redirect(['action' => 'index']);
        }
            
     }

    
   

    /**
     * Delete method
     *
     * @param string|null $id Entidade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entidade = $this->Entidades->get($id);
        if ($this->Entidades->delete($entidade)) {
            $this->Flash->success(__('The entidade has been deleted.'));
        } else {
            $this->Flash->error(__('The entidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function anular($id = null)
    {
        $entidade = $this->Entidades->get($id, [
            'contain' => []
        ]);
        
        if(is_numeric($id)){
             $rs_active['active'] = 2; 
                $entidade = $this->Entidades->patchEntity($entidade, $rs_active);
                if ($this->Entidades->save($entidade)) {
                    $this->Flash->success(__('La entidad fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        $ciudades = $this->Entidades->Ciudades->find('list', ['limit' => 200]);
        $comunas = $this->Entidades->Comunas->find('list', ['limit' => 200]);
        $paises = $this->Entidades->Paises->find('list', ['limit' => 200]);
        $this->set(compact('entidade', 'ciudades', 'comunas', 'paises'));
        $this->set('_serialize', ['entidade']);
    }

    public function activar($id = null)
    {
        $entidade = $this->Entidades->get($id, [
            'contain' => []
        ]);
        if(is_numeric($id)){
             $rs_active['active'] = 1; 
                $entidade = $this->Entidades->patchEntity($entidade, $rs_active);
                if ($this->Entidades->save($entidade)) {
                    $this->Flash->success(__('La entidad fue activada correctamente.'));

                    return $this->redirect(['action' => 'activarEmpresas']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }
        $ciudades = $this->Entidades->Ciudades->find('list', ['limit' => 200]);
        $comunas = $this->Entidades->Comunas->find('list', ['limit' => 200]);
        $paises = $this->Entidades->Paises->find('list', ['limit' => 200]);
        $this->set(compact('entidade', 'ciudades', 'comunas', 'paises'));
        $this->set('_serialize', ['entidade']);
    }

    public function activarEmpresas()
    {
         //$entidades = $this->Entidades->find('all')->toArray();        
         //$rs_entidades = $this->Contactos->find('all')->where(['active <>' => '1'])->toArray();

        $rs_entidades = $this->Entidades->find('all')->where(['Entidades.active <>' => '1'])->toArray();

        $this->loadModel('RolesPermisos');
        $rol = $this->_getRol();
        $permisos = array(74, 72);
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
            
        }else
        {
            $permisos2[] = 0;
        }
        //var_dump($permisos2); die;        
        $this->set('entidades', $rs_entidades);
        $this->set('permisos2', $permisos2);
    }



    
}
