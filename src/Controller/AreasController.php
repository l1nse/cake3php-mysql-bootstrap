<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Areas Controller
 *
 * @property \App\Model\Table\AreasTable $Areas
 */
class AreasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Empresas']
        ];
        $areas = $this->paginate($this->Areas);

        $this->set(compact('areas'));
        $this->set('_serialize', ['areas']);
    }

    /**
     * View method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => ['Empresas', 'Cargos', 'FichaPersonales', 'JefeAreas']
        ]);

        $area['created'] = isset($area['created']) && $area['created']!='' ?  $this->formatDateViewC($area['created']) : '';

        $area['modified'] = isset($area['modified']) && $area['modified']!='' ?  $this->formatDateViewC($area['modified']) : '';

        $this->set('area', $area);
        $this->set('_serialize', ['area']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $area = $this->Areas->newEntity();
        if ($this->request->is('post')) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The area could not be saved. Please, try again.'));
        }
        $empresas = $this->Areas->Empresas->find('all')->where(['Empresas.active' => 1] )->toArray();
        $this->set(compact('area', 'empresas'));
        $this->set('_serialize', ['area']);
    }



    public function anular($id = null)
    {
        $rs_areas = $this->Areas->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Areas->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_areas = $this->Areas->patchEntity($rs_areas, $rs_active);

                if ($this->Areas->save($rs_areas)) {
                    $this->Flash->success(__('El area fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
    {
        $rs_areas = $this->Areas->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 1; 

            $rs_areas = $this->Areas->patchEntity($rs_areas, $rs_active);

                if ($this->Areas->save($rs_areas)) {
                    $this->Flash->success(__('El area fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //Anular y Activar 2 redireccionan a la misma vista donde son usado /Empresas/view/?

    public function anular2($id = null, $idView = null)
    {

        $rs_areas = $this->Areas->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Areas->get($id)); die;
        
        if(is_numeric($id) && ($idView != ''))
        {

            $rs_active['active'] = 2; 

            $rs_areas = $this->Areas->patchEntity($rs_areas, $rs_active);

                if ($this->Areas->save($rs_areas)) {

                    $this->Flash->success(__('El area fue desactivada correctamente.'));
                    
                    return $this->redirect(['controller' => 'Empresas' ,'action' => '/view/' .$idView]);
                    //var_dump($rs_areas); die;
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => '/view/' .$idView]);
    }

    public function activar2($id = null, $idView = null)
    {
        $rs_areas = $this->Areas->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 1; 

            //var_dump($idView); die;
            $rs_areas = $this->Areas->patchEntity($rs_areas, $rs_active);

                if ($this->Areas->save($rs_areas)) {
                    $this->Flash->success(__('El area fue desactivada correctamente.'));

                    return $this->redirect([ 'controller' => 'Empresas' ,'action' => 'view/' .$idView]);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'view']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $area = $this->Areas->patchEntity($area, $this->request->getData());
            if ($this->Areas->save($area)) {
                $this->Flash->success(__('The area has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The area could not be saved. Please, try again.'));
        }
        $empresas = $this->Areas->Empresas->find('all')->where(['Empresas.active' => 1] )->toArray();
        $this->set(compact('area', 'empresas'));
        $this->set('_serialize', ['area']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Area id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $area = $this->Areas->get($id);
        if ($this->Areas->delete($area)) {
            $this->Flash->success(__('The area has been deleted.'));
        } else {
            $this->Flash->error(__('The area could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
