<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FichaNegocios Controller
 *
 * @property \App\Model\Table\FichaNegociosTable $FichaNegocios
 */
class FichaNegociosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $fichaNegocios = $this->FichaNegocios->find('all')->contain(['Users', 'FichaCotizaciones', 'Vendedores', 'Promotores', 'Empresas', 'Clientes', 'ContactoClientes'])->where(['FichaNegocios.estado_ficha_id <>' =>  1 ])->toArray();
          

        $this->set('fichaNegocios' , $fichaNegocios);
        $this->set('_serialize', ['fichaNegocios']);
    }

    public function aprobarficha()
    {
        $fichaNegocios = $this->FichaNegocios->find('all')->contain(['Users', 'FichaCotizaciones', 'Vendedores', 'Promotores', 'Empresas', 'Clientes', 'ContactoClientes'])->where(['FichaNegocios.estado_ficha_id' =>  3 ])->toArray();
          

        $this->set('fichaNegocios' , $fichaNegocios);
        $this->set('_serialize', ['fichaNegocios']);
    }

    public function controlficha()
    {
        $fichaNegocios = $this->FichaNegocios->find('all')->contain(['Users', 'FichaCotizaciones', 'Vendedores', 'Promotores', 'Empresas', 'Clientes', 'ContactoClientes'])->where(['FichaNegocios.estado_ficha_id' =>  4 ])->toArray();
          

        $this->set('fichaNegocios' , $fichaNegocios);
        $this->set('_serialize', ['fichaNegocios']);
    }

    public function contabilidadficha()
    {
        $fichaNegocios = $this->FichaNegocios->find('all')->contain(['Users', 'FichaCotizaciones', 'Vendedores', 'Promotores', 'Empresas', 'Clientes', 'ContactoClientes'])->where(['FichaNegocios.estado_ficha_id' =>  5 ])->toArray();
          

        $this->set('fichaNegocios' , $fichaNegocios);
        $this->set('_serialize', ['fichaNegocios']);
    }

    /**
     * View method
     *
     * @param string|null $id Ficha Negocio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fichaNegocio = $this->FichaNegocios->get($id, [
            'contain' => ['Users', 'FichaCotizacions', 'Vendedores', 'Promotores', 'Empresas', 'Clientes', 'ContactoClientes', 'FichaNegocioServicios', 'Servicios', 'Utilidades']
        ]);

        $this->set('fichaNegocio', $fichaNegocio);
        $this->set('_serialize', ['fichaNegocio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */

    public function newAdd(){
        $fichaNegocio = $this->FichaNegocios->newEntity();
        $datos['active'] = 1;
        $datos['estado_ficha_id'] = 1;
        $datos['user_id'] = $this->_getUser;

        $apiUrl = 'http://mindicador.cl/api/';
        //Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents

        if ( ini_get('allow_url_fopen') ) {
            $json = file_get_contents($apiUrl);
        } else {
          //De otra forma utilizamos cURL
          $curl = curl_init($apiUrl);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $json = curl_exec($curl);
          curl_close($curl);
        }

        $dailyIndicators = json_decode($json);
        $dolar = $dailyIndicators->dolar->valor;


        $fichaNegocio = $this->FichaNegocios->patchEntity($fichaNegocio, $datos);
        $fichaNegocio['tipoCambio'] = $dolar;


        if($this->FichaNegocios->save($fichaNegocio)){
            return $this->redirect(['action' => 'add', $fichaNegocio->id]);
        }else
        {
            $this->Flash->error(__('No se pudo crear uan nueva ficha de negocios. Intenelo nuevamente mas tarde'));          
        }
    }


    public function add($id = null)
    {
        

      if(is_numeric($id))
      {
        $fichaNegocio = $this->FichaNegocios->get($id, [
        'contain' => []
        ]);

          
        if ($this->request->is(['patch', 'post', 'put'])) {
              
              $datos = $this->request->data;


              $datos['fecha'] = $this->formatDateTimeFicha($datos['fecha']);
              $datos['fecha_pago'] = $this->formatDateTimeFicha($datos['fecha_pago']);
              //var_dump($this->request->data['fecha']); die;                       
              //var_dump($datos['fecha']); die;
              //$folio = $this->FichaNegocios->find('all',['order' => ['FichaNegocios.folio_ficha' => 'DESC']])->first()->toArray();
              //$folio = $folio + 1;
              $datos['folio_ficha'] = 1;
                            
              if(isset($fichaNegocio))
              {

                  $fichaNegocio = $this->FichaNegocios->patchEntity($fichaNegocio, $datos);                  
                  $fichaNegocio['estado_ficha_id'] = 2;
                  $fichaNegocio['tipo_de_venta_land'] = $datos['tipo_de_venta_land'];
                  //var_dump($datos['fecha_pago']); die;
                  
                  $this->loadModel('Contactos'); 
                  $contactoCobranza = $fichaNegocio['contacto_cliente_id'];

                  $contactoCobranza = $this->Contactos->find('all')->where(['Contactos.id' => $contactoCobranza])->toArray();
                  
                  

                  if( isset($contactoCobranza ))
                  {
                      $fichaNegocio['cliente_id'] = $contactoCobranza[0]['entidade_id'];    
                      $fichaNegocio['contacto_cliente_id'] = $contactoCobranza[0]['id'];
                      $fichaNegocio['nombre_contacto'] = $contactoCobranza[0]['name'];
                      $fichaNegocio['fono_contacto'] = $contactoCobranza[0]['telefono'];
                      $fichaNegocio['email_contacto'] = $contactoCobranza[0]['email'];
                                      
                  }


                  $fichaNegocio['valor_neto_land_clp'] = $datos['total_valor_neto_land'];
                  $fichaNegocio['valor_neto_land_usd'] = $datos['total_valor_neto_land_usd'];
                  $fichaNegocio['total_clp'] = $datos['total_total_clp'];
                  $fichaNegocio['total_usd'] = $datos['total_total_usd'];
                  $fichaNegocio['valor_tax_clp'] = $datos['total_valor_tax_clp'];
                  $fichaNegocio['valor_tax_usd'] = $datos['total_valor_tax_usd'];
                  $fichaNegocio['iva_19__land_clp'] = $datos['total_iva_land_clp'];
                  $fichaNegocio['iva_19__land_usd'] = $datos['total_iva_land_usd'];
                  $fichaNegocio['utilidad_bruto_clp'] = $datos['utilidad_bruto_clp'];
                  $fichaNegocio['utilidad_bruto_usd'] = $datos['utilidad_bruto_usd'];

                  
                  


                  $this->loadModel('Utilidades');
                  $idficha = $fichaNegocio['id'];

                  $utilidad = $this->Utilidades->find('all')->where(['ficha_negocio_id' => $idficha])->toArray();

                  if(count($utilidad) < 1)
                  {
                    $utilidade = $this->Utilidades->newEntity();  
                  }else
                  {
                    $utilidade = $this->Utilidades->get($utilidad[0]['id']);
                  }
                  $this->loadModel('Servicios');

                  $query = $this->Servicios->find('all')->where(['Servicios.ficha_negocio_id' => $idficha]);

                  $total_comag_clp = $query->select(['sum' => $query->func()->sum('Servicios.neto_comag_pesos')])
                    ->where(['Servicios.ficha_negocio_id' => $idficha])->toArray();            
                  $total_comag_clp = $total_comag_clp[0]['sum'];

                  $total_comag_usd = $query->select(['sum' => $query->func()->sum('Servicios.neto_comag_usd ')])
                    ->where(['Servicios.ficha_negocio_id' => $idficha])->toArray();            
                  $total_comag_usd = $total_comag_usd[0]['sum'];

                  if($datos['tipo_de_venta_land'] == '2')
                  {
                    $datos['fee_emisiom_clp'] = 0;
                    $datos['fee_emisiom_usd'] = 0;

                  }

                  $utilidad['active'] = 1;                        
                  $utilidad['ficha_negocio_id'] = $idficha;
                  $utilidad['total_comag_clp'] = $total_comag_clp;
                  $utilidad['total_comag_usd'] = $total_comag_usd;
                  $utilidad['total_fee_clp'] = $datos['fee_emisiom_clp'];
                  $utilidad['total_fee_usd'] = $datos['fee_emisiom_usd'];
                  $utilidad['diferencia_clp'] = $datos['diferencia_tarifa_clp'];
                  $utilidad['diferencia_usd'] = $datos['diferencia_tarifa_usd'];
                  $utilidad['cobro_tc_clp'] = $datos['cargo_tarifa_clp'];
                  $utilidad['cobro_tc_usd'] = $datos['cargo_tarifa_usd'];
                  $utilidad['cobro_tc_usd'] = $datos['cargo_tarifa_usd'];
                  $utilidad['descuento_clp'] = $datos['descuento_clp'];
                  $utilidad['descuento_usd'] = $datos['descuento_usd'];
                  $utilidad['cargo_tc_clp'] = $datos['cargo_tarifa_clp'];
                  $utilidad['cargo_tc_usd'] = $datos['cargo_tarifa_usd'];
                  

                  $dolar = $this->FichaNegocios->find('all')->where(['FichaNegocios.id' => $id])->toArray();
                  $dolar = $dolar[0]['tipoCambio'];


                  $valor_remesa = 15;
                  $remesas  = $this->Servicios->find('all')->where(['Servicios.condicion_pago' => 7])->where(['ficha_negocio_id' => $id])->
                  toArray();
                  $remesas = count($remesas);                  
                  $totalremesa_usd = $remesas * $valor_remesa;
                  $totalremesa_clp = $totalremesa_usd * $dolar;

                  
                  $utilidad['cargo_remesa_clp'] = $totalremesa_clp;
                  $utilidad['cargo_remesa_usd'] = $totalremesa_usd;

                  
                  $utilidad_clp = $total_comag_clp + $datos['fee_emisiom_clp'] + $datos['diferencia_tarifa_clp'] + $datos['cargo_tarifa_clp']
                  -  $datos['descuento_clp'] - $datos['cargo_tarifa_clp'] - $totalremesa_clp;

                  $utilidad_usd = $total_comag_usd + $datos['fee_emisiom_usd'] + $datos['diferencia_tarifa_usd'] + $datos['cargo_tarifa_usd']
                  -  $datos['descuento_usd'] - $datos['cargo_tarifa_usd'] - $totalremesa_clp;

                  
                  

                  $utilidad['utilidad_final_clp'] = $utilidad_clp;
                  $utilidad['utilidad_final_usd'] = $utilidad_usd;

                  
                  

                  $utilidade = $this->Utilidades->patchEntity($utilidade, $utilidad);                  


                  if ($this->Utilidades->save($utilidade)) {

                    $this->loadModel("VitacoraFichas");

                    $fichaneg = $this->FichaNegocios->get($id, [
                        'contain' => []
                    ]);

                    $vitacora = $this->VitacoraFichas->newEntity();        

                      
                    $datosvitacora['estado_ficha_id'] = $fichaneg['estado_ficha_id']  ;
                    $datosvitacora['ficha_negocio_id'] = $id;
                    $datosvitacora['active'] = 1;

                    $vitacora = $this->VitacoraFichas->patchEntity($vitacora, $datosvitacora );
                    
                    
                     if ($this->VitacoraFichas->save($vitacora)) {       
                        if ($this->FichaNegocios->save($fichaNegocio)) {                  
                        
                          $this->Flash->success(__('La ficha de negocio fue guardada.'));

                          return $this->redirect(['action' => 'index']);
                          }else
                          {
                          
                            $this->Flash->error(__('La ficha de negocio no pudo ser guardada. Intenelo nuevamente mas tarde'));
                          
                          }
                     }else
                     {
                        
                          $this->Flash->error(__('La ficha de negocio no pudo ser guardada. Intenelo nuevamente mas tarde'));
                     }         
                    
                    
                     
                  }else
                  {
                    $this->Flash->error(__('La ficha de negocio no pudo ser guardada. Intenelo nuevamente mas tarde'));
                    
                  }

              }    
          }

      }

            $dolar = $this->FichaNegocios->find('all')->where(['FichaNegocios.id' => $id])->toArray();
            $dolar = $dolar[0]['tipoCambio'];
            //var_dump(); die;


        $users = $this->FichaNegocios->Users->find('list', ['limit' => 200]);
       // $fichaCotizacions = $this->FichaNegocios->FichaCotizacions->find('list', ['limit' => 200]);
        $this->loadModel('Users');
        $vendedores = $this->Users->find('all')->toArray();
        $promotores = $this->Users->find('all')->toArray();
        $this->loadModel('Empresas');
        $empresas = $this->Empresas->find('all')->toArray();
        $this->loadModel('Clientes');
        $clientes = $this->Clientes->find('all')->where(['Clientes.tipo'=>2])->toArray(); //Entidad tipo->2 = cliente
        $this->loadModel('ContactoClientes');
        $contactoClientes = $this->ContactoClientes->find('all')->toArray();
        $this->loadModel('Proveedores');
        $proveedores = $this->Proveedores->find('all')->where(['Proveedores.tipo'=>1])->toArray(); //Entidad tipo->1 = proveedor
        $this->loadModel('Servicios');
        $servicios = $this->Servicios->find('all')->contain(['Proveedores'])->where(['Servicios.ficha_negocio_id' => $id ])->toArray();

        $userid = $this->_getUser();
        

        $this->set(compact('fichaNegocio', 'users','dolar', 'vendedores','proveedores','userid' ,'promotores', 'empresas', 'clientes', 'contactoClientes'));
        $this->set('_serialize', ['fichaNegocio']);
        $this->set('id', $id);
        $this->set('servicios', $servicios);
    }

    public function addServicio()
    {
       $result = false;
        $debug  = false;
        $html = false;

        $this->loadModel('Servicios');

        $servicio = $this->Servicios->newEntity();
        if ($this->request->is('post')) {

            $datos = $this->request->getData();
            $servicio = $this->Servicios->patchEntity($servicio, $datos);
            
            
            $servicio['active'] = 1;
            $servicio['ficha_negocio_id'] = $servicio['ficha_id'];            
            $servicio['tax'] = $this->request->getData('tax_clp');                        
            $servicio['iva_porcentaje'] = 19;
            $servicio['boleta_honorario_porcentaje'] = 10;
            $servicio['total_pesos'] = $this->request->getData('total_clp');
            $servicio['valor_neto_land'] = $this->request->getData('valor_neto_land_clp');
            $servicio['comag_iva_porcentaje'] = 19;
            $servicio['comag_iva_pesos'] = $this->request->getData('iva_pesos');
            $servicio['comag_iva_usd'] = $this->request->getData('iva_usd');
            //boleta_honorario_pesos
            
            
            //var_dump($this->request->getData('iva_land_pesos')); die;
            if ($this->Servicios->save($servicio)) {
                $result = true;
                //$this->Flash->success(__('El servicio fue guardado.'));
            }else
            {               
               //$this->Flash->error(__('El servicio no se pudo guardar'));
                
            }
            
        }
        $fichaNegocios = $this->Servicios->FichaNegocios->find('list', ['limit' => 200]);
        $this->loadModel('Proveedores');
        $proveedores = $this->Proveedores->find('all')->where(['Proveedores.tipo' =>1]); //Entidades tipo->1 = Proveedores


        $this->set(compact('servicio', 'fichaNegocios', 'proveedores'));
        $this->set('_serialize', ['servicio']);



         $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    /**
     * Edit method
     *
     * @param string|null $id Ficha Negocio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fichaNegocio = $this->FichaNegocios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fichaNegocio = $this->FichaNegocios->patchEntity($fichaNegocio, $this->request->getData());
            if ($this->FichaNegocios->save($fichaNegocio)) {
                $this->Flash->success(__('The ficha negocio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficha negocio could not be saved. Please, try again.'));
        }
        $users = $this->FichaNegocios->Users->find('list', ['limit' => 200]);
        //$fichaCotizacions = $this->FichaNegocios->FichaCotizacions->find('list', ['limit' => 200]);
        $vendedores = $this->FichaNegocios->Vendedores->find('list', ['limit' => 200]);
        $promotores = $this->FichaNegocios->Promotores->find('list', ['limit' => 200]);
        $empresas = $this->FichaNegocios->Empresas->find('list', ['limit' => 200]);
        $clientes = $this->FichaNegocios->Clientes->find('list', ['limit' => 200]);
        $contactoClientes = $this->FichaNegocios->ContactoClientes->find('list', ['limit' => 200]);
        $this->set(compact('fichaNegocio', 'users', 'fichaCotizacions', 'vendedores', 'promotores', 'empresas', 'clientes', 'contactoClientes'));
        $this->set('_serialize', ['fichaNegocio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficha Negocio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fichaNegocio = $this->FichaNegocios->get($id);
        if ($this->FichaNegocios->delete($fichaNegocio)) {
            $this->Flash->success(__('The ficha negocio has been deleted.'));
        } else {
            $this->Flash->error(__('The ficha negocio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function edit_ajax()
    {
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $id = $this->request->data['id'];

        if(is_numeric($id)){
            $servicio = $this->Servicios->get($id, [
                'contain' => ['Proveedores']
            ])->toArray();
   
            $result = true;
        }

        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $servicio));
    }

    public function editServicio()
    {
        $this->loadModel('Servicios');
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $id = $this->request->data['id'];


        if(is_numeric($id)){
            //$servicio = $this->Servicios->find('all')->where(['Servicios.id' => $id])->toArray();
            $servicio = $this->Servicios->get($id, [
                'contain' => ['Proveedores']
            ])->toArray();                    
            //var_dump($servicio); die;
            $result = true;
          
        }

        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $servicio));
    }

    public function guardarServicio()
    {
        
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;
        //var_dump($this->request->data); die;

        if ($this->request->is(['patch', 'post', 'put'])) 
        {


          $this->loadModel('Servicios');
          $id = $this->request->data['id_servicio2'];


          if(is_numeric($id))
          {
                $servicio = $this->Servicios->get($id);        

            $datos = $this->request->getData();

            $servicio = $this->Servicios->patchEntity($servicio, $datos);              
            $servicio['tax'] = $this->request->data('tax_clp');
            $servicio['valor_neto_land'] =  $datos['valor_neto_land_clp'];
            $servicio['total_pesos'] = $datos['total_clp'];
            
            
               

            if ($this->Servicios->save($servicio)) {

                    //$this->Flash->success(__('The servicio has been saved.'));
                    $result = true;
                    
                }
            else{
                  //$this->Flash->error(__('The servicio could not be saved. Please, try again.'));
                }

          }        
        }

       echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => false));
    }

    //lista los servicios de la ficha
    public function listServicios(){

        ;
        $this->autoRender = false;

        $result = false;
        $debug  = false;
        $html = false;

        $ficha_id = $this->request->data['ficha_id'];

        if(is_numeric($ficha_id)){
            $this->loadModel('Servicios');

            $servicio = $this->Servicios->find('all')->contain('Proveedores')->where(['ficha_negocio_id' => $ficha_id])->toArray();
            

            $query = $this->Servicios->find('all')->where(['ficha_negocio_id' => $ficha_id]);
            

            $suma_clp = $query->select(['sum' => $query->func()->sum('Servicios.total_pesos')])
              ->where(['Servicios.ficha_negocio_id' => $ficha_id])->toArray();            
            $suma_clp = $suma_clp[0]['sum'];

            




            $suma_usd = $query->select(['sum' => $query->func()->sum('Servicios.total_usd')])
              ->where(['Servicios.ficha_negocio_id' => $ficha_id])->toArray();

            $suma_usd = $suma_usd[0]['sum']; 

            

            $result = true;
            $html = '
            <table class="table table-striped ">
                <thead>
                    <tr>                        
                         <th scope="col">Nº ficha</th>
                         <th scope="col">Proveedor</th>
                         <th scope="col">Tipo Servicio</th>                                                 
                         <th scope="col">Total Pagar CLP</th>
                         <th scope="col">Total Pagar USD</th>
                         <th scope="col">Editar</th>
                        
                    </tr>
                </thead>                
                <tbody>';

            if(is_array($servicio) && count($servicio)>0){
              foreach ($servicio as $row) {

                  $tipo_servicio2  = 0;                            
                  if($row['tipo_servicio'] == '1')
                  {
                      $tipo_servicio2 = "Aereo";
                  }
                  if($row['tipo_servicio'] == '2')
                  {
                      $tipo_servicio2 = "Terrestre";
                  }
                  if($row['tipo_servicio'] == '3')
                  {
                      $tipo_servicio2 = "Otro";
                  }

                  $html .= '<tr>';
                  $html .= '<td>'.$row['id'].'</td>';                  
                  $html .= '<td>'.$row['proveedore']['name'].'</td>';
                  $html .= '<td>'.$tipo_servicio2.'</td>';       
                  if($row['tipo_servicio'] != '')
                  {
                      if($row['tipo_servicio'] == '1')
                      {                                    
                          $html .= '<td>'.$row['total_pesos'].'</td>';                                    
                          $html .= '<td>'.$row['total_usd'].'</td>';                              
                      }
                      if($row['tipo_servicio'] == '2' || $row->tipo_servicio == '3')
                      { 
                          $html .= '<td>'.$row['valor_neto_land'].'</td>';                                    
                          $html .= '<td>'.$row['valor_neto_land_usd'].'</td>';                              
                      } 

                  }else
                  { 
                      $html .= '<td> 0 </td>';     
                      $html .= '<td> 0 </td>';
                  }                                  
                                                   
                  $html .= '<td> <a class="btn btn-warning btn-xs" href="javascript:modalEditProveedor( \''.$row['id'] .'\')" data-toggle="tooltip" data-placement="left" title="Editar servicios"><i class="glyphicon glyphicon-edit" ></i></a> 

                    <a class="btn btn-danger btn-xs" href="javascript:deleteServicio(\''.$row['id'] .'\' )" data-toggle="tooltip" data-placement="left" title="Eliminar servicio"><i class="glyphicon glyphicon-trash" ></i></a> </td>';

                  


                  $html .= '</tr>';

              }
              $html.=  '<tr> 
                                          <td>  </td>
                                          <td>  </td>
                                          <td> Total a pagar : </td>
                                              <td> <input type="text" name="total_ficha_clp" id="total_ficha_clp" class="form-control decimal" readonly="true"> </td>
                                              <td>  <input type="text" name="total_ficha_usd" id="total_ficha_usd" class="form-control decimal" readonly="true"> </td>
                                       </tr>   ';
              $html .= '</tbody></table>';
            }else{
              $html .= '<tr>';
              $html .= '<td>No existe información!<td>';
              $html .= '</tr>';
            }                    
            
        }


        //echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));

        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html , 'suma_clp' => $suma_clp , 'suma_usd' => $suma_usd));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;
    }

    public function loadCobranza()
    {
      $this->autoRender = false;

        $result = false;
        $debug  = false;
         $html = false;
        
        
        if($this->request->is('post'))
        {
        

          $id_contacto = $this->request->data['contacto_id'];

          if(is_numeric($id_contacto))
          {
            $this->loadModel('Contactos');

            $contacto = $this->Contactos->find('all')->where(['id' => $id_contacto])->toArray();
            
            if(isset($contacto) && count($contacto > 0))
            {
              $result = true;
              $contacto_fono = $contacto[0]['telefono'];
              $contacto_email = $contacto[0]['email'];


            }

          }
        }

      echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html , 'contacto_fono' => $contacto_fono , 
        'contacto_email' => $contacto_email ));

    }

    public function loadContactos()
    {
        //var_dump("estoy en el controler"); die;
        $this->autoRender = false;

        $result = false;
        $debug  = false;
         $html = false;
        
        
        if($this->request->is('post')){
            
            //cargar datos de la empresa 

            $this->loadModel('Contactos');            
            $cliente_id  = $this->request->data['cliente_id'];
            



            $entidade_id = $this->request->data['cliente_ficha_id'];
            
            $rs_contactos = $this->Contactos->find('all')
            ->where(['entidade_id' => $entidade_id ])
            ->where(['active' => 1])
            ->order(['name' => 'ASC'])
            ->toarray();

            $ficha_id =  $this->request->data['ficha_id'];

            $this->loadModel('FichaNegocios');
            $ficha = $this->FichaNegocios->find('all')->where(['id' => $ficha_id])->toArray(); 
            //var_dump($this->request->data); die;
            $cobranza_id = $this->request->data['cliente_id'];
            

            
            if($cobranza_id == '')
            {
               $cobranza_id = $ficha[0]['contacto_cliente_id'];
               //var_dump($ficha[0]['contacto_cliente_id']); die;
            }


            

            $this->loadModel('Contactos');
            $contacto = $this->Contactos->find('all')->where(['id' => $cobranza_id])->toArray();      
            if(count($contacto) > 0)
            {
              $contacto_email = $contacto[0]['email'];
              $contacto_fono = $contacto[0]['telefono'];  
            }else{
              $contacto_email = '';
              $contacto_fono = '';
            }

            
            

            $this->loadModel('Entidades');
            $rs_entidad = $this->Entidades->find('all')->where(['id' => $entidade_id])->toArray();
            //var_dump($rs_entidad[0]['direccion']); die;
            $rs_rut = $rs_entidad[0]['rut'];
            $rs_direccion = $rs_entidad[0]['direccion'];
            $rs_giro = $rs_entidad[0]['giro'];

            
            if(is_array($rs_contactos) && count($rs_contactos)>0){

                $result = true;                
                $html .= '<option value=""></option>';
              
                foreach ($rs_contactos as $row) {

                      if($cobranza_id == $row->id)
                      {
                          $html .= '<option value="'.$row['id'].'"selected="selected">'.$row['name'].'</option>';


                      }else
                      {

                          $html .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                      }

                    
                } // end foreach
            } // end if 
        }// end if post

        echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html , 'rs_contactos' => $rs_contactos, 'entidade_id' => $entidade_id
        , 'rs_rut' => $rs_rut , 'rs_direccion' => $rs_direccion , 'rs_giro' => $rs_giro , 'contacto_fono' => $contacto_fono , 'contacto_email' => $contacto_email, $cobranza_id => 'cobranza_id'));
    } // end loadContactos

    public function deleteServicio()
    {
         $this->autoRender = false;

          $result = false;
          $debug  = false;
          $html = false;

          if($this->request->is('post'))
          {
            $servicio_id = $this->request->data['servicio_id'];

            if(is_numeric($servicio_id))
            {
              $this->loadModel('Servicios');

              $servicio = $this->Servicios->get($servicio_id, [
              'contain' => [] ]);

             $servicio = $this->Servicios->get($servicio_id);
             
              if ($this->Servicios->delete($servicio)) {
                  //$this->Flash->success(__('El servicio fue borrado.'));
                  $result = true;
              } else {
                  //$this->Flash->error(__('No se pudo borrar el servicio fue, intente nuamente mas tarde '));
              }
            }
            

          }

            echo json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
    }

    public function loadFicha()
   {

          $this->autoRender = false;

          $result = false;
          $debug  = false;
          $html = false;
          

          if($this->request->is('post'))
          {
            
            $ficha_id =  $this->request->data['ficha_id'];
            
            
            
            if(is_numeric($ficha_id))
            {

              $this->loadModel('Servicios');
              $query = $this->Servicios->find('all');

              $neto_clp = $query->select(['sum' => $query->func()->sum('Servicios.valor_neto')])
              ->where(['Servicios.ficha_negocio_id' => $ficha_id])->toArray();

                
              $neto_clp = $neto_clp[0]['sum'];


              $neto_usd = $query->select(['sum' => $query->func()->sum('Servicios.valor_neto_usd')])
                ->where(['Servicios.ficha_negocio_id' => $ficha_id])->toArray();

              $neto_usd = $neto_usd[0]['sum'];

              $tax_clp = $query->select(['sum' => $query->func()->sum('Servicios.tax')])
                ->where(['Servicios.ficha_negocio_id' => $ficha_id])->toArray();

              $tax_clp = $tax_clp[0]['sum'];

              $tax_usd = $query->select(['sum' => $query->func()->sum('Servicios.tax_usd')])
                ->where(['Servicios.ficha_negocio_id' => $ficha_id])->toArray();

              $tax_usd = $tax_usd[0]['sum'];


              $valor_neto_land = $query->select(['sum' => $query->func()->sum('Servicios.valor_neto_land')])
                ->where(['Servicios.ficha_negocio_id' => $ficha_id])->toArray();

              $valor_neto_land = $valor_neto_land[0]['sum'];

              
              $valor_neto_land_usd = $query->select(['sum' => $query->func()->sum('Servicios.valor_neto_land_usd')])
                ->where(['Servicios.ficha_negocio_id' => $ficha_id])->toArray();

              $valor_neto_land_usd = $valor_neto_land_usd[0]['sum'];

              $iva_land_pesos =  $valor_neto_land * 0.19;

              $iva_land_usd = $valor_neto_land_usd * 0.19;

              $result = true;

            }
          }
        
         $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html , 'neto_clp' => $neto_clp , 'neto_usd' => $neto_usd,
         'tax_usd' => $tax_usd , 'tax_clp' => $tax_clp , 'valor_neto_land_usd' => $valor_neto_land_usd , 'valor_neto_land' => $valor_neto_land,
         'valor_neto_land'=> $valor_neto_land , 'valor_neto_land_usd' => $valor_neto_land_usd, 'iva_land_pesos' => $iva_land_pesos , 
         'iva_land_usd' => $iva_land_usd ));

        

          $this->response->getBody()->write($content);
          $this->response = $this->response->withType('json');

          return $this->response;
    }



    public function loadUtilidad()
    {
      $this->autoRender = false;

       $result = false;
       $debug  = false;
       $html = false;
            

       if($this->request->is('post'))
       {
        $id_ficha =  $this->request->data['id_ficha'];


        $this->loadModel('Utilidades');

        if(is_numeric($id_ficha))
        {
          $utilidad = $this->Utilidades->find('all')->where(['ficha_negocio_id' => $id_ficha])->toArray();
          
          if(count($utilidad) > 0)
          {
            $result = true;
            $total_comag_clp = $utilidad[0]['total_comag_clp'];
            $total_comag_usd = $utilidad[0]['total_comag_usd'];
            $total_fee_clp = $utilidad[0]['total_fee_clp'];
            $total_fee_usd = $utilidad[0]['total_fee_usd'];
            $diferencia_clp = $utilidad[0]['diferencia_clp'];
            $diferencia_usd = $utilidad[0]['diferencia_usd'];
            $cobro_tc_clp = $utilidad[0]['cobro_tc_clp'];
            $cobro_tc_usd = $utilidad[0]['cobro_tc_usd'];
            $descuento_clp = $utilidad[0]['descuento_clp'];
            $descuento_usd = $utilidad[0]['descuento_usd'];
            $cargo_tc_clp = $utilidad[0]['cargo_tc_clp'];
            $cargo_tc_usd = $utilidad[0]['cargo_tc_usd'];
            $cargo_remesa_clp = $utilidad[0]['cargo_remesa_clp'];
            $cargo_remesa_usd = $utilidad[0]['cargo_remesa_usd'];
            $utilidad_final_clp = $utilidad[0]['utilidad_final_clp'];
            $utilidad_final_usd = $utilidad[0]['utilidad_final_usd'];  

            $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html , 'total_comag_clp' => $total_comag_clp,
          'total_comag_usd' => $total_comag_usd , 'total_fee_clp' => $total_fee_clp ,'total_fee_usd' => $total_fee_usd , 
          'diferencia_clp' => $diferencia_clp, 'diferencia_usd' => $diferencia_usd,'cobro_tc_clp' => $cobro_tc_clp, 
          'cobro_tc_usd' => $cobro_tc_usd , 'descuento_clp' => $descuento_clp, 'descuento_usd' => $descuento_usd, 'cargo_tc_clp' => $cargo_tc_clp, 
          'cargo_tc_usd' => $cargo_tc_usd, 'cargo_remesa_clp' => $cargo_remesa_clp , 'cargo_remesa_usd' => $cargo_remesa_usd , 
          'utilidad_final_clp' => $utilidad_final_clp, 'utilidad_final_usd' => $utilidad_final_usd));

          }

        }
       }
       
       $this->response->getBody()->write($content);
       $this->response = $this->response->withType('json'); 
       return $this->response;
    }


    public function enviarAprobar()
    {
        $this->autoRender = false;

         $result = false;
         $debug  = false;
         $html = false;
              

         if($this->request->is('post'))
         {
          
            $ficha_id = $this->request->data['id_ficha'];

            $fichaNegocio = $this->FichaNegocios->get($ficha_id, [
                'contain' => []
            ]); 
            $datos['estado_ficha_id'] = 3;

            $this->loadModel('VitacoraFichas');        
            $vitacoraficha = $this->VitacoraFichas->newEntity();

            $vitacora['ficha_negocio_id'] = $ficha_id;
            $vitacora['estado_ficha_id'] = 3;  
            $vitacora['active'] = 1;
            $vitacora['comentario'] = $this->request->data['comentario'];

            $vitacoraficha = $this->FichaNegocios->patchEntity($vitacoraficha, $vitacora);

            if ($this->VitacoraFichas->save($vitacoraficha))
            {

                $fichaNegocio = $this->FichaNegocios->patchEntity($fichaNegocio, $datos);
                if ($this->FichaNegocios->save($fichaNegocio))
                {
                  $result = true;
                  $this->Flash->success(__('La ficha de fue enviada a aprobación'));
                  
                }else
                {
                  $this->Flash->error(__('La ficha de negocio no pudo ser enviada a aprobación. Intente neuvamente mas tarde'));
                }  
            }else
            {
              $this->Flash->error(__('La ficha de negocio no pudo ser enviada a aprobación. Intente neuvamente mas tarde'));
            } 
         }

         $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
         $this->response->getBody()->write($content);
         $this->response = $this->response->withType('json'); 
         return $this->response;
    }

    public function enviarControl()
    {
        $this->autoRender = false;

         $result = false;
         $debug  = false;
         $html = false;
              

         if($this->request->is('post'))
         {
            $result = true;
            
            $ficha_id = $this->request->data['id_ficha'];

           $fichaNegocio = $this->FichaNegocios->get($ficha_id, [
              'contain' => []
           ]); 
           $datos['estado_ficha_id'] = 4;

          


            $this->loadModel('VitacoraFichas');        
            $vitacoraficha = $this->VitacoraFichas->newEntity();

            $vitacora['ficha_negocio_id'] = $ficha_id;
            $vitacora['estado_ficha_id'] = 4;  
            $vitacora['active'] = 1;
            $vitacora['comentario'] = $this->request->data['comentario'];
            $vitacoraficha = $this->FichaNegocios->patchEntity($vitacoraficha, $vitacora);        

           if ($this->VitacoraFichas->save($vitacoraficha))
           {
              $fichaNegocio = $this->FichaNegocios->patchEntity($fichaNegocio, $datos);

              if ($this->FichaNegocios->save($fichaNegocio))
              {
                $result = true;
                
              }else{
                $this->Flash->error(__('La ficha no pudo ser aprobada. Intenelo nuevamente mas tarde'));
              }  
           }else
           {
               $this->Flash->error(__('La ficha no pudo ser aprobada. Intenelo nuevamente mas tarde'));
           }
          
         }

         $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
         $this->response->getBody()->write($content);
         $this->response = $this->response->withType('json'); 
         return $this->response;
    }

    public function enviarContabilidad()
    {
        $this->autoRender = false;

         $result = false;
         $debug  = false;
         $html = false;
              

         if($this->request->is('post'))
         {
            $result = true;
            
            $ficha_id = $this->request->data['id_ficha'];
            $comentario = $this->request->data['comentario'];

          
           $this->loadModel('VitacoraFichas');        
            $vitacoraficha = $this->VitacoraFichas->newEntity();

            $vitacora['ficha_negocio_id'] = $ficha_id;
            $vitacora['estado_ficha_id'] = 5;  
            $vitacora['active'] = 1;
            $vitacora['comentario'] = $comentario;

            $vitacoraficha = $this->FichaNegocios->patchEntity($vitacoraficha, $vitacora);        

           if ($this->VitacoraFichas->save($vitacoraficha))
           {
              $fichaNegocio = $this->FichaNegocios->get($ficha_id, [
              'contain' => []
              ]); 
              $datos['estado_ficha_id'] = 5;

              $fichaNegocio = $this->FichaNegocios->patchEntity($fichaNegocio, $datos);

              if ($this->FichaNegocios->save($fichaNegocio))
              {
                $result = true;
                
              }else
              {
                  $this->Flash->error(__('La ficha no pudo ser aprobada. Intenelo nuevamente mas tarde'));     
              }

            }else
            {
             $this->Flash->error(__('La ficha no pudo ser aprobada. Intenelo nuevamente mas tarde'));     
           }
         }

         $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
         $this->response->getBody()->write($content);
         $this->response = $this->response->withType('json'); 
         return $this->response;

    }

    public function enviarFacturacion()
    {
        $this->autoRender = false;

         $result = false;
         $debug  = false;
         $html = false;
              

         if($this->request->is('post'))
         {
            $result = true;
            
            $ficha_id = $this->request->data['id_ficha'];
            $comentario = $this->request->data['comentario'];
            

            $fichaNegocio = $this->FichaNegocios->get($ficha_id, [
              'contain' => []
           ]); 
             $datos['estado_ficha_id'] = 5;

            $fichaNegocio = $this->FichaNegocios->patchEntity($fichaNegocio, $datos);
             $this->loadModel('VitacoraFichas');        
            $vitacoraficha = $this->VitacoraFichas->newEntity();

            $vitacora['ficha_negocio_id'] = $ficha_id;
            $vitacora['estado_ficha_id'] = '';  
            $vitacora['active'] = 1;
            $vitacora['comentario'] = $comentario;

             $vitacoraficha = $this->FichaNegocios->patchEntity($vitacoraficha, $vitacora);        

            if ($this->VitacoraFichas->save($vitacoraficha))
            {
              if ($this->FichaNegocios->save($fichaNegocio))
              {
                $result = true;
                
              }else
              {
                  $this->Flash->error(__('La ficha no pudo ser enviada a facturar. Intenelo nuevamente mas tarde'));     
              }

           }else
           {
             $this->Flash->error(__('La ficha no pudo ser enviada a facturar. Intenelo nuevamente mas tarde')); 
           }
         }

          $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
          $this->response->getBody()->write($content);
          $this->response = $this->response->withType('json'); 
          return $this->response;

    }

    public function rechazarFicha()
    {

        $this->autoRender = false;

         $result = false;
         $debug  = false;
         $html = false;
              

          if($this->request->is('post'))
          {
            $result = true;
            
            $ficha_id = $this->request->data['id_ficha'];
            $comentario = $this->request->data['comentario'];   
            
            if(is_numeric($ficha_id))
            {
                $datos['estado_ficha_id'] = 6;

          

                $this->loadModel('VitacoraFichas');        
                  $vitacoraficha = $this->VitacoraFichas->newEntity();

                  $vitacora['ficha_negocio_id'] = $ficha_id;
                  $vitacora['estado_ficha_id'] = 6;  
                  $vitacora['active'] = 1;                 
                  $vitacora['comentario'] = $comentario;

                  $vitacoraficha = $this->FichaNegocios->patchEntity($vitacoraficha, $vitacora);        

                if ($this->VitacoraFichas->save($vitacoraficha))
                {
                   $fichaNegocio = $this->FichaNegocios->get($ficha_id, [
                    'contain' => []
                  ]); 

                  $fichaNegocio = $this->FichaNegocios->patchEntity($fichaNegocio, $datos);
                    if ($this->FichaNegocios->save($fichaNegocio))
                    {
                      $result = true;
                      
                    }else
                    { /*$x = $fichaNegocio->errors();
                                         if ($x) {
                                          debug($fichaNegocio);
                                          debug($x);
                                          return false;
                                         }                
                                         die; */
                      
                        $this->Flash->error(__('La ficha no pudo ser rechazada. Intenelo nuevamente mas tarde'));     
                    }

                }else
                { /*$x = $VitacoraFichas->errors();
                                         if ($x) {
                                          debug($VitacoraFichas);
                                          debug($x);
                                          return false;
                                         }                
                                         die; */
                
                  $this->Flash->error(__('La ficha no pudo ser rechazada. Intenelo nuevamente mas tarde'));     
                }    
            }else
            {        
              $this->Flash->error(__('La ficha no pudo ser rechazada. Intenelo nuevamente mas tarde'));     
            }

          }

          $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html));
          $this->response->getBody()->write($content);
          $this->response = $this->response->withType('json'); 
          return $this->response;

    }

    public function loadValorBruto()
    {
      $this->autoRender = false;
        
         $result = false;
         $debug  = false;
         $html = false;
              

          if($this->request->is('post'))
          {

            

            $idficha = $this->request->data(['ficha_id']);
            if(is_numeric($idficha))
            {
              $this->loadModel("Servicios");

              $query = $this->Servicios->find('all')->where(['Servicios.ficha_negocio_id' => $idficha]);

                  $bruto_tkt_clp = $query->select(['sum' => $query->func()->sum('Servicios.valor_neto')])
                    ->where(['Servicios.ficha_negocio_id' => $idficha])->toArray();         

                  $bruto_tkt_clp = $bruto_tkt_clp[0]['sum'];


                  $bruto_tkt_usd = $query->select(['sum' => $query->func()->sum('Servicios.valor_neto_usd')])
                    ->where(['Servicios.ficha_negocio_id' => $idficha])->toArray();         

                  $bruto_tkt_usd = $bruto_tkt_usd[0]['sum'];


              $query = $this->Servicios->find('all')->where(['Servicios.ficha_negocio_id' => $idficha]);

                  $tax_clp = $query->select(['sum' => $query->func()->sum('Servicios.tax')])
                    ->where(['Servicios.ficha_negocio_id' => $idficha])->toArray();         

                  $tax_clp = $tax_clp[0]['sum'];


                  $tax_usd = $query->select(['sum' => $query->func()->sum('Servicios.tax_usd')])
                    ->where(['Servicios.ficha_negocio_id' => $idficha])->toArray();         

                  $tax_usd = $tax_usd[0]['sum'];

                    


              $query = $this->Servicios->find('all')->where(['Servicios.ficha_negocio_id' => $idficha]);

                  $neto_land_clp = $query->select(['sum' => $query->func()->sum('Servicios.valor_neto_land')])
                    ->where(['Servicios.ficha_negocio_id' => $idficha])->toArray();         

                  $neto_land_clp = $neto_land_clp[0]['sum'];


                  $neto_land_usd = $query->select(['sum' => $query->func()->sum('Servicios.valor_neto_land_usd')])
                    ->where(['Servicios.ficha_negocio_id' => $idficha])->toArray();         

                  $neto_land_usd = $neto_land_usd[0]['sum'];

                  $result = true;        
                  
              
            }

            
          }

        $content = json_encode(array('result' => $result, 'debug' => $debug, 'html' => $html,'bruto_tkt_clp' => $bruto_tkt_clp, 'bruto_tkt_usd' => $bruto_tkt_usd
        , 'tax_clp' => $tax_clp , 'tax_usd' => $tax_usd, 'neto_land_usd' => $neto_land_usd,'neto_land_clp' => $neto_land_clp ));

        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        // ...

        return $this->response;

    }

  
}





