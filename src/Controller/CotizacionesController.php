<?php
namespace App\Controller;
session_start();

use App\Controller\AppController;
use Cake\Network\Session;
use DatabaseCon\DatabaseCon;

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
        /*$this->paginate = [
            'contain' => ['Entidades', 'CanalVentas', 'Users']
        ];
        $cotizaciones = $this->paginate($this->Cotizaciones);*/
        if ($this->request->is('post')) {
            $year   = $this->request->data['year'];
            $month  = $this->request->data['month'];
            $cotizaciones = $this->Cotizaciones->find('all')->contain(['Entidades', 'CanalVentas', 'Users'])->where(['Cotizaciones.active' => 1, 'MONTH(Cotizaciones.created)' => $month, 'YEAR(Cotizaciones.created)' => $year]);
        }else{
            //$cotizaciones = $this->Cotizaciones->find('all')->contain(['Entidades', 'CanalVentas', 'Users'])->where(['Cotizaciones.active' => 1]);
            $cotizaciones = $this->Cotizaciones->find('all')->contain(['Entidades', 'CanalVentas', 'Users'])->where(['Cotizaciones.active' => 1, 'MONTH(Cotizaciones.created)' => date('m'), 'YEAR(Cotizaciones.created)' => date('Y')]);
        }

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
    public function view($folio = null, $id = null)
    {
        $this->loadModel('TipoItems');
        $this->loadModel('TipoCambios');
        $this->loadModel('Entidades');
        $this->loadModel('ItemCotizaciones');
        $this->loadModel('Pasajeros');

        //rescato cotizacion activa
        $rs_cotizacione = $this->Cotizaciones->find('all')->contain(['Entidades', 'CanalVentas', 'Users', 'Pasajeros','ItemCotizaciones' => array('TipoItems', 'TipoCambios')])->where(['Cotizaciones.id' => $id])->toArray();


        $this->set('rs_cotizacione', $rs_cotizacione);
        $this->set('cotizacione', $rs_cotizacione);

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
        
        
        //declarar la variables en false
        $CodAux = false;
        $RutAux = false;
        $NomAux = false;
        $rs_morosidad= false;
        $rs_ventas_year = false;
        $rs_ventas_old = false;

        //var_dump($rs);
        if ($this->request->is('post')) {
            $CodAux = isset($this->request->data['cod_aux']) && $this->request->data['cod_aux']!='' ? $this->request->data['cod_aux'] : '';
            $RutAux = isset($this->request->data['rut_aux']) && $this->request->data['rut_aux']!='' ? $this->request->data['rut_aux'] : '';
            $NomAux = isset($this->request->data['nom_aux']) && $this->request->data['nom_aux']!='' ? $this->request->data['nom_aux'] : '';

            $cuenta_cliente = '1-01-06-001';
            if(is_numeric($CodAux)){

                require_once(ROOT . '/src' . DS  . 'Sqlserver' . DS . 'DatabaseCon.php');
                $db = new DatabaseCon;
                $db->getInstance();

                //query para ver morosidad
                $sql = "SELECT 
                        sum(iw_gsaen.Total) as Valor,
                        count(iw_gsaen.Total) as Total
                     FROM   {oj (((softland.iw_gsaen iw_gsaen 
                     INNER JOIN softland.CWDocSaldos CWDocSaldos ON (iw_gsaen.Folio=CWDocSaldos.MovNumDocRef) AND (iw_gsaen.TtdCod=CWDocSaldos.MovTipDocRef)) 
                     INNER JOIN softland.cwttdoc cwttdoc ON iw_gsaen.TtdCod=cwttdoc.CodDoc) 
                     LEFT OUTER JOIN softland.IW_vsnpDocRef IW_vsnpDocRef ON ((iw_gsaen.Tipo=IW_vsnpDocRef.TipoRef) AND (iw_gsaen.Folio=IW_vsnpDocRef.FolioRef)) AND (iw_gsaen.Fecha=IW_vsnpDocRef.FechaRef)) 
                     INNER JOIN softland.cwtauxi cwtauxi ON CWDocSaldos.CodAux=cwtauxi.CodAux}
                     WHERE  (
                     CWDocSaldos.MovTipDocRef in ('C1', 'C2', 'C3', 'D1', 'D2', 'D3', 'F1', 'F2', 'F3', 'F4', 'RI')) 
                     AND CWDocSaldos.PctCod='".$cuenta_cliente."' 
                     AND CWDocSaldos.CodAux = '".$CodAux."'
                     AND (CWDocSaldos.DEBE - CWDocSaldos.HABER) >0";
                $rs_morosidad = $db->doQuery($sql);

                //query para ver ventas del año en curso
                $sql2 = "SELECT 
                        sum(iw_gsaen.Total) as Valor,
                        count(iw_gsaen.Total) as Total
                     FROM   {oj (((softland.iw_gsaen iw_gsaen 
                     INNER JOIN softland.CWDocSaldos CWDocSaldos ON (iw_gsaen.Folio=CWDocSaldos.MovNumDocRef) AND (iw_gsaen.TtdCod=CWDocSaldos.MovTipDocRef)) 
                     INNER JOIN softland.cwttdoc cwttdoc ON iw_gsaen.TtdCod=cwttdoc.CodDoc) 
                     LEFT OUTER JOIN softland.IW_vsnpDocRef IW_vsnpDocRef ON ((iw_gsaen.Tipo=IW_vsnpDocRef.TipoRef) AND (iw_gsaen.Folio=IW_vsnpDocRef.FolioRef)) AND (iw_gsaen.Fecha=IW_vsnpDocRef.FechaRef)) 
                     INNER JOIN softland.cwtauxi cwtauxi ON CWDocSaldos.CodAux=cwtauxi.CodAux}
                     WHERE  (
                     CWDocSaldos.MovTipDocRef in ('C1', 'C2', 'C3', 'D1', 'D2', 'D3', 'F1', 'F2', 'F3', 'F4', 'RI')) 
                     AND CWDocSaldos.PctCod='".$cuenta_cliente."' 
                     AND CWDocSaldos.CodAux = '".$CodAux."'
                     AND year(iw_gsaen.Fecha) = ".date('Y');
                $rs_ventas_year = $db->doQuery($sql2);

                //query para ver ventas del año en anterior
                $sql3 = "SELECT 
                        sum(iw_gsaen.Total) as Valor,
                        count(iw_gsaen.Total) as Total
                     FROM   {oj (((softland.iw_gsaen iw_gsaen 
                     INNER JOIN softland.CWDocSaldos CWDocSaldos ON (iw_gsaen.Folio=CWDocSaldos.MovNumDocRef) AND (iw_gsaen.TtdCod=CWDocSaldos.MovTipDocRef)) 
                     INNER JOIN softland.cwttdoc cwttdoc ON iw_gsaen.TtdCod=cwttdoc.CodDoc) 
                     LEFT OUTER JOIN softland.IW_vsnpDocRef IW_vsnpDocRef ON ((iw_gsaen.Tipo=IW_vsnpDocRef.TipoRef) AND (iw_gsaen.Folio=IW_vsnpDocRef.FolioRef)) AND (iw_gsaen.Fecha=IW_vsnpDocRef.FechaRef)) 
                     INNER JOIN softland.cwtauxi cwtauxi ON CWDocSaldos.CodAux=cwtauxi.CodAux}
                     WHERE  (
                     CWDocSaldos.MovTipDocRef in ('C1', 'C2', 'C3', 'D1', 'D2', 'D3', 'F1', 'F2', 'F3', 'F4', 'RI')) 
                     AND CWDocSaldos.PctCod='".$cuenta_cliente."' 
                     AND CWDocSaldos.CodAux = '".$CodAux."'
                     AND month(iw_gsaen.Fecha) = ".(date('m'))."
                     AND year(iw_gsaen.Fecha) = ".(date('Y')-1);
                $rs_ventas_old = $db->doQuery($sql3);

            }
        }
        

        $users = $this->Cotizaciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('cotizacione', 'canalVentas', 'users'));
        $this->set('rs_morosidad', $rs_morosidad);
        $this->set('rs_ventas_year', $rs_ventas_year);
        $this->set('rs_ventas_old', $rs_ventas_old);
        $this->set('CodAux', $CodAux);
        $this->set('RutAux', $RutAux);
        $this->set('NomAux', $NomAux);
        $this->set('_serialize', ['cotizacione']);

    }

    public function add2(){
        $cotizacione = $this->Cotizaciones->newEntity();

        var_dump($this->request->getData());
        
        $this->loadModel('TipoItems');
        $this->loadModel('TipoCambios');
        $this->loadModel('Entidades');
        $this->loadModel('ItemCotizaciones');
        $this->loadModel('Pasajeros');
        
        //var_dump($rs);
        if ($this->request->is('post')) {
        }

        $this->set('rs_data', $this->request->getData());
    }
    /**
     * Edit method
     *
     * @param string|null $id Cotizacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($folio = null, $id = null)
    {
        $this->loadModel('TipoItems');
        $this->loadModel('TipoCambios');
        $this->loadModel('Entidades');
        $this->loadModel('ItemCotizaciones');
        $this->loadModel('Pasajeros');

        //rescato cotizacion activa
        $rs_cotizacione = $this->Cotizaciones->find('all')->contain(['Entidades', 'CanalVentas', 'Users', 'Pasajeros','ItemCotizaciones' => array('TipoItems', 'TipoCambios')])->where(['Cotizaciones.id' => $id])->toArray();

        $cotizacione = $this->Cotizaciones->newEntity();

       
        //var_dump($rs);
        if ($this->request->is('post')) {
            
            //rescato codigo auxiliar de softland
            $CodAux = $this->request->data['cod_aux'];
            $hdd_total = $this->request->data['hdd_total'];
            //busco la entidade_id con el codigo auxiliar de softland
            $entidade_id = $this->Entidades->find('all')->where(['codigo_softland' => $CodAux])->toArray();

            $get_data['entidade_id'] = isset($entidade_id[0]->id) && $entidade_id[0]->id!='' ? $entidade_id[0]->id : '';
            //si no tengo los datos asociados, debo asociarlo o si no, no podre crear la cotización
            if($get_data['entidade_id']==''){
                $this->Flash->error(__('El cliente no esta asociada con Softland, favor verifique la información!.'));
            }else{
                //update para desactivar las otras versiones
                $this->Cotizaciones->query()
                ->update()
                ->set(['active' => 2])
                ->where(['folio' => $folio])
                ->execute();

                //preparo el nuevo insert pero con mismo folio
                $get_data['folio'] = $folio;
                $get_data['active'] = 1;
                $get_data['total'] = $hdd_total;
                $get_data['user_id']  = $this->_getUser();
                //guardo cotizacion
                $cotizacione = $this->Cotizaciones->patchEntity($cotizacione, $get_data);
                if ($this->Cotizaciones->save($cotizacione)) {
                    $cotizacione_id =  $cotizacione->id;
                    $rs_pasajeros    = isset($_SESSION['list_pasajero']) ? $_SESSION['list_pasajero'] : '';
                    if(is_array($rs_pasajeros) && count($rs_pasajeros)>0){
                        foreach ($rs_pasajeros as $row) {
                            $rs_pasajero['name']            = $row['nombre'];
                            $rs_pasajero['cotizacione_id']  = $cotizacione_id;
                            $rs_pasajero['active']          = 1;

                            $pasajero = $this->Pasajeros->newEntity();
                            $pasajero = $this->Pasajeros->patchEntity($pasajero, $rs_pasajero);
                            $this->Pasajeros->save($pasajero);
                        }
                    }


                    $rs_items    = isset($_SESSION['list_item']) ? $_SESSION['list_item'] : '';
                    if(is_array($rs_items) && count($rs_items)>0){

                        foreach ($rs_items as $row) {
                            $get_item['cotizacione_id']  = $cotizacione_id;
                            $get_item['tipo_item_id']    = $row['tipo_item'];
                            $get_item['tipo_cambio_id']  = $row['tipo_cambio'];
                            $get_item['descripcion']     = $row['descripcion'];
                            $get_item['valor']           = $row['valor'];                            
                            $get_item['active']          = 1;

                            $itemcotizacione = $this->ItemCotizaciones->newEntity();
                            $itemcotizacione = $this->ItemCotizaciones->patchEntity($itemcotizacione, $get_item);
                            $this->ItemCotizaciones->save($itemcotizacione);
                        }
                    }

                   
                    $this->Flash->success(__('La cotización creada correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
            }

           
            //$this->Flash->error(__('The cotizacione could not be saved. Please, try again.'));
        }else{
            //borro sessiones
            unset($_SESSION['list_pasajero']);
            unset($_SESSION['list_item']);

            //$this->getDetalleCotizacion($id);

        }
        $cotizaciones = $this->Cotizaciones->find('list', ['limit' => 200]);
        
        $canalVentas = $this->Cotizaciones->CanalVentas->find('list', ['limit' => 200]);
        $tipo_item   = $this->TipoItems->find('all')->toArray();
        $tipo_cambio = $this->TipoCambios->find('all')->toArray();

        $users = $this->Cotizaciones->Users->find('list', ['limit' => 200]);
        $this->set(compact('cotizacione', 'canalVentas', 'users'));
        $this->set('_serialize', ['cotizacione']);
        $this->set('tipo_item', $tipo_item);
        $this->set('tipo_cambio', $tipo_cambio);
        $this->set('rs_cotizacione', $rs_cotizacione);
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
            $nombre_pasajero    = $this->request->data['nombre_pasajero'];
            $hdd_cotizacione_id = $this->request->data['hdd_cotizacione_id'];

            $rs_pasajeros      = isset($_SESSION['list_pasajero']) ? $_SESSION['list_pasajero'] : '';

            if($rs_pasajeros!=''){
                //var_dump($rs_pasajeros.' uno'); die;
                $rs_pasajeros[]    = array('nombre' => $nombre_pasajero);
                $_SESSION['list_pasajero'] = $rs_pasajeros;
            }else{
                //var_dump($rs_pasajeros.' dos'); die;
                if($hdd_cotizacione_id!=''){
                    $rs_cotizacione = $this->Cotizaciones->find('all')->contain(['Entidades', 'CanalVentas', 'Users', 'Pasajeros','ItemCotizaciones' => array('TipoItems', 'TipoCambios')])->where(['Cotizaciones.id' => $hdd_cotizacione_id])->toArray();

                    if(is_array($rs_cotizacione[0]['pasajeros']) && count($rs_cotizacione[0]['pasajeros'])>0){
                        //$rs_pasajeros      = isset($_SESSION['list_pasajero']) ? $_SESSION['list_pasajero'] : '';

                        foreach ($rs_cotizacione[0]['pasajeros'] as $row) {
                            $rs_pasajeros[]             = array('nombre' => $row['name']);
                            $_SESSION['list_pasajero']  = $rs_pasajeros;
                        }
                        //$_SESSION['list_pasajero'] = array_values($_SESSION['list_pasajero']);
                    }
                }

                $rs_pasajeros[]    = array('nombre' => $nombre_pasajero);
                $_SESSION['list_pasajero'] = $rs_pasajeros;
            }
            
            $_SESSION['list_pasajero'] = array_values($_SESSION['list_pasajero']);

            $rs_pasajeros      = $_SESSION['list_pasajero'];

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
        $this->session = new Session();
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        if ($this->request->is('post')) {
            //rescato valores
            $id = $this->request->data['id'];
            $rs_pasajeros      = $_SESSION['list_pasajero'];

            //var_dump($this->session->read('list_pasajero').' hola'); die;
            if(is_array($rs_pasajeros) && count($rs_pasajeros)>0){
                $c = 0;
                foreach ($rs_pasajeros as $row) {
                    if($c == $id){
                        unset($_SESSION['list_pasajero'][$c]);
                    }
                    $c++;
                }

                $_SESSION['list_pasajero'] = array_values($_SESSION['list_pasajero']);
                $rs_pasajeros                = $_SESSION['list_pasajero'];

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
        }else{
            $debug = 'Error!';
        }

        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

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
            $hdd_cotizacione_id = $this->request->data['hdd_cotizacione_id'];

            $list_item      = isset($_SESSION['list_item']) ? $_SESSION['list_item'] : '';

            if($list_item!=''){
                $list_item[] = array('tipo_item' => $tipo_item, 'tipo_cambio' => $tipo_cambio, 'valor' => $valor, 'descripcion' => $descripcion); 
                $_SESSION['list_item'] = $list_item;
            }else{
                $rs_cotizacione = $this->Cotizaciones->find('all')->contain(['Entidades', 'CanalVentas', 'Users', 'Pasajeros','ItemCotizaciones' => array('TipoItems', 'TipoCambios')])->where(['Cotizaciones.id' => $hdd_cotizacione_id])->toArray();
                //inicio las variables del carrito de session de lista item/concepto
                if($hdd_cotizacione_id!=''){
                    if(is_array($rs_cotizacione[0]['item_cotizaciones']) && count($rs_cotizacione[0]['item_cotizaciones'])>0){
                        $list_item      = isset($_SESSION['list_item']) ? $_SESSION['list_item'] : '';

                        foreach ($rs_cotizacione[0]['item_cotizaciones'] as $row) {
                            $list_item[]             = array('tipo_item' => $row['tipo_item_id'], 'tipo_cambio' => $row['tipo_cambio_id'], 'valor' => $row['valor'], 'descripcion' => $row['descripcion']);
                            $_SESSION['list_item']  = $list_item;
                        }
                        //$_SESSION['list_item'] = array_values($_SESSION['list_item']);
                        
                    }
                }
                
                $list_item[] = array('tipo_item' => $tipo_item, 'tipo_cambio' => $tipo_cambio, 'valor' => $valor, 'descripcion' => $descripcion); 
                $_SESSION['list_item'] = $list_item;
            }
            
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

        $content = json_encode(array('result' => $result, 'debug' => $list_item, 'html' => $html, 'total' => $total));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    public function delItems(){
        $this->autoRender = false;
        $this->session = new Session();

        $result = false;
        $debug  = false;
        $html = false;
        $total = false;
        $this->loadModel('TipoCambios');
        $this->loadModel('TipoItems');

        if ($this->request->is('post')) {
            //rescato valores
            $id      = $this->request->data['id'];

            //var_dump($this->session->read('list_item')); die;

            $list_item      = isset($_SESSION['list_item']) ? $_SESSION['list_item'] : $this->session->read('list_item');
            //var_dump($_SESSION); die;

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

        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html, 'total' => $total));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    public function listVersiones(){
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        if ($this->request->is('post')) {
            $folio = $this->request->data['folio'];
            if(is_numeric($folio)){
                $rs_cotizacione = $this->Cotizaciones->find('all')->contain(['Entidades', 'CanalVentas', 'Users', 'Pasajeros','ItemCotizaciones' => array('TipoItems', 'TipoCambios')])->where(['Cotizaciones.folio' => $folio])->order(['Cotizaciones.id' => 'ASC'])->toArray();

                if(is_array($rs_cotizacione) && count($rs_cotizacione)>0){
                    $result = true;
                    $html .= '<div class="table-responsive"><table class="table table-bordered table-striped ">';
                    $html .= '<thead>';
                    $html .= '<tr>';
                    $html .= '<th style="text-align: center;">N° Versión</th>';
                    $html .= '<th style="text-align: center;">Fecha</th>';
                    $html .= '<th style="text-align: center;">Usuario</th>';
                    $html .= '<th style="text-align: center;">Cantidad Pasajeros</th>';
                    $html .= '<th style="text-align: center;">Cantidad Item Cotizados</th>';
                    //$html .= '<th style="text-align: center;">Descripción</th>';
                    $html .= '<th style="text-align: center;">Acciones</th>';
                    $html .= '</tr>';
                    $html .= '</thead>';
                    $html .= '<tbody>';
                    $i = 1;
                    foreach ($rs_cotizacione as $row) {
                        $date = $row['created'];

                        $html .= '<tr>';
                        $html .= '<td style="text-align: center;">'.$i.'</td>';
                        $html .= '<td style="text-align: center;">'.$date->format('d/m/Y').'</td>';
                        $html .= '<td style="text-align: center;">'.$row['user']['name'].' '.$row['user']['apellido1'].' '.$row['user']['apellido2'].'</td>';
                        $html .= '<td style="text-align: center;">'.count($row['pasajeros']) .'</td>';
                        $html .= '<td style="text-align: center;">'.count($row['item_cotizaciones']).'</td>';
                        $html .= '<td style="text-align: center;">
                                    <a class="btn btn-primary btn-xs" href="'.APP_URI.'cotizaciones/view/'.$folio.'/'.$row['id'] .'" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                                    <a class="btn btn-warning btn-xs" href="'.APP_URI.'cotizaciones/edit/'.$folio.'/'.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                                </td>';
                        $html .= '</tr>';
                        $i++;
                    }

                    $html .= '</tbody>';
                    $html .= '</table></div>';

                }
            }
        }


        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;

    }
}
