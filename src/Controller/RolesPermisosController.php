<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RolesPermisos Controller
 *
 * @property \App\Model\Table\RolesPermisosTable $RolesPermisos
 */
class RolesPermisosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Permisos']
        ];
        $rolesPermisos = $this->paginate($this->RolesPermisos);

        $this->set(compact('rolesPermisos'));
        $this->set('_serialize', ['rolesPermisos']);
    }

    /**
     * View method
     *
     * @param string|null $id Roles Permiso id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rolesPermiso = $this->RolesPermisos->get($id, [
            'contain' => ['Roles', 'Permisos']
        ]);

        $this->set('rolesPermiso', $rolesPermiso);
        $this->set('_serialize', ['rolesPermiso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rolesPermiso = $this->RolesPermisos->newEntity();
        if ($this->request->is('post')) {
            $rolesPermiso = $this->RolesPermisos->patchEntity($rolesPermiso, $this->request->getData());
            if ($this->RolesPermisos->save($rolesPermiso)) {
                $this->Flash->success(__('The roles permiso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The roles permiso could not be saved. Please, try again.'));
        }
        $roles = $this->RolesPermisos->Roles->find('list', ['limit' => 200]);
        $permisos = $this->RolesPermisos->Permisos->find('list', ['limit' => 200]);
        $this->set(compact('rolesPermiso', 'roles', 'permisos'));
        $this->set('_serialize', ['rolesPermiso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Roles Permiso id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rolesPermiso = $this->RolesPermisos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rolesPermiso = $this->RolesPermisos->patchEntity($rolesPermiso, $this->request->getData());
            if ($this->RolesPermisos->save($rolesPermiso)) {
                $this->Flash->success(__('The roles permiso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The roles permiso could not be saved. Please, try again.'));
        }
        $roles = $this->RolesPermisos->Roles->find('list', ['limit' => 200]);
        $permisos = $this->RolesPermisos->Permisos->find('list', ['limit' => 200]);
        $this->set(compact('rolesPermiso', 'roles', 'permisos'));
        $this->set('_serialize', ['rolesPermiso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Roles Permiso id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rolesPermiso = $this->RolesPermisos->get($id);
        if ($this->RolesPermisos->delete($rolesPermiso)) {
            $this->Flash->success(__('The roles permiso has been deleted.'));
        } else {
            $this->Flash->error(__('The roles permiso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function borrar($id = null, $id2 = null)
    {
        if(isset($id) && $id != ' ')
        {
            $this->loadModel('Permisos');

            $permiso = $this->Permisos->find('all')->where(['Permisos.id' => $id ])->toArray();

            $rs_rol_permiso = $this->RolesPermisos->get($id,[
            'contain' => []
            ]);

            //var_dump($this->RolesPermisos->delete($rs_rol_permiso)) ; die;
            if ($this->RolesPermisos->delete($rs_rol_permiso)) {
                $this->Flash->success(__('The roles permiso has been deleted.'));
            } else {
                $this->Flash->error(__('The roles permiso could not be deleted. Please, try again.'));
            }
                       
            
            //var_dump($permiso) ; die;
        }
        
        return $this->redirect(['controller' => 'Roles' ,'action' => 'edit/'.$id2]);
    }
}
