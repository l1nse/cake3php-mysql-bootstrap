<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * Bsps Controller
 *
 * @property \App\Model\Table\BspsTable $Bsps
 */
//App::import('Vendor', 'php-excel-reader/excel_reader2');
require_once(ROOT . DS . 'vendor' . DS ."spreadsheet-reader-master". DS . "SpreadsheetReader.php");
//require_once(ROOT . DS . 'vendor' . DS ."spreadsheet-reader-master". DS ."php-excel-reader" . DS . "excel_reader2.php");
//require_once(ROOT . DS . 'vendor' . DS . "PHPExcel-1.8" . DS ."Classes". DS . "PHPExcel.php");

class BspsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    
    


    public function index()
    {
        /*$this->paginate = [
            'contain' => ['Users']
        ];
        $bsps = $this->paginate($this->Bsps);*/
        //phpinfo();die;
        $bsps2 = array();
        if ($this->request->is('post')) {
            $conn = ConnectionManager::get('default');

            //$bsps = $this->Bsps->find('all')->where(['year'=> $this->request->data['year'], 'month' => $this->request->data['month']])->toArray();

            //var_dump($bsps); die;
            $sql_bsp = "
                SELECT 
                    bs.document,
                    bs.type_document,
                    bs.issue_date,
                    bs.net_to_be_paid,
                    tc.factura,
                    tc.ficha,
                    tc.moneda,
                    tc.utilidad_clp,
                    tc.utilidad_usd,
                    bs.billing_period,
                    bs.std_comm_amount,
                    bs.suppl_comm_amount 
                FROM bsps AS bs
                LEFT JOIN ticket_control AS tc ON (bs.document = tc.ticket)
                WHERE bs.year = ".$this->request->data['year']."
                AND bs.month = ".$this->request->data['month']."
                Order by bs.document asc
            ";
            $stmt_bsp = $conn->execute($sql_bsp);
            //echo $sql_dt; die;
            $bsps = $stmt_bsp ->fetchAll('assoc');
            

            if(is_array($bsps) && count($bsps)>0){
                $list_bsp = array();
                foreach ($bsps as $row) {
                    $list_bsp['document']       = $row['document'];
                    $list_bsp['type_document']  = $row['type_document'];
                    $list_bsp['billing_period'] = $row['billing_period'];
                    $list_bsp['issue_date']     = isset($row['issue_date']) && trim($row['issue_date'])!='' ?  $this->formatDateViewB($row['issue_date']) : '';
                    $list_bsp['utilidad']       = $row['std_comm_amount']+$row['suppl_comm_amount'];
                    $list_bsp['net_to_be_paid'] = $row['net_to_be_paid'];
                    $list_bsp['factura']        = $row['factura'];

                    
                    $sql_dt = "SELECT * FROM `abril` WHERE `ticket` = '".$row['document']."'";
                    $stmt_dt = $conn->execute($sql_dt);
                    //echo $sql_dt; die;
                    $rs_dt = $stmt_dt ->fetchAll('assoc');

                    if(is_array($rs_dt) & count($rs_dt)>0){
                        foreach ($rs_dt as $value) {

                            $list_bsp['f_emision_a']        = $value['fecha_emision'];
                            $list_bsp['negocio_a']          = $value['negocio'];
                            $list_bsp['tipo_factura_a']     = $value['tipo_factura'];
                            $list_bsp['factura_cliente_a']  = $value['factura_cliente'];
                            $list_bsp['plazo_a']            = $value['plazo'];
                            $list_bsp['rut_a']              = $value['rut'];
                            $list_bsp['razon_social_a']     = $value['razon_social'];
                            $list_bsp['direccion_a']        = $value['direccion'];
                            $list_bsp['fecha_ingreso_a']    = isset($value['fecha_ingreso']) && $value['fecha_ingreso']!='' ? $this->formatDateView($value['fecha_ingreso']) : '';
                            $list_bsp['notas_a']            = $value['notas'];
                            $list_bsp['fecha_usuario_emite_a']  = $value['fecha_usuario_emite'];
                            $list_bsp['fecha_usuario_envia_a']  = $value['fecha_usuario_envia'];
                            $factura_cliente_tc = isset($row['factura']) && $row['factura']!='' ? $row['factura'] : (isset($value['factura_cliente']) && $value['factura_cliente']!='' ? $value['factura_cliente'] : '');

                            $rut = explode('-', $value['rut']); 

                            /*if(strlen($rut[0])=='7'){
                                $rut = substr($rut[0], 1,1).'.'.substr($rut[0], 2,3).'.'.substr($rut[0], 4,3).'-'.$rut[1];
                            }elseif(strlen($rut[0])=='8'){
                                $rut = substr($rut[0], 1,2).'.'.substr($rut[0], 3,3).'.'.substr($rut[0], 5,3).'-'.$rut[1];
                            }*/
                           
                            if(is_numeric($factura_cliente_tc)){
                                $sql_sof = "SELECT *  FROM `softland` where Folio = '".$value['factura_cliente']."' And CodAux = '".$rut[0]."' ";
                                $stmt_sof = $conn->execute($sql_sof);
                                $rs_sof = $stmt_sof ->fetchAll('assoc');
                                //echo $sql_sof; die;
                                //var_dump($rs_sof); die;
                                if(is_array($rs_sof) && count($rs_sof)>0){
                                    foreach ($rs_sof as $row2) {
                                        $list_bsp['glosa']          = isset($row2['glosa']) && $row2['glosa']!='' ? $row2['glosa'] : '';
                                        $list_bsp['codaux']          = isset($row2['codaux']) && $row2['codaux']!='' ? $row2['codaux'] : '';
                                        //$list_bsp['Fecha_s']        = date('d-m-Y', $this->ExcelDateToDate($row2['Fecha'])) ;
                                        $list_bsp['Fecha_s']        = str_replace('/', '-', $row2['Fecha']);
                                        //$list_bsp['FechaVenc_s']    = date('d-m-Y', $this->ExcelDateToDate($row2['FechaVenc']));
                                        //$list_bsp['FecPag_s']       = date('d-m-Y', $this->ExcelDateToDate($row2['FecPag']));
                                        $list_bsp['FecPag_s']       = str_replace('/', '-', $row2['FecPag']);
                                        $list_bsp['ValorFactura_s'] = $row2['ValorFactura'];
                                        $list_bsp['ValorPagado_s']  = $row2['ValorPagado'];
                                        $list_bsp['delta_utilidad'] = trim($row2['ValorFactura'])!='' && trim($row2['ValorFactura'])!='0' && trim($row['net_to_be_paid'])!='0' && trim($row['net_to_be_paid'])!='' ? ($row2['ValorFactura'] - $row['net_to_be_paid']) : '0';
                                        array_push($bsps2, $list_bsp);
                                    }
                                }else{
                                    $list_bsp['glosa']          = '';
                                    $list_bsp['codaux']         = '';
                                    $list_bsp['Fecha_s']        = '';
                                    $list_bsp['FechaVenc_s']    = '';
                                    $list_bsp['FecPag_s']       = '';
                                    $list_bsp['ValorFactura_s'] = '';
                                    $list_bsp['ValorPagado_s']  = '';
                                    $list_bsp['delta_utilidad'] = '';
                                    array_push($bsps2, $list_bsp);
                                }
                            }else{
                                $list_bsp['glosa']          = '';
                                $list_bsp['codaux']         = '';
                                $list_bsp['Fecha_s']        = '';
                                $list_bsp['FechaVenc_s']    = '';
                                $list_bsp['FecPag_s']       = '';
                                $list_bsp['ValorFactura_s'] = '';
                                $list_bsp['ValorPagado_s']  = '';
                                $list_bsp['delta_utilidad'] = '';
                                array_push($bsps2, $list_bsp);
                            }
                            

                        }
                    }else{
                        //abril

                        $list_bsp['f_emision_a']        = '';
                        $list_bsp['negocio_a']          = '';
                        $list_bsp['tipo_factura_a']     = '';
                        $list_bsp['factura_cliente_a']  = '';
                        $list_bsp['plazo_a']            = '';
                        $list_bsp['rut_a']              = '';
                        $list_bsp['razon_social_a']     = '';
                        $list_bsp['direccion_a']        = '';
                        $list_bsp['fecha_ingreso_a']    = '';
                        $list_bsp['notas_a']            = '';
                        $list_bsp['fecha_usuario_emite_a']  = '';
                        $list_bsp['fecha_usuario_envia_a']  = '';
                        //softland
                        $list_bsp['glosa']          = '';
                        $list_bsp['codaux']         = '';
                        $list_bsp['Fecha_s']        = '';
                        $list_bsp['FechaVenc_s']    = '';
                        $list_bsp['FecPag_s']       = '';
                        $list_bsp['ValorFactura_s'] = '';
                        $list_bsp['ValorPagado_s']  = '';
                        array_push($bsps2, $list_bsp);
                    }
                    //var_dump($rs_dt); die;
                }
            }
        }

        //$this->set(compact('bsps'));
        $this->set('bsps', $bsps2);
        $this->set('_serialize', ['bsps']);
    }

    /**
     * View method
     *
     * @param string|null $id Bsp id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bsp = $this->Bsps->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('bsp', $bsp);
        $this->set('_serialize', ['bsp']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $Uploads = new UploadsController;
        $this->loadModel('Archives');
        
        //$rs_excel = ROOT . DS . 'vendor' . DS . "php-excel-reader" . DS . "excel_reader2.php";
        //echo $rs_excel;
        $bsp = false;
        if ($this->request->is('post')) {

            if (isset($this->request['data']['file_bsp']) && $this->request['data']['file_bsp']['name']!="") {
                $adjunto  = $this->request['data']['file_bsp'];
                
                $resultadoSubida = $Uploads->compruebaFichero($adjunto);

                if ($resultadoSubida[0]){
                    //upload archive
                    $adjunto_ticket  = $Uploads->subidaArchivo(1,'adjunto_bsp',$adjunto);
                    //save tabla Archive
                    $getArchives['name']  = $adjunto_ticket['name_file'];
                    $getArchives['url']  = $adjunto_ticket['path_file'];
                    $getArchives['active']  = 1;

                    $archive = $this->Archives->newEntity();
                    $archive = $this->Archives->patchEntity($archive, $getArchives);
                    if($this->Archives->save($archive)){
                        //$ulr_file =  APP_URI.'uploads/descarga/bsp/'.$getArchives['name'];
                        $ulr_file = ROOT.DS.'downloads'.DS."bsp".DS.$getArchives['name'];

                        $Reader = new \SpreadsheetReader($ulr_file);
                        $Sheets = $Reader->Sheets();

                        foreach ($Sheets as $Index => $Name){
                            //echo 'Sheet #'.$Index.': '.$Name;

                            $Reader->ChangeSheet($Index);

                            $i=0;
                            foreach ($Reader as $row){
                                if($i>7){
                                    //echo $row[4];
                                    //echo strlen($row[4]); die;
                                    if(strlen(trim($row[4]))<10){
                                        $fecha = '0'.$row[4];
                                    }
                                    //echo $fecha; die;

                                    $rs_data['user_id']             = $this->_getUser();
                                    $rs_data['document']            = isset($row[0]) && $row[0]!='' ? (int)$row[0] : '';
                                    $rs_data['cd']                  = isset($row[1]) && $row[1]!='' ? (int)$row[1] : '';
                                    $rs_data['type_document']       = isset($row[2]) && $row[2]!='' ? $row[2] : '';
                                    $rs_data['agent_code']          = isset($row[3]) && $row[3]!='' ? (int)$row[3] : '';
                                    $rs_data['billing_period']      = isset($row[4]) && $row[4]!='' ? $fecha : '';
                                    $rs_data['conjuntion']          = isset($row[5]) && $row[5]!='' ? (int)$row[5] : '';
                                    $rs_data['refunden']            = isset($row[6]) && $row[6]!='' ? $row[6] : '';
                                    $rs_data['related']             = isset($row[7]) && $row[7]!='' ? $row[7] : '';
                                    $rs_data['cpns']                = isset($row[8]) && $row[8]!='' ? $row[8] : '';
                                    $rs_data['nr']                  = isset($row[9]) && $row[9]!='' ? $row[9] : '';
                                    $rs_data['airline_code']        = isset($row[10]) && $row[10]!='' ? $row[10] : '';
                                    $rs_data['issue_date']          = isset($row[11]) && $row[11]!='' ? $row[11] : '';
                                    $rs_data['int_dom']             = isset($row[12]) && $row[12]!='' ? $row[12] : '';
                                    $rs_data['currency']            = isset($row[13]) && $row[13]!='' ? $row[13] : '';
                                    $rs_data['gross_fare_cash']     = isset($row[14]) && $row[14]!='' ? $row[14] : '';
                                    $rs_data['tax_cash']            = isset($row[15]) && $row[15]!='' ? $row[15] : '';
                                    $rs_data['gross_fare_credit']   = isset($row[16]) && $row[16]!='' ? $row[16] : '';
                                    $rs_data['tax_credit']          = isset($row[17]) && $row[17]!='' ? $row[17] : '';
                                    $rs_data['std_comm_rate']       = isset($row[18]) && $row[18]!='' ? $row[18] : '';
                                    $rs_data['std_comm_amount']     = isset($row[19]) && $row[19]!='' ? $row[19] : '';
                                    $rs_data['suppl_comm_amount']   = isset($row[20]) && $row[20]!='' ? $row[20] : '';
                                    $rs_data['vat_on_comm']         = isset($row[21]) && $row[21]!='' ? $row[21] : '';
                                    $rs_data['penalties']           = isset($row[22]) && $row[22]!='' ? $row[22] : '';
                                    $rs_data['net_to_be_paid']      = isset($row[23]) && $row[23]!='' ? $row[23] : '';
                                    $rs_data['credit_card']         = isset($row[24]) && $row[24]!='' ? $row[24] : '';
                                    $rs_data['year']                = $this->request->data['ano'];
                                    $rs_data['month']               = $this->request->data['mes'];
                                    $rs_data['week']                = $this->request->data['semana'];

                                    if(is_numeric($rs_data['document'])){
                                        //var_dump($rs_data);
                                        $bsp = $this->Bsps->newEntity();
                                        $bsp = $this->Bsps->patchEntity($bsp, $rs_data);
                                        if ($this->Bsps->save($bsp)) {
                                            //$this->Flash->success(__('The bsp has been saved.'));
                                            //return $this->redirect(['action' => 'index']);
                                        }
                                        //$this->Flash->error(__('The bsp could not be saved. Please, try again.'));
                                    }

                                }
                                
                                $i++;
                            }
                        }
                        //die;

                    }
                }
            }
        }
        $users = $this->Bsps->Users->find('list', ['limit' => 200]);
        $this->set(compact('bsp', 'users'));
        $this->set('_serialize', ['bsp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bsp id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bsp = $this->Bsps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bsp = $this->Bsps->patchEntity($bsp, $this->request->getData());
            if ($this->Bsps->save($bsp)) {
                $this->Flash->success(__('The bsp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bsp could not be saved. Please, try again.'));
        }
        $users = $this->Bsps->Users->find('list', ['limit' => 200]);
        $this->set(compact('bsp', 'users'));
        $this->set('_serialize', ['bsp']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bsp id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bsp = $this->Bsps->get($id);
        if ($this->Bsps->delete($bsp)) {
            $this->Flash->success(__('The bsp has been deleted.'));
        } else {
            $this->Flash->error(__('The bsp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
