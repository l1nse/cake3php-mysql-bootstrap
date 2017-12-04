<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permisos Controller
 *
 * @property \App\Model\Table\PermisosTable $Permisos
 */
class PermisosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        /*$this->paginate = [
            'contain' => []
        ];
        $permisos = $this->paginate($this->Permisos);*/

        
        $padres = $this->Permisos->find('all')->where(['nivel' => 0])->order(['Permisos.position' => 'ASC'])->toArray();

        if(is_array($padres) && count($padres)>0){
            $list_hijos = array();
            foreach($padres as $row){
                $id = $row['id'];
                $hijos = $this->Permisos->find('all')->where(['padre' => $id])->order(['Permisos.position' => 'ASC'])->toArray();
                if(is_array($hijos) && count($hijos)>0){
                    array_push($list_hijos, $hijos);
                }
            }
        }


        $this->set(compact('padres', 'list_hijos'));
        //$this->set('_serialize', ['permisos']);
    }

    /**
     * View method
     *
     * @param string|null $id Permiso id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permiso = $this->Permisos->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('permiso', $permiso);
        $this->set('_serialize', ['permiso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permiso = $this->Permisos->newEntity();
        if ($this->request->is('post')) {
            $permiso = $this->Permisos->patchEntity($permiso, $this->request->getData());
            $permiso['active'] = 1;
            if ($this->Permisos->save($permiso)) {

                

                $this->Flash->success(__('Se agrego el permiso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo agregar el permiso'));
        }
        $roles = $this->Permisos->Roles->find('list', ['limit' => 200]);

        //$this->loadModel('Padres');

        $padres = $this->Permisos->find('all')->where(['active' => 1 , 'nivel' => 0])->order(['name' => 'ASC'])->toArray();

        $this->set(compact('permiso', 'roles', 'padres'));
        $this->set('_serialize', ['permiso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permiso id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permiso = $this->Permisos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permiso = $this->Permisos->patchEntity($permiso, $this->request->getData());
            //var_dump($this->request->getData()); die;
            if ($this->Permisos->save($permiso)) {
                //var_dump($permiso); die;
                $this->Flash->success(__('El permiso fue editado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo editar el permiso.'));
        }
        

        $permisos = $this->Permisos->find('all')->order(['name' => 'ASC'])->toArray();
        $padres = $this->Permisos->find('all')->where(['Permisos.nivel' => 0 , 'Permisos.active' => 1 ])->toArray();
        $this->set(compact('permiso', 'permisos','padres'));
        $this->set('_serialize', ['permiso']);
    }

         public function anular($id = null)
    {
        $rs_permiso = $this->Permisos->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_permiso = $this->Permisos->patchEntity($rs_permiso, $rs_active);

                if ($this->Permisos->save($rs_permiso)) {
                    $this->Flash->success(__('El permiso fue desactivado correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
         {
            $rs_permiso = $this->Permisos->get($id,[
                'contain' => []
            ]);
            //var_dump($this->Users->get($id)); die;

            if(is_numeric($id))
            {
                $rs_active['active'] = 1; 

                $rs_permiso = $this->Permisos->patchEntity($rs_permiso, $rs_active);

                    if ($this->Permisos->save($rs_permiso)) {
                        $this->Flash->success(__('El permiso fue activado correctamente.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->success(__('Por favor intente nuevamente!.'));
             }
            return $this->redirect(['action' => 'index']);
        }


    /**
     * Delete method
     *
     * @param string|null $id Permiso id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permiso = $this->Permisos->get($id);
        if ($this->Permisos->delete($permiso)) {
            $this->Flash->success(__('The permiso has been deleted.'));
        } else {
            $this->Flash->error(__('The permiso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
