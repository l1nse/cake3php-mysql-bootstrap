<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cargos Controller
 *
 * @property \App\Model\Table\CargosTable $Cargos
 */
class CargosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$this->paginate = [
          //  'contain' => ['Areas']
        //];

        $cargos = $this->Cargos->find('all')
                ->contain(['Areas'] ); 
        $empresa = $this->Cargos->Areas->Empresas->find('all')->toArray();
        //$cargos = $this->paginate($this->Cargos);

        $this->set(compact('cargos','empresa'));
        $this->set('_serialize', ['cargos']);
    }

    /**
     * View method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cargo = $this->Cargos->get($id, [
            'contain' => ['Areas', 'FichaPersonales']
        ]);

          $cargo['created'] = isset($cargo['created']) && $cargo['created']!='' ?  $this->formatDateViewC($cargo['created']) : '';

        $cargo['modified'] = isset($cargo['modified']) && $cargo['modified']!='' ?  $this->formatDateViewC($cargo['modified']) : '';

        $this->set('cargo', $cargo);
        $this->set('_serialize', ['cargo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cargo = $this->Cargos->newEntity();
        if ($this->request->is('post')) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('The cargo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cargo could not be saved. Please, try again.'));
        }

        //$areas = $this->Cargos->Areas->find('list', ['limit' => 200]);

        $empresas = $this->Cargos->Areas->Empresas->find('all')
                        ->contain([])->toArray();

        $areas = $this->Cargos->Areas->find('all')
                        ->contain([])->toArray();

        

        $this->set(compact('cargo','areas' , 'empresas'));
        $this->set('_serialize', ['cargo']);
    }

    public function anular($id = null)
    {
        $rs_cargos = $this->Cargos->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Areas->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_cargos = $this->Cargos->patchEntity($rs_cargos, $rs_active);

                if ($this->Cargos->save($rs_cargos)) {
                    $this->Flash->success(__('El area fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
    {
        $rs_cargos = $this->Cargos->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 1; 

            $rs_cargos = $this->Cargos->patchEntity($rs_cargos, $rs_active);

                if ($this->Cargos->save($rs_cargos)) {
                    $this->Flash->success(__('El area fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cargo = $this->Cargos->get($id, [
            'contain' => []
        ]);

        $this->loadModel('Areas');
        $this->loadModel('Empresas');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $cargo = $this->Cargos->patchEntity($cargo, $this->request->getData());
            if ($this->Cargos->save($cargo)) {
                $this->Flash->success(__('The cargo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cargo could not be saved. Please, try again.'));
        }
        $areas = $this->Areas->find('all')
                        ->contain(['Empresas'])->toArray();

        //$areas = $this->Cargos->Areas->find('all')->contain([])->toArray();

        $this->set(compact('cargo', 'areas'));
        //$this->set('_serialize', ['cargo']);
        $this->set('variable', 1);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cargo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cargo = $this->Cargos->get($id);
        if ($this->Cargos->delete($cargo)) {
            $this->Flash->success(__('The cargo has been deleted.'));
        } else {
            $this->Flash->error(__('The cargo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
