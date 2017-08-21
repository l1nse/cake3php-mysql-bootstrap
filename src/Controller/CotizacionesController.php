<?php
//use App\Sqlserver\DatabaseCon;
namespace App\Controller;
session_start();
//require_once(ROOT . '/vendor' . DS  . 'sql_server' . DS . 'database.php');
//namespace Database\Database;

use App\Controller\AppController;
use Cake\Network\Session;use DatabaseCon\DatabaseCon;


/**
 * Cotizaciones Controller
 *
 * @property \App\Model\Table\CotizacionesTable $Cotizaciones
 */


class CotizacionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cotizaciones', 'Entidades', 'CanalVentas', 'Users']
        ];
        $cotizaciones = $this->paginate($this->Cotizaciones);

        $this->set(compact('cotizaciones'));
        $this->set('_serialize', ['cotizaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Cotizacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cotizacione = $this->Cotizaciones->get($id, [
            'contain' => ['Cotizaciones', 'Entidades', 'CanalVentas', 'Users']
        ]);

        $this->set('cotizacione', $cotizacione);
        $this->set('_serialize', ['cotizacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $cotizacione = $this->Cotizaciones->newEntity();
        
        $this->loadModel('TipoItems');
        $this->loadModel('TipoCambios');
        /*require_once(ROOT . '/src' . DS  . 'Sqlserver' . DS . 'DatabaseCon.php');
        $db = new DatabaseCon;
        $db->getInstance();


        $sql = 'select top 10 * from softland.cwtauxi';
        
        $rs = $db->doQuery($sql);

        $this->set('softland', $rs);*/
        //var_dump($rs);
        if ($this->request->is('post')) {
            $cotizacione = $this->Cotizaciones->patchEntity($cotizacione, $this->request->getData());
            //var_dump($_SESSION); die;
            if ($this->Cotizaciones->save($cotizacione)) {
                $this->Flash->success(__('La cotización creada correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cotizacione could not be saved. Please, try again.'));
        }else{
            unset($_SESSION['nombre_pasajero']);
            unset($_SESSION['list_item']);
        }
        $cotizaciones = $this->Cotizaciones->Cotizaciones->find('list', ['limit' => 200]);
        
        $canalVentas = $this->Cotizaciones->CanalVentas->find('list', ['limit' => 200]);
        $tipo_item   = $this->TipoItems->find('all')->toArray();
        $tipo_cambio = $this->TipoCambios->find('all')->toArray();

        $users = $this->Cotizaciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('cotizacione', 'cotizaciones', 'canalVentas', 'users'));
        $this->set('_serialize', ['cotizacione']);
        $this->set('tipo_item', $tipo_item);
        $this->set('tipo_cambio', $tipo_cambio);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cotizacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cotizacione = $this->Cotizaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cotizacione = $this->Cotizaciones->patchEntity($cotizacione, $this->request->getData());
            if ($this->Cotizaciones->save($cotizacione)) {
                $this->Flash->success(__('The cotizacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cotizacione could not be saved. Please, try again.'));
        }
        $cotizaciones = $this->Cotizaciones->Cotizaciones->find('list', ['limit' => 200]);
        $entidades = $this->Cotizaciones->Entidades->find('list', ['limit' => 200]);
        $canalVentas = $this->Cotizaciones->CanalVentas->find('list', ['limit' => 200]);
        $users = $this->Cotizaciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('cotizacione', 'cotizaciones', 'entidades', 'canalVentas', 'users'));
        $this->set('_serialize', ['cotizacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cotizacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cotizacione = $this->Cotizaciones->get($id);
        if ($this->Cotizaciones->delete($cotizacione)) {
            $this->Flash->success(__('The cotizacione has been deleted.'));
        } else {
            $this->Flash->error(__('The cotizacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function listAuxiliar(){
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        if ($this->request->is('post')) {
            $nombre = $this->request->data['nombre'];
            require_once(ROOT . '/src' . DS  . 'Sqlserver' . DS . 'DatabaseCon.php');
            $db = new DatabaseCon;
            $db->getInstance();


            //$sql = 'select * from softland.cwtauxi where REPLACE(REPLACE(RutAux, '.', ''), '-', '') LIKE '%179%'';
            $sql =  "SELECT CodAux, NomAux, RutAux FROM softland.cwtauxi WHERE CONCAT(LOWER(LTRIM(RTRIM(NomAux))), REPLACE(REPLACE(RutAux, '.', ''), '-', '')) LIKE LOWER(LTRIM(RTRIM('%".$nombre."%'))) AND ActAux = 'S'";
            $rs = $db->doQuery($sql);

            if(is_array($rs) && count($rs)>0){
                $result = true;
                $html .= '<div class="table-responsive"><table class="table table-bordered table-striped ">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th style="text-align: center;">Codigo Softland</th>';
                $html .= '<th style="text-align: center;">RUT</th>';
                $html .= '<th style="text-align: center;">Nombre/Razón Social</th>';
                $html .= '<th style="text-align: center;">Acciones</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                foreach ($rs as $row) {
                    $html .= '<tr>';
                    $html .= '<td style="text-align: center;">'.$row['CodAux'] .'</td>';
                    $html .= '<td style="text-align: center;">'.$row['RutAux'] .'</td>';
                    $html .= '<td>'.$row['NomAux'] .'</td>';
                    $html .= '<td style="text-align: center;"><a class="btn btn-success btn-xs" href="javascript:cargarCliente(\''.$row['CodAux'].'\', \''.$row['RutAux'].'\', \''.$row['NomAux'].'\')" data-toggle="tooltip"  data-toggle="tooltip" data-placement="left" title="Seleccionar"><i class="glyphicon glyphicon-ok"></i></a></td>';
                    $html .= '</tr>';
                }
                $html .= '</tbody>';
                $html .= '</table></div>';
            }else{
                $debug  = 'No existen datos asociados!';
            }

        }

        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    public function listPasajeros(){
        //session_start();
        //$this->session = new Session();
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        if ($this->request->is('post')) {
            //rescato valores
            $nombre_pasajero = $this->request->data['nombre_pasajero'];

            $rs_pasajeros      = isset($_SESSION['nombre_pasajero']) ? $_SESSION['nombre_pasajero'] : '';
            //$rs_pasajeros      = $this->session->read('nombre_pasajero');
            $rs_pasajeros[]    = array('nombre' => $nombre_pasajero);
            //$this->session->write('nombre_pasajero', $rs_pasajeros); 
            $_SESSION['nombre_pasajero'] = $rs_pasajeros;
            //$rs_pasajeros      = $this->session->read('nombre_pasajero');
            
            $_SESSION['nombre_pasajero'] = array_values($_SESSION['nombre_pasajero']);

            $rs_pasajeros      = $_SESSION['nombre_pasajero'];

            //var_dump($rs_pasajeros); die;
            if(is_array($rs_pasajeros) && count($rs_pasajeros)>0){
                $result = true;
                $html .= '<div class="table-responsive"><table class="table table-bordered table-striped ">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th style="text-align: center;">N°</th>';
                $html .= '<th style="text-align: center;">Nombre Pasajero</th>';
                $html .= '<th style="text-align: center;">Acciones</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $i = 1;
                $contador = 0;
                foreach ($rs_pasajeros as $row) {
                    $html .= '<tr>';
                    $html .= '<td style="text-align: center;">'.$i.'</td>';
                    $html .= '<td>'.$row['nombre'].'</td>';
                    $html .= '<td style="text-align: center;"><a class="btn btn-danger btn-xs" href="javascript:delPasajero(\''.$contador.'\')" data-toggle="tooltip"  data-toggle="tooltip" data-placement="left" title="Seleccionar"><i class="glyphicon glyphicon-trash"></i></a></td>';
                    $html .= '</tr>';
                    $i++;
                    $contador++;
                }
                $html .= '</tbody>';
                $html .= '</table></div>';
            }
        }

        $content = json_encode(array('result' => $result, 'debug' => $rs_pasajeros, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;

    }

    public function delPasajeros(){
        //session_start();
        //$this->session = new Session();
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        if ($this->request->is('post')) {
            //rescato valores
            $id = $this->request->data['id'];
            $rs_pasajeros      = $_SESSION['nombre_pasajero'];

            //var_dump($rs_pasajeros); die;
            if(is_array($rs_pasajeros) && count($rs_pasajeros)>0){
                $c = 0;
                foreach ($rs_pasajeros as $row) {
                    if($c == $id){
                        unset($_SESSION['nombre_pasajero'][$c]);
                    }
                    $c++;
                }

                $_SESSION['nombre_pasajero'] = array_values($_SESSION['nombre_pasajero']);
                $rs_pasajeros                = $_SESSION['nombre_pasajero'];

                $result = true;
                $html .= '<div class="table-responsive"><table class="table table-bordered table-striped ">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th style="text-align: center;">N°</th>';
                $html .= '<th style="text-align: center;">Nombre Pasajero</th>';
                $html .= '<th style="text-align: center;">Acciones</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $i = 1;
                $contador = 0;
                foreach ($rs_pasajeros as $row) {
                    $html .= '<tr>';
                    $html .= '<td style="text-align: center;">'.$i.'</td>';
                    $html .= '<td>'.$row['nombre'].'</td>';
                    $html .= '<td style="text-align: center;"><a class="btn btn-danger btn-xs" href="javascript:delPasajero(\''.$contador.'\')" data-toggle="tooltip"  data-toggle="tooltip" data-placement="left" title="Seleccionar"><i class="glyphicon glyphicon-trash"></i></a></td>';
                    $html .= '</tr>';
                    $i++;
                    $contador++;
                }
                $html .= '</tbody>';
                $html .= '</table></div>';
            }
        }

        $content = json_encode(array('result' => $result, 'debug' => $rs_pasajeros, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    public function addItems(){
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        $this->loadModel('TipoCambios');
        $this->loadModel('TipoItems');

        if ($this->request->is('post')) {
            //rescato valores
            $tipo_item      = $this->request->data['tipo_item'];
            $tipo_cambio    = $this->request->data['tipo_cambio'];
            $valor          = $this->request->data['valor'];
            $descripcion    = $this->request->data['descripcion'];

            $list_item      = isset($_SESSION['list_item']) ? $_SESSION['list_item'] : '';
            //$rs_pasajeros      = $this->session->read('nombre_pasajero');
            $list_item[] = array('tipo_item' => $tipo_item, 'tipo_cambio' => $tipo_cambio, 'valor' => $valor, 'descripcion' => $descripcion);
            //$this->session->write('nombre_pasajero', $rs_pasajeros); 
            $_SESSION['list_item'] = $list_item;
            //$rs_pasajeros      = $this->session->read('nombre_pasajero');
            
            $_SESSION['list_item'] = array_values($_SESSION['list_item']);

            $list_item      = $_SESSION['list_item'];

            //var_dump($rs_pasajeros); die;
            if(is_array($list_item) && count($list_item)>0){
                $result = true;
                $html .= '<div class="table-responsive"><table class="table table-bordered table-striped ">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th style="text-align: center;">N°</th>';
                $html .= '<th style="text-align: center;">Item</th>';
                $html .= '<th style="text-align: center;">Tipo Cambio</th>';
                $html .= '<th style="text-align: center;">Valor</th>';
                //$html .= '<th style="text-align: center;">Descripción</th>';
                $html .= '<th style="text-align: center;">Acciones</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $i = 1;
                $contador = 0;
                $total = 0;
                foreach ($list_item as $row) {
                    $rs_tipo_item = $this->TipoItems->find('all')->where(['id' => $row['tipo_item']])->toArray();
                    $rs_tipo_cambio = $this->TipoCambios->find('all')->where(['id' => $row['tipo_cambio']])->toArray();
                    //var_dump($rs_tipo_item);
                     if($contador=='0'){
                        $total = $row['valor'];
                    }else{
                        $total = $row['valor']+$total;
                    }

                    $html .= '<tr>';
                    $html .= '<td style="text-align: center;">'.$i.'</td>';
                    $html .= '<td>'.$rs_tipo_item[0]['name'] .'</td>';
                    $html .= '<td style="text-align: center;">'.$rs_tipo_cambio[0]['name'].'</td>';
                    $html .= '<td style="text-align: center;">'.$row['valor'].'</td>';
                    //$html .= '<td>'.$row['descripcion'].'</td>';
                    $html .= '<td style="text-align: center;"><a class="btn btn-danger btn-xs" href="javascript:delItem(\''.$contador.'\')" data-toggle="tooltip"  data-toggle="tooltip" data-placement="left" title="Seleccionar"><i class="glyphicon glyphicon-trash"></i></a></td>';
                    $html .= '</tr>';
                    $i++;
                    $contador++;
                }
                $html .= '<tr>';
                $html .= '<td colspan="3" style="text-align: right;"><b>Sub Total</b></td>';
                $html .= '<td style="text-align: center;"><b>'.$total.'</b></td>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table></div>';
            }
        }

        $content = json_encode(array('result' => $result, 'debug' => $list_item, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    public function delItems(){
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        $this->loadModel('TipoCambios');
        $this->loadModel('TipoItems');

        if ($this->request->is('post')) {
            //rescato valores
            $id      = $this->request->data['id'];
            $list_item      = $_SESSION['list_item'];

            //var_dump($rs_pasajeros); die;
            if(is_array($list_item) && count($list_item)>0){
                $c = 0;
                foreach ($list_item as $row) {
                    if($c == $id){
                        unset($_SESSION['list_item'][$c]);
                    }
                    $c++;
                }
                $_SESSION['list_item'] = array_values($_SESSION['list_item']);
                $list_item                = $_SESSION['list_item'];

                $result = true;
                $html .= '<div class="table-responsive"><table class="table table-bordered table-striped ">';
                $html .= '<thead>';
                $html .= '<tr>';
                $html .= '<th style="text-align: center;">N°</th>';
                $html .= '<th style="text-align: center;">Item</th>';
                $html .= '<th style="text-align: center;">Tipo Cambio</th>';
                $html .= '<th style="text-align: center;">Valor</th>';
                //$html .= '<th style="text-align: center;">Descripción</th>';
                $html .= '<th style="text-align: center;">Acciones</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';
                $i = 1;
                $contador = 0;
                $total = 0;
                foreach ($list_item as $row) {

                    $rs_tipo_item = $this->TipoItems->find('all')->where(['id' => $row['tipo_item']])->toArray();
                    $rs_tipo_cambio = $this->TipoCambios->find('all')->where(['id' => $row['tipo_cambio']])->toArray();
                    //var_dump($rs_tipo_item);
                    if($contador=='0'){
                        $total = $row['valor'];
                    }else{
                        $total = $row['valor']+$total;
                    }
                    
                    $html .= '<tr>';
                    $html .= '<td style="text-align: center;">'.$i.'</td>';
                    $html .= '<td>'.$rs_tipo_item[0]['name'] .'</td>';
                    $html .= '<td style="text-align: center;">'.$rs_tipo_cambio[0]['name'].'</td>';
                    $html .= '<td style="text-align: center;">'.$row['valor'].'</td>';
                    //$html .= '<td>'.$row['descripcion'].'</td>';
                    $html .= '<td style="text-align: center;"><a class="btn btn-danger btn-xs" href="javascript:delItem(\''.$contador.'\')" data-toggle="tooltip"  data-toggle="tooltip" data-placement="left" title="Seleccionar"><i class="glyphicon glyphicon-trash"></i></a></td>';
                    $html .= '</tr>';
                    $i++;
                    $contador++;
                }
                $html .= '<tr>';
                $html .= '<td colspan="3" style="text-align: right;"><b>Sub Total</b></td>';
                $html .= '<td style="text-align: center;"><b>'.$total.'</b></td>';
                $html .= '</tr>';
                $html .= '</tbody>';
                $html .= '</table></div>';
            }
        }

        $content = json_encode(array('result' => $result, 'debug' => $list_item, 'html' => $html, 'total' => $total));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }
}
