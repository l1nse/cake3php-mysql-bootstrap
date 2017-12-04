<?php
namespace App\Controller;

use App\Controller\AppController;
use DatabaseCon\DatabaseCon;

/**
 * Comprobantes Controller
 *
 * @property \App\Model\Table\ComprobantesTable $Comprobantes
 */
class ComprobantesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $comprobantes = $this->Comprobantes->find('all')->contain(['TipoItems'])->order(['Comprobantes.id' => 'ASC'])->toArray();

        //$this->loadModel('TipoItems');
        //$items = $this->TipoItems->find('all')->order(['name' => 'ASC'])->toArray();

        $this->set(compact('comprobantes' , 'items'));

        $this->set('_serialize', ['comprobantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Comprobante id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comprobante = $this->Comprobantes->get($id, [
            'contain' => ['TipoItems']
        ]);

        $this->set('comprobante', $comprobante);
        $this->set('_serialize', ['comprobante']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comprobante = $this->Comprobantes->newEntity();
        if ($this->request->is('post')) {
            $comprobante = $this->Comprobantes->patchEntity($comprobante, $this->request->getData());
            //var_dump($this->request->getData()); die;
            if ($this->Comprobantes->save($comprobante)) {
                $this->Flash->success(__('The comprobante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else {
                         
                         $x = $comprobante->errors();
                         if ($x) {
                          debug($comprobante);
                          debug($x);
                          return false;
                         }                
                         die;
                         
            }
            $this->Flash->error(__('The comprobante could not be saved. Please, try again.'));
        }

            require_once(ROOT . '/src' . DS  . 'Sqlserver' . DS . 'DatabaseCon.php');
            $db = new DatabaseCon;
            $db->getInstance();


            //$sql =  "SELECT CodAux, NomAux, RutAux FROM softland.cwtauxi WHERE CONCAT(LOWER(LTRIM(RTRIM(NomAux))), REPLACE(REPLACE(RutAux, '.', ''), '-', '')) LIKE LOWER(LTRIM(RTRIM('%".$nombre."%'))) AND ActAux = 'S'";

            $sql = "SELECT PCCODI, PCDESC FROM softland.cwpctas";


            $numeroCuenta = $db->doQuery($sql);
            //var_dump($numeroCuenta); die;

            $sql = "SELECT  CodDoc, DesDoc FROM         softland.cwttdoc";

            $tipoDocumento = $db->doQuery($sql);

            $this->loadModel('TipoItems');
            $items = $this->TipoItems->find('all')->order(['name' => 'ASC'])->toArray();
                    


        $this->set(compact('comprobante' , 'numeroCuenta' , 'tipoDocumento', 'items'));
        $this->set('_serialize', ['comprobante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comprobante id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comprobante = $this->Comprobantes->get($id, [
            'contain' => ['TipoItems']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comprobante = $this->Comprobantes->patchEntity($comprobante, $this->request->getData());
            if ($this->Comprobantes->save($comprobante)) {
                $this->Flash->success(__('The comprobante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comprobante could not be saved. Please, try again.'));
        }

         require_once(ROOT . '/src' . DS  . 'Sqlserver' . DS . 'DatabaseCon.php');
            $db = new DatabaseCon;
            $db->getInstance();


            //$sql =  "SELECT CodAux, NomAux, RutAux FROM softland.cwtauxi WHERE CONCAT(LOWER(LTRIM(RTRIM(NomAux))), REPLACE(REPLACE(RutAux, '.', ''), '-', '')) LIKE LOWER(LTRIM(RTRIM('%".$nombre."%'))) AND ActAux = 'S'";

            $sql = "SELECT PCCODI, PCDESC FROM softland.cwpctas";
            $numeroCuenta = $db->doQuery($sql);
            //var_dump($numeroCuenta); die;

            $sql = "SELECT CodDoc, DesDoc FROM softland.cwttdoc";

            $tipoDocumento = $db->doQuery($sql);

            $this->loadModel('TipoItems');
            $items = $this->TipoItems->find('all')->order(['name' => 'ASC'])->toArray();

        $this->set(compact('comprobante' , 'numeroCuenta','tipoDocumento','items'));
        $this->set('_serialize', ['comprobante']);
    }

     public function anular($id = null)
    {
        $rs_comprobante = $this->Comprobantes->get($id,[
            'contain' => []
        ]);
        //var_dump($this->Users->get($id)); die;

        if(is_numeric($id))
        {
            $rs_active['active'] = 2; 

            $rs_comprobante = $this->Comprobantes->patchEntity($rs_comprobante, $rs_active);

                if ($this->Comprobantes->save($rs_comprobante)) {
                    $this->Flash->success(__('La entidad fue desactivada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->success(__('Por favor intente nuevamente!.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function activar($id = null)
         {
            $rs_comprobante = $this->Comprobantes->get($id,[
                'contain' => []
            ]);
            //var_dump($this->Users->get($id)); die;

            if(is_numeric($id))
            {
                $rs_active['active'] = 1; 

                $rs_comprobante = $this->Comprobantes->patchEntity($rs_comprobante, $rs_active);

                    if ($this->Comprobantes->save($rs_comprobante)) {
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
     * @param string|null $id Comprobante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comprobante = $this->Comprobantes->get($id);
        if ($this->Comprobantes->delete($comprobante)) {
            $this->Flash->success(__('The comprobante has been deleted.'));
        } else {
            $this->Flash->error(__('The comprobante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
