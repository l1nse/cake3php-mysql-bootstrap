<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('fichaNegocios') ?>
<script type="text/javascript">  </script>


<div  id="flashMessage"></div>
<div class="fichaNegocios form large-9 medium-8 columns content">
    <?= $this->Form->create($fichaNegocio, array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_ficha')) ?>
    <fieldset>
        
        <legend><?= __('Agregar Ficha de Negocio') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $userid ?>">
            <input type="hidden" name="ficha_id" id="ficha_id" value="<?php echo $id ?>">
            <label for="menu" >Tipo cambio</label>
              <input type="radio" name="menu" id="menu1" value="1" checked="checked">
              <label for="menu1">CLP</label>
              <input type="radio" name="menu" id="menu2" value="2">
              <label for="menu2">USD</label>
            

        <h3> Datos de facturación </h3>
        <hr>

        <div class="row">
         <div class="form-group">
                <div class="col-md-4">
                    <div class="input select required" >
                        <label for="vendedore_id " class="control-label col-md-3">Vendedor(*)</label>
                        <div class ="col-md-9">
                            <select class="form-control" id="vendedore_id" name="vendedore_id" required="required">
                            <option value=""></option>
                            <?php

                                if(is_array($vendedores) && count($vendedores)>0){

                                    foreach ($vendedores as $row) {

                                        if($row['id'] == $fichaNegocio['vendedore_id'] )
                                        {
                                            echo '<option value="'.$row['id'].'"selected="selected">'.$row['name'].' '.$row['apellido1'].'</option>'; 
                                               
                                        }else
                                        {

                                            echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';    
                                        }
                                        
                                    }
                                }
                            ?>
                            </select>    
                        </div>
                        
                    </div>        
                </div>    
                <div class="col-md-4">              
                    <div class="input select required">
                        <label for="empresa_id" class="control-label col-md-3">Empresa(*)</label>
                            <div class="col-md-9">
                                <select class="form-control" id="empresa_id" name="empresa_id" required="required">
                                <option value=""></option>
                                <?php
                                    if(is_array($empresas) && count($empresas)>0){

                                        foreach ($empresas as $row) {
                                            if($row['id'] == '1')
                                            {
                                                echo '<option value="'.$row['id'].'"selected>'.$row['name'].'</option>';       
                                            }else
                                            {
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';    
                                            }
                                            
                                                
                                            
                                            
                                        }
                                    }
                                ?>
                                </select>
                            </div>                        
                    </div>          
                </div>    
                <div class="col-md-4">
                    <label for="fecha" class="control-label col-md-3">Fecha Emisión</label>
                      <div class="col-md-9">
                        <?php $date = $fichaNegocio['fecha'];
                        if(isset($date))
                        {
                            $date = $date->format('d/m/Y h:m');    
                        } 
                        
                        ?>
        
                        <input class="form-control datetime" type="text"  id="º" name="fecha" required="required" value="<?php echo $date ?>" >
                      </div>                          
                </div>    
            </div>
        </div>
        <br>
        <div class="row">
         <div class="form-group">
                <div class="col-md-4"> 
                    <div class="input select required">
                        <label for="promotore_id" class="control-label col-md-3">Promotor(*)</label>
                        <div class="col-md-9">
                            <select class="form-control" id="promotore_id" name="promotore_id" required="required">
                            <option value=""></option>
                            <?php
                                if(is_array($promotores) && count($promotores)>0){

                                    foreach ($promotores as $row) {
                                        
                                        if($row['id'] == $fichaNegocio['promotore_id'] )
                                        {
                                            echo '<option value="'.$row['id'].'"selected="selected">'.$row['name'].' '.$row['apellido1'].'</option>'; 
                                               
                                        }else
                                        {

                                            echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';    
                                        }
                                        
                                    }
                                }
                            ?>
                            </select>
                        </div>                        
                    </div>        
                </div>
                <div class="col-md-4">                   
                        
                </div>
                <div class="col-md-4">
                    <label for="tipo_cambio" class="control-label col-md-3">Valor Dolar</label>
                    <div class="col-md-9">                        
                        <input type="text" name="tipo_cambio" id="tipo_cambio" class="form-control decimal" readonly="true" value="<?php echo $dolar?>">
                    </div>
                </div>
        </div>
        <br>
        <br>
        </div>

        <row>    
            <div class="col-md-12">
                <label for="free" >Comentarios</label>
                <textarea class="form-control" name="free" id="free" rows="4" cols="50"><?php echo $fichaNegocio['free'] ?></textarea>

                
            </div>   

        </row>
        
        <div class="row">
            <div class="col-md-3">
                <br>
                   <label for="cliente_ficha_id" class="control-label col-md-4">Cliente (*)</label>
                    <div class="col-md-8">
                        <select class="form-control" id="cliente_ficha_id" name="cliente_ficha_id"  required="required>">
                        <option value=""></option>
                        <?php
                            if(is_array($clientes) && count($clientes)>0){

                                foreach ($clientes as $row) {
                                    
                                    if($row['id'] == $fichaNegocio['cliente_id'] )
                                        {
                                            echo '<option value="'.$row['id'].'"selected="selected">'.$row['name'].' '.$row['apellido1'].'</option>'; 
                                               
                                        }else
                                        {

                                            echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';    
                                        }
                                    
                                }
                            }
                        ?>
                        </select>
                    </div>
            </div>
            <div class="col-md-3">
                <br>
                <label for="cliente_rut" class="control-label col-md-4">Rut</label>
                    <div class="col-md-8">
                        <input class="form-control rut" type="text"  id="cliente_rut" name="cliente_rut" readonly="true">
                    </div>                          
            </div>
            <div class="col-md-3">
                <br>
                    <label for="cliente_direccion" class="control-label col-md-4">Dirección</label>
                    <div class="col-md-8">
                        <input class="form-control " type="text"  id="cliente_direccion" name="cliente_direccion" readonly="true" >
                    </div>                          
            </div>
            <div class="col-md-3">
                <br>
                <label for="giro" class="control-label col-md-4">Giro</label>
                        <div class="col-md-8">
                            <input type="text" name="giro" class="form-control" id="giro" readonly="true">
                        </div>
            </div>
        </div>
        
        
        
        <br>
        <div class="row">
            <div class = "col-md-3"> 
                <label for="contacto_cliente_id" class="control-label col-md-4">Contacto Cobranza(*)</label>
                        <div class="col-md-8">
                            <select class="form-control" id="contacto_cliente_id" name="contacto_cliente_id" required="required">
                            <option value=""></option>    
                            </select>
                        </div>
            </div>
            <div class = "col-md-3"> 
                <label for="fono_contacto" class="control-label col-md-4">Fono Contacto</label>
                <div class="col-md-8">
                        <input type="text" name="fono_contacto" id="fono_contacto" class="form-control phone" readonly="true">
                </div>                
            </div>
            <div class = "col-md-3"> 
                <label for="email_contacto" class="control-label col-md-4">Email Contacto</label>
                <div class="col-md-8">
                        <input type="text" name="email_contacto" id="email_contacto" class="form-control correo" readonly="true">
                </div>
            </div>
            <div class = "col-md-3"> 
                        
                <label for="fecha_pago" class="control-label col-md-4">Fecha de Pago</label>
                      <div class="col-md-8">
                        <?php $date2 = $fichaNegocio['fecha_pago'];
                        if(isset($date2))
                        {
                            $date = $date2->format('d/m/Y h:m');    
                            
                        } 
                        
                        ?>
        
                        <input class="form-control datetime" type="text"  id="fecha_pago" name="fecha_pago" required="required" value="<?php echo $date ?>" >
                      </div>                          
                </div>

            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-3">    
                <label for="tipo_de_venta_land" class="control-label col-md-4">Tipo de Venta Land(*)</label>
                    <div class="col-md-8">
                        <select class="form-control" id="tipo_de_venta_land" name="tipo_de_venta_land"  required="required" >
                            <option value=""></option>                            

                            <?php 
                            $formapago = array
                            (
                                array('1','afecta a iva'),
                                array('2','exenta de iva'),
                                
                            );

                            foreach ($formapago as $row ) {
                                if($fichaNegocio['tipo_de_venta_land'] == $row[0])
                                {
                                    echo '<option value="'.$row[0].'"selected="selected">'.$row[1].'</option>' ;
                                }else
                                {
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>' ;
                                }
                                
                            }

                            ?>
                        </select>    
                    </div>

            </div>
            <div class="col-md-3">    
                <label for="forma_pago " class="control-label col-md-4">Forma Pago</label>
                    <div class="col-md-8 input select required">
                        <select class="form-control" id="forma_pago" name="forma_pago" required="required">> 
                            <option value=""></option>
                            
                            <?php 
                            $formapago = array
                            (
                                array('1','Contado'),
                                array('2','Credito'),
                                array('3','BSP tc only'),
                                array('4','BSP tc plus transbank'),
                                array('5','Transbank only'),
                                array('6','Transferencia'),
                            );

                            foreach ($formapago as $row ) {
                                if($fichaNegocio['forma_pago'] == $row[0])
                                {
                                    echo '<option value="'.$row[0].'"selected="selected">'.$row[1].'</option>' ;
                                }else
                                {
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>' ;
                                }
                                
                            }

                            ?>
                        </select>
                    </div>  
                
            </div>
            <div class="col-md-3" id="rowvalor_bruto_tkt_clp"  >  
                <label for="valor_bruto_tkt_clp" id="lblvalor_bruto_tkt_clp" class="control-label col-md-4">Valor Bruto TKT CLP</label>
                <div class="col-md-8"> 
                        <input type="text" name="valor_bruto_tkt_clp" id="valor_bruto_tkt_clp" class="form-control decimal" readonly="true" style="text-align: right;">
                </div>
            </div>
            <div class="col-md-3" id="rowvalor_bruto_tkt_usd">    
                <label for="valor_bruto_tkt_usd" id="lblvalor_bruto_tkt_usd" class="control-label col-md-4" id="lblvalor_bruto_tkt_usd">Valor Bruto TKT USD</label>
                <div class="col-md-8">
                        <input type="text" name="valor_bruto_tkt_usd" id="valor_bruto_tkt_usd" class="form-control decimal" readonly="true" style="text-align: right;">
                </div>  
            </div>
            <div class="col-md-3" id="rowvalor_tax_clp">    
                <label for="total_valor_tax_clp" id="lbltotal_valor_tax_clp" class="control-label col-md-4">Total Valor TAX CLP</label>
                <div class="col-md-8">
                    <input type="text" name="total_valor_tax_clp" id="total_valor_tax_clp" class="form-control decimal " readonly="true" style="text-align: right;"> 
                </div>
            </div>
            <div class="col-md-3" id="rowvalor_tax_usd">    
                <label for="valor_tax_usd" class="control-label col-md-4" id="lblvalor_tax_usd" name="lblvalor_tax_usd">Total Valor TAX USD</label>
                <div class="col-md-8">
                        <input type="text" name="total_valor_tax_usd" id="total_valor_tax_usd" class="form-control decimal" readonly="true" style="text-align: right;">
                </div>
            </div>
        </div>
       
        <br>
        <div class="row">
            <div class="col-md-3" id="rowtotal_valor_neto_land_clp">
                <label for="valor_neto_land" id="lblvalor_neto_land" class="control-label col-md-4">Total Valor Neto Land CLP</label>
                <div class="col-md-8">
                        <input type="text" name="total_valor_neto_land" id="total_valor_neto_land" class="form-control decimal"  readonly="true" style="text-align: right;">
                </div>
            </div>
            <div class="col-md-3" id="rowtotal_valor_neto_land_usd">
                <label for="total_valor_neto_land_usd" id="lbltotal_valor_neto_land_usd" class="control-label col-md-4">Total Valor Neto land USD</label>
                <div class="col-md-8">
                        <input type="text" name="total_valor_neto_land_usd" id="total_valor_neto_land_usd" class="form-control decimal" readonly="true" style="text-align: right;">
                </div>
                
            </div>
            <div class="col-md-3" id="rowtotal_iva_land_clp">
                <label for="total_iva_land_clp" id="lbltotal_iva_land_clp" class="control-label col-md-4">Total IVA LAND CLP</label> 
                <div class="col-md-8">
                        <input type="text" name="total_iva_land_clp" id="total_iva_land_clp"  class="form-control decimal" readonly="true" style="text-align: right;">
                </div>
            </div>
            <div class="col-md-3" id="rowtotal_iva_land_usd" >
                <label for="total_iva_land_usd" id="lbltotal_iva_land_usd" class="control-label col-md-4">Total IVA  LAND USD</label>
                <div class="col-md-8">
                        <input type="text" name="total_iva_land_usd" id="total_iva_land_usd" class="form-control decimal" readonly="true" style="text-align: right;">
                </div>
            </div>
            <div class="col-md-3" id="rowdiferencia_tarifa_clp">
                <label for="diferencia_tarifa_clp" id="lbldiferencia_tarifa_clp" class="control-label col-md-4"  >Diferencia Tarifa CLP</label>
                <div class="col-md-8">
                        <input type="text" name="diferencia_tarifa_clp" id="diferencia_tarifa_clp" onkeyup="diferenciaTarifariaCLP()"  id="diferencia_tarifa_clp" class="form-control decimal" 
                        value="<?php echo $fichaNegocio['diferencia_tarifa_clp'] ?>" style="text-align: right";>
                </div>
            </div>
            <div class="col-md-3" id="rowdiferencia_tarifa_usd">
                <label for="diferencia_tarifa_usd" id="lbldiferencia_tarifa_usd" class="control-label col-md-4">Diferencia Tarifa USD</label>
                <div class="col-md-8">
                        <input type="text" name="diferencia_tarifa_usd" onkeyup="diferenciaTarifariaUSD()" id="diferencia_tarifa_usd" class="form-control decimal" value="<?php echo $fichaNegocio["diferencia_tarifa_usd"] ?>"  style="text-align: right;" >
                </div>    
            </div>
            <div class="col-md-3" id="rowfee_emisiom_clp">
                 <label for="fee_emisiom_clp" id="lblfee_emisiom_clp" class="control-label col-md-4">FEE Emisión CLP</label> 
                <div class="col-md-8">
                        <input type="text" name="fee_emisiom_clp" id="fee_emisiom_clp" onkeyup="fee_clp()" class="form-control decimal" 
                        value = "<?php echo $fichaNegocio["fee_emisiom_clp"] ?>" style="text-align: right;">
                </div>
            </div>
            <div class="col-md-3" id="rowfee_emisiom_usd">
                <label for="fee_emisiom_usd" id="lblfee_emisiom_usd" class="control-label col-md-4">FEE Emisión USD</label>
                <div class="col-md-8">
                        <input type="text" name="fee_emisiom_usd" id="fee_emisiom_usd" onkeyup="fee_usd()" class="form-control decimal"
                        value = <?php echo $fichaNegocio["fee_emisiom_usd"] ?> style="text-align: right;">
                </div>
                
            </div>
        </div>
        <br>
        <div class="row">
            
            <div class="col-md-3" id="rowiva_fee_clp">
                 <label for="iva_fee_clp" id="lbliva_fee_clp" class="control-label col-md-4">IVA FEE CLP</label>
                <div class="col-md-8">
                        <input type="text" name="iva_fee_clp" id="iva_fee_clp" class="form-control decimal" readonly="true" value="<?php echo $fichaNegocio['iva_fee_clp']?>" style="text-align: right;">
                </div>
            </div>
            <div class="col-md-3" id="rowiva_fee_usd">
                 <label for="iva_fee_usd" id="lbliva_fee_usd" class="control-label col-md-4">IVA FEE USD</label>
                <div class="col-md-8">
                        <input type="text" name="iva_fee_usd" id="iva_fee_usd" class="form-control decimal" readonly="true" value="<?php echo $fichaNegocio['iva_fee_usd']?>" style="text-align: right;">
                </div>

            </div>
            <div class="col-md-3" id="rowcargo_tarifa_clp">
                <label for="cargo_tarifa_clp" id="lblcargo_tarifa_clp" class="control-label col-md-4 money">Cargo Tarifa CLP</label>
                <div class="col-md-8">
                        <input type="text" name="cargo_tarifa_clp" id="cargo_tarifa_clp" class="form-control decimal" readonly="true" style="text-align: right;">
                </div>  
            </div>
            <div class="col-md-3" id="rowcargo_tarifa_usd" >
                <label for="cargo_tarifa_usd" id="lblcargo_tarifa_usd" class="control-label col-md-4">Cargo Tarifa USD</label>
                <div class="col-md-8">
                        <input type="text" name="cargo_tarifa_usd" id="cargo_tarifa_usd" class="form-control decimal" readonly="true" style="text-align: right;">
                </div>
            </div>
            
            <div class="col-md-3" id="rowdescuento_clp" >
                <label for="descuento_clp" id="lbldescuento_clp" class="control-label col-md-4">Descuento CLP</label>
                <div class="col-md-8" id="rowdescuento_clp">
                        <input type="text" name="descuento_clp" id="descuento_clp" onkeyup="descuentoCLP()" class="form-control decimal" 
                        value ="<?php echo $fichaNegocio['descuento_clp'] ?>"  style="text-align: right;">
                </div> 
                
                
            </div>
            <div class="col-md-3" id="rowdescuento_usd">
                <label for="descuento_usd" id="lbldescuento_usd" id="lbldescuento_usd" class="control-label col-md-4">Descuento USD</label>
                <div class="col-md-8" id="rowdescuento_usd">
                        <input type="text" name="descuento_usd" id="descuento_usd" class="form-control decimal" onkeyup="descuentoUSD()"
                        value ="<?php echo $fichaNegocio['descuento_usd'] ?>"  style="text-align: right;">
                </div> 
                
            </div>
            <div class="col-md-3">
                
            </div>

        </div>
        <br>
        
        <hr>
        <div class= row>
            <div class="col-md-3">
                 
            </div>
            <div class="col-md-3">
                 
                
            </div>            
            <div class="col-md-3" id="rowtotal_total_clp">
                <label for="total_total_clp" id="lbltotal_total_clp" class="control-label col-md-4">Total CLP</label>
                <div class="col-md-8">
                        <input type="text" name="total_total_clp" id="total_total_clp" class="form-control decimal" readonly="true" required="required">
                </div> 

                
            </div>
            <div class="col-md-3" id="rowtotal_total_usd">
                <label for="total_total_usd" id="lbltotal_total_usd" class="control-label col-md-4">Total USD</label>
                <div class="col-md-8">
                        <input type="text" name="total_total_usd" id="total_total_usd" class="form-control decimal" readonly="true" required="required">
                </div>             
            </div>
            <div class="col-md-3" id="rowutilidad_bruto_clp">
                <label for="utilidad_bruto_clp" id="lblutilidad_bruto_clp" class="control-label col-md-4">Utilidad bruto CLP</label>
                <div class="col-md-8">
                        <input type="text" name="utilidad_bruto_clp" id="utilidad_bruto_clp" class="form-control decimal" readonly="true" required="required">
                </div>             
            </div>
            <div class="col-md-3" id="rowutilidad_bruto_usd">
                <label for="utilidad_bruto_usd" id="lblutilidad_bruto_usd" class="control-label col-md-4">Utilidad bruto USD  </label>
                <div class="col-md-8">
                        <input type="text" name="utilidad_bruto_usd" id="utilidad_bruto_usd" class="form-control decimal" readonly="true" required="required">
                </div>
            </div>
            <div class="col-md-3" >
                
            </div>
       
        <br>
        <hr> 
        <h3> Proveedor </h3>     
        <button type="button" class="btn btn-primary" id="btn_proveedor" name="btn_proveedor">Agregar proveedor</button>
        <br><br>
        
        <div class="table-responsive" id="divListaServicios" name="divListaServicios">
   
            <table class="table table-striped " "> 
            
                   <thead>
                    <tr>
                        <th scope="col">Nº </th>
                        <th scope="col">Proveedor </th>
                        <th scope="col">Tipo Servicio </th>
                        <th scope="col">Total Pagar CLP </th>
                        <th scope="col">Total Pagar USD </th>
                        <th scope="col">Editar </th>
                    </tr>
                   </thead>    
                   <tbody>
                        <?php foreach ($servicios as $row ): ?>
                         <?php
                            $tipo_servicio2 = 0;
                            if($row->tipo_servicio == '1')                                       
                            {
                                $tipo_servicio2 = 'Aereo';
                            }
                            if($row->tipo_servicio == '2')                                       
                            {
                                $tipo_servicio2 = 'Terrestre';
                            }
                            if($row->tipo_servicio == '3')                                       
                            {
                                $tipo_servicio2 = 'otro';
                            }
                         ?>
                        
                        <tr>
                            <td><?= $this->Number->format($row->id) ?></td>                        
                            <td><?= h($row->proveedore['name']) ?></td>
                            <td><?= h($tipo_servicio2) ?></td>                            
                            <td><?= h($row->total_pesos) ?></td>
                            <td><?= h($row->total_usd) ?></td> 
                            <td style="text-align: center;">                                 
                                </button>
                                <a class="btn btn-warning btn-xs" href="javascript:modalEditProveedor(<?php echo $row->id; ?> , <?php echo $dolar ?> )" data-toggle="tooltip" data-placement="left" title="Editar servicio"><i class="glyphicon glyphicon-edit" ></i></a>

                                <a class="btn btn-danger btn-xs" href="javascript:deleteServicio(<?php echo $row->id; ?> )" data-toggle="tooltip" data-placement="left" title="Eliminar servicio"><i class="glyphicon glyphicon-trash" ></i></a>

                            </td>
                             
                            
                        </tr>   
                    </tbody>
                   
                    <?php endforeach ?>  
                     <tr> 
                        <td>  </td>
                        <td>  </td>
                        <td> Total : </td>
                            <td> <input type="text" name="total_ficha_clp" id="total_ficha_clp" class="form-control decimal" readonly="true"> </td>
                            <td>  <input type="text" name="total_ficha_usd" id="total_ficha_usd" class="form-control decimal" readonly="true"> </td>
                     </tr>   
                </tbody>
            </table>
        </div>
        

    </fieldset>
    <hr>
    
        
            
            
        
        <div class="row" >            
            <div class="col-md-1" > 
                <a class="btn btn-danger " href="<?php echo APP_URI; ?>fichaNegocios/index/">Cancelar</a>
            </div>
            
            <div class="col-md-1" > 
                <?php
                $estado = $fichaNegocio['estado_ficha_id'];
                if($estado != 6)
                { ?>
                    <button type="button" id="btn_rechazar" name="btn_rechazar" class="btn btn-danger" data-dismiss="modal" >Rechazar</button>
                 <?php
                }
                 ?>
                
            </div>
            <div class="col-md-7" > 
            </div>
            <div class="col-md-1" > 
                <a class="btn btn-primary" href="javascript:verUtilidad(<?php echo $fichaNegocio['id']; ?> )">Ver utilidad</a>
            </div>
            <?php
            $estado = $fichaNegocio['estado_ficha_id'];
            if(is_numeric($estado))
            {
                if($estado == 2 || $estado == 6)
                { ?>
                    <div class="col-md-1" > 
                        <button type="button" id="btn_aprobar" name="btn_aprobar" class="btn btn-default" data-dismiss="modal" >Enviar a aprobación</button>
                    </div>
                    <div class="col-md-1" > 
                <?= $this->Form->submit('Guardar',  array("class" => 'btn btn-success')) ?>
            </div>
          <?php }elseif($estado == 3){?>
                <div class="col-md-1" > 
                        <button type="button" id="btn_control" name="btn_control" class="btn btn-default" data-dismiss="modal" >Enviar a control</button>
                    </div>
          <?php }elseif($estado == 4){?>
                <div class="col-md-1" > 
                        <button type="button" id="btn_contabilidad" name="btn_contabilidad" class="btn btn-default" data-dismiss="modal" >Enviar a contabilidad</button>
                    </div>
          <?php }
                 
            }            
            ?>

            
            
            

        </div>
    </div>
    <?= $this->Form->end() ?>
</div>


<!-- Modal para agregar proveedor -->
<div class="modal fade" id="myProveedor"  role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ficha Nº <?php echo $id; ?> - Agregar proveedor</h4>
              <label for="menuservicio" >Tipo cambio</label>
              <input type="radio" name="menuservicio" id="menu1" value="1" checked="checked">
              <label for="menu1">CLP</label>
              <input type="radio" name="menuservicio" id="menu2" value="2">
              <label for="menu2">USD</label>
      </div>
      <div class="modal-body" >        
        <input type="hidden" name="precio_dolar" id="precio_dolar" value="<?php echo $dolar ?>">
        <input type="hidden" name="id_ficha" id="id_ficha" value="<?php echo $id ?>">

        <div class="row">
            <div class="col-md-4">
                 <label for="tipo_servicio" class="control-label col-md-4">Tipo proveedor (*)</label>
                <div class="col-md-8">
                    <select class="form-control" name="tipo_servicio" id="tipo_servicio" required="true" name="tipo_servicio" style="width: 100%">
                        <option value=""></option>
                        <option value="1">Aereo</option>
                        <option value="2">Terrestre</option>
                        <option value="3">otro</option>                
                    </select>
                </div>     
            </div>       
            <div class="col-md-4">
                <label for="proveedore_id" class="control-label col-md-4">Proveedor</label>
                <div class="col-md-8">
                        <select class="form-control" id="proveedore_id" name="proveedore_id" style="width: 100%"    >
                            <option value=""></option>
                            <?php
                                if(is_array($proveedores) && count($proveedores)>0){

                                    foreach ($proveedores as $row) {
                                        echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                 </div>    
            </div>
            <div class="col-md-4">
                 <label for="condicion_pago" class="control-label col-md-4">Condicion de pago (*)</label>
                <div class="col-md-8">
                     <select class="form-control" name="condicion_pago" id="condicion_pago" style="width: 100%">
                        <option value=""></option>
                        <option value="1">BSP</option>
                        <option value="2">BSP TC</option>
                        <option value="3">PREPAGO</option>  
                        <option value="4">CONTRAFACTURA</option>
                        <option value="5">CONTRA BOLETA HONORARIO</option>
                        <option value="6">TARJETA DE CREDITO</option>  
                        <option value="7">RFEMESA AL EXTRANJERO</option>
                        <option value="8">NETEO ENTRE AGENCIAS </option>
                        <option value="9">NETEO CLIENTE PROVEEDOR</option>                
                    </select>
                </div>     
            </div>        
            <div class="col-md-4">
                 
            </div>            
        </div>
        <br>
        <div class="row">
            <div class="col-md-4" id="rowvalor_neto_clp" >
                <label for="valor_neto" class="control-label col-md-4">Valor neto CLP</label> 
                <div class="col-md-8">
                        <input type="text" name="valor_neto" id="valor_neto" onkeyup="valor_neto()"  class="form-control decimal">
                </div>
            </div>
            <div class="col-md-4" id="rowvalor_neto_usd">
                <label for="valor_neto_usd" class="control-label col-md-4">Valor neto USD</label>
                    <div class="col-md-8">
                        <input type="text" name="valor_neto_usd" onkeyup="valor_neto_usd()" id="valor_neto_usd" class="form-control decimal">
                    </div>

            </div>            
            
            <div class="col-md-4" id="rowtax_clp">
                <label for="tax_clp" class="control-label col-md-4">TAX CLP</label>
                <div class="col-md-8">
                        <input type="text" name="tax_clp" id="tax_clp" onkeyup="tax_usd()" class="form-control decimal">
                </div>
            </div>
            <div class="col-md-4" id="rowtax_usd">
                <label for="tax_usd" class="control-label col-md-4">TAX USD</label>
                <div class="col-md-8" >
                        <input type="text" name="tax_usd" id="tax_usd" onkeyup="tax_clp()" class="form-control decimal">
                </div>

             </div>    
            
            <br>
            
            <div class="col-md-4">

                 
            </div>   
            <br>
            <br>

        </div>         

        <div class="row">
            <div class="col-md-4" id="rowvalor_neto_land_clp">
                <label for="valor_neto_land_clp" class="control-label col-md-4">Valor neto LAND CLP</label>
                <div class="col-md-8">
                        <input type="text" name="valor_neto_land_clp" onkeyup="valor_neto_land_clp()" id="valor_neto_land_clp" class="form-control decimal">
                </div>
            </div>
            <div class="col-md-4" id="rowvalor_neto_land_usd">
                <label for="valor_neto_land_usd" class="control-label col-md-4">Valor neto LAND USD</label>
                <div class="col-md-8">
                        <input type="text" name="valor_neto_land_usd" id="valor_neto_land_usd" onkeyup="valor_neto_land_usd()""  class="form-control decimal">
                </div>
            </div>    
            
            <div class="col-md-4">
                <label for="iva_land_tipo" class="control-label col-md-4">IVA land tipo</label>
                <div class="col-md-8">                        
                        <select class="form-control" id="iva_land_tipo" name="iva_land_tipo" style="width: 100%">
                            <option value=""></option>
                            <option value="1">Afecta a IVA</option>
                            <option value="2">Exenta de IVA</option>
                        </select>
                </div>   
            </div>

            
            <div class="col-md-4" id="rowiva_land_clp">
                <label for="iva_land_pesos" class="control-label col-md-4">IVA land CLP</label>
                <div class="col-md-8">
                        <input type="text" name="iva_land_pesos" id="iva_land_pesos" class="form-control decimal" readonly="true">
                </div>     
            </div>
            <div class="col-md-4" id="rowiva_land_usd">
                <label for="iva_land_usd" class="control-label col-md-4">IVA land USD</label>
                <div class="col-md-8">
                        <input type="text" name="iva_land_usd" id="iva_land_usd" class="form-control decimal" readonly="true">
                </div>
            </div>

                      
                       
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"> 
                <label for="comag_procentaje" class="control-label col-md-4">% Comag</label>
                <div class="col-md-8">
                        <input type="text" name="comag_procentaje" onkeyup="comag_procentaje()" id="comag_procentaje" class="form-control decimal">
                </div>                   
            </div>
            <div class="col-md-4" id="rowcomag_clp"> 
                <label for="comag_pesos" class="control-label col-md-4">Comag CLP</label>
                <div class="col-md-8">
                        <input type="text" name="comag_pesos" id="comag_pesos" class="form-control decimal" readonly="true">
                </div>  
            </div>
            <div class="col-md-4" id="rowcomag_usd"> 
                <label for="comag_usd" class="control-label col-md-4">Comag USD</label>
                <div class="col-md-8">
                        <input type="text" name="comag_usd" id="comag_usd" class="form-control decimal" readonly="true">
                </div>    
                
               
            </div>
            <div class="col-md-4"> 

                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"  id="rowiva_porcentaje">
             <label for="iva_porcentaje" class="control-label col-md-4"> % IVA Comag </label>
                <div class="col-md-8">                        
                        <input type="text" name="iva_porcentaje" id="iva_porcentaje" class="form-control" readonly="true" value="19">
                </div>    
            </div>            
            
            <div class="col-md-4" id="rowiva_clp">
                <label for="iva_pesos" class="control-label col-md-4">Comag IVA CLP</label>
                <div class="col-md-8">
                        <input type="text" name="iva_pesos" id="iva_pesos" class="form-control decimal" readonly="true">
                </div>
            </div>
            <div class="col-md-4" id="rowiva_usd">
                <label for="iva_usd" class="control-label col-md-4">Comag IVA USD</label>
                <div class="col-md-8">
                        <input type="text" name="iva_usd" id="iva_usd" class="form-control decimal" readonly="true">
                </div>

            </div>            
            <div class="col-md-4">
                
                
                
            </div>            
                      
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="over_porcentaje" class="control-label col-md-4">% Over</label>
                <div class="col-md-8">
                        <input type="text" name="over_porcentaje" id="over_porcentaje" class="form-control decimal" onkeyup="over_porcentaje()">
                </div>
                
               

            </div>
            <div class="col-md-4" id="rowover_clp">
                 <label for="over_pesos" class="control-label col-md-4">Over CLP</label>
                <div class="col-md-8">
                        <input type="text" name="over_pesos" id="over_pesos" class="form-control decimal" readonly="true"">
                </div>
            </div>
            <div class="col-md-4" id="rowover_usd">
                <label for="over_usd" class="control-label col-md-4">Over USD</label>
                <div class="col-md-8">
                        <input type="text" name="over_usd" id="over_usd" class="form-control decimal" readonly="true"">
                </div>
                 
                 
            </div>
            <div class="col-md-4">
               
                 
                
            </div>
            
        </div>
        <br>
         <div class="row">
            <div class="col-md-4">
                 <label for="amex_porcentaje" class="control-label col-md-4">% Amex</label>
                <div class="col-md-8">
                        <input type="text" name="amex_porcentaje" id="amex_porcentaje" class="form-control decimal" onkeyup="amex_porcentaje()">
                </div>
                
                
            </div>
            <div class="col-md-4" id="rowamex_clp">
                <label for="amex_pesos" class="control-label col-md-4">Amex CLP</label>
                <div class="col-md-8">
                        <input type="text" name="amex_pesos" id="amex_pesos" class="form-control decimal" readonly="true"">
                </div>
            </div>
            <div class="col-md-4" id="rowamex_usd">

                 <label for="amex_usd" class="control-label col-md-4">Amex USD</label>
                <div class="col-md-8">
                        <input type="text" name="amex_usd" id="amex_usd" class="form-control decimal" readonly="true"" >
                </div>
            </div>
                
            </div>
            <div class="col-md-4">

            </div>
           
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="boleta_honorario_porcentaje" class="control-label col-md-4">% boleta de honorarios</label>
                <div class="col-md-8">
                        <input type="text" name="boleta_honorario_porcentaje"  id="boleta_honorario_porcentaje" class="form-control" readonly="true"/>
                </div>
            </div>
            <div class="col-md-4" id="rowboleta_honorario_clp">
                <label for="boleta_honorario_clp" class="control-label col-md-4">Boleta de honorario CLP </label>
                <div class="col-md-8">
                        <input type="text" name="boleta_honorario_clp" id="boleta_honorario_clp" class="form-control decimal" readonly="true">                            
                </div>
            </div>
            <div class="col-md-4" id="rowboleta_honorario_usd">
                <label for="boleta_honorario_usd" class="control-label col-md-4">Boleta de honorarios USD</label>
                <div class="col-md-8">
                        <input type="text" name="boleta_honorario_usd" id="boleta_honorario_usd" class="form-control decimal" readonly="true" >
                </div>
            </div>
            <div class="col-md-4">

            </div>
            

                
                
        </div>
        <div class="row">
            
            <div class="col-md-4" id="rowneto_comag_clp">
                <label for="neto_comag_pesos" class="control-label col-md-4">Neto comag CLP</label>
                <div class="col-md-8">
                        <input type="text" name="neto_comag_pesos" id="neto_comag_pesos" class="form-control decimal" readonly="true""> 
                </div>
            </div>
             <div class="col-md-4" id="rowneto_comag_usd">
                <label for="neto_comag_usd"   class="control-label col-md-4">Neto comag USD</label>
                <div class="col-md-8">
                        <input type="text" name="neto_comag_usd" id="neto_comag_usd" class="form-control decimal" readonly="true" >
                </div> 
            </div>                
                        
            <div class="col-md-4">
                 
            </div>
            <div class="col-md-4">
                 
            </div>
            
        </div>
        
        <hr>
        <div class="row">
            <div class="col-md-4" id="rowtotal_clp">
                <label for="total_clp" class="control-label col-md-4">Total a pagar CLP</label>
                <div class="col-md-8">
                        <input type="text" name="total_clp" id="total_clp"" class="form-control decimal" readonly="true">
                </div>
            </div>
            <div class="col-md-4" id="rowtotal_usd"> 
                <label for="total_usd" class="control-label col-md-4">Total a pagar USD</label>
                <div class="col-md-8">
                        <input type="text" name="total_usd" id="total_usd" class="form-control decimal" readonly="true">
                </div>
            </div>
            <div class="col-md-4" id="rowtotal_contabilidad_clp">
                <label for="total_contabilidad_pesos" class="control-label col-md-4">Total a contabilidad CLP</label>
                <div class="col-md-8">
                        <input type="text" name="total_contabilidad_pesos" id="total_contabilidad_pesos"  class="form-control decimal" readonly="true">
                </div> 
            </div>
            <div class="col-md-4" id="rowtotal_contabilidad_usd">
                <label for="total_contabilidad_usd" class="control-label col-md-4">Total a contabilidad USD</label>
                <div class="col-md-8">
                        <input type="text" name="total_contabilidad_usd" id="total_contabilidad_usd"  class="form-control decimal" readonly="true">
                </div>      
               
            </div>
            <div class="col-md-4">

            </div>
           
        </div>
        

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_agregar_servicio" name="btn_agregar_servicio">Guardar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal para editar proveedor -->
<div class="modal fade" id="modalEditProveedor"  role="dialog" aria-labelledby="myModalLabel" >    
  <div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label name="labelmodalUtilidad" id="labelmodalUtilidad"></label>
        <br>
              <label for="menu" >Tipo cambio</label>
              <input type="radio" name="menuservicio" id="menu1" value="1" checked="checked">
              <label for="menu1">CLP</label>
              <input type="radio" name="menuservicio" id="menu2" value="2">
              <label for="menu2">USD</label>
      </div>
      <div class="modal-body" >
        <input type="hidden" name="id_servicio2" id="id_servicio2" ">        
        <input type="hidden" name="precio_dolar2" id="precio_dolar2" value="<?php echo $dolar ?>">

        <div class="row">
            <div class="col-md-4">
                 <label for="tipo_servicio2" class="control-label col-md-4">Tipo proveedor (*)</label>
            
                <div class="col-md-8">
                    <select class="form-control" name="tipo_servicio2" id="tipo_servicio2" required="true" name="tipo_servicio" style="width: 100%">
                        <option value=""></option>
                        <option value="1">Aereo</option>
                        <option value="2">Terrestre</option>
                        <option value="3">otro</option>                
                    </select>
                </div>     
            </div>       
            <div class="col-md-4">
                <label for="proveedore_id2" class="control-label col-md-4">Proveedor</label>
                <div class="col-md-8">
                        <select class="form-control" id="proveedore_id2" name="proveedore_id2" style="width: 100%"    >
                            <option value=""></option>
                            <?php
                                if(is_array($proveedores) && count($proveedores)>0){

                                    foreach ($proveedores as $row) {
                                        echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                 </div>    
            </div>
            <div class="col-md-4">
                 <label for="condicion_pago2" class="control-label col-md-4">Condicion de pago (*)</label>
                <div class="col-md-8">
                     <select class="form-control" name="condicion_pago2" id="condicion_pago2"  style="width: 100%">
                        <option value=""></option>
                        <option value="1">BSP</option>
                        <option value="2">BSP TC</option>
                        <option value="3">PREPAGO</option>  
                        <option value="4">CONTRAFACTURA</option>
                        <option value="5">CONTRA BOLETA HONORARIO</option>
                        <option value="6">TARJETA DE CREDITO</option>  
                        <option value="7">TEMESA AL EXTRANJERO</option>
                        <option value="8">NETEO ENTRE AGENCIAS </option>
                        <option value="9">NETEO CLIENTE PROVEEDOR</option>                
                    </select>
                </div>     
            </div>        
            <div class="col-md-4">
                 
            </div>            
        </div>
        <br>
        <div class="row">
            <div class="col-md-4" id="rowvalor_neto_clp2">
                <label for="valor_neto2" class="control-label col-md-4">Valor neto CLP</label> 
                <div class="col-md-8">
                        <input type="text" name="valor_neto2" onkeyup="valor_neto2()" id="valor_neto2" class="form-control decimal">
                </div>
            </div>
            <div class="col-md-4" id="rowvalor_neto_usd2">
                <label for="valor_neto_usd2" class="control-label col-md-4">Valor neto USD</label>
                    <div class="col-md-8">
                        <input type="text" name="valor_neto_usd2" onkeyup="valor_neto_usd2()" id="valor_neto_usd2" class="form-control decimal">
                    </div>
                
            </div>            
            
            <div class="col-md-4" id="rowvalor_neto_land_clp2">
                <label for="valor_neto_land_clp2" class="control-label col-md-4">Valor neto LAND CLP</label>
                <div class="col-md-8">
                        <input type="text" name="valor_neto_land_clp2" onkeyup="valor_neto_land_clp2()" id="valor_neto_land_clp2" class="form-control decimal">
                </div>
            </div>
            <div class="col-md-4" id="rowvalor_neto_land_usd2">
                 <label for="valor_neto_land_usd2" class="control-label col-md-4">Valor neto LAND USD</label>
                <div class="col-md-8">
                        <input type="text" name="valor_neto_land_usd2" id="valor_neto_land_usd2" onkeyup="valor_neto_land_usd2()""  class="form-control decimal">
                </div>
                
                 
            </div>            
            <div class="col-md-4">
                    
                 
            </div>            
                       
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"> 
                <label for="iva_land_tipo2" class="control-label col-md-4">IVA land tipo</label>
                <div class="col-md-8">                        
                        <select class="form-control" id="iva_land_tipo2" name="iva_land_tipo2" style="width: 100%">
                            <option value=""></option>
                            <option value="1">Afecta a IVA</option>
                            <option value="2">Exenta de IVA</option>
                        </select>
                </div>  
            </div>
            <div class="col-md-4" id="rowtax_clp2">
                  <label for="tax_clp2" class="control-label col-md-4">TAX CLP</label>
                <div class="col-md-8">
                        <input type="text" name="tax_clp2" id="tax_clp2" onkeyup="tax_usd2()" class="form-control decimal">
                </div>
            </div>
            <div class="col-md-4" id="rowtax_usd2">
                <label for="tax_usd2" class="control-label col-md-4">TAX USD</label>
                <div class="col-md-8">
                        <input type="text" name="tax_usd2" id="tax_usd2" onkeyup="tax_clp2()" class="form-control decimal">
                </div>
            </div>
            
            
            <div class="col-md-4"> 
                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="comag_procentaje2" class="control-label col-md-4">% Comag</label>
                <div class="col-md-8">
                        <input type="text" name="comag_procentaje2" onkeyup="comag_procentaje2()" id="comag_procentaje2" class="form-control decimal">
                </div>   
            </div>            
            
            <div class="col-md-4" id="rowcomag_clp2">
                <label for="comag_pesos2" class="control-label col-md-4">Comag CLP</label>
                <div class="col-md-8">
                        <input type="text" name="comag_pesos2" id="comag_pesos2" class="form-control decimal" readonly="true">
                </div>
            </div>
            <div class="col-md-4" id="rowcomag_usd2">
                 <label for="comag_usd2" class="control-label col-md-4">Comag USD</label>
                <div class="col-md-8">
                        <input type="text" name="comag_usd2" id="comag_usd2" class="form-control decimal" readonly="true">
                </div> 
                 
            </div>            
            <div class="col-md-4">
                
            </div>            
                      
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="iva_porcentaje2" class="control-label col-md-4">% Iva comag  </label>
                <div class="col-md-8">
                        <input type="text" name="iva_porcentaje2" id="iva_porcentaje2" class="form-control"  readonly="true">
                </div>
                 
            </div>
            <div class="col-md-4" id="rowiva_clp2">
                   <label for="iva_pesos2" class="control-label col-md-4">Comag IVA CLP</label>
                <div class="col-md-8">
                        <input type="text" name="iva_pesos2" id="iva_pesos2" class="form-control decimal" readonly="true">
                </div>
            </div>
            <div class="col-md-4" id="rowiva_usd2">
                 <label for="iva_usd2" class="control-label col-md-4">Comag IVA USD</label>
                <div class="col-md-8">
                        <input type="text" name="iva_usd2" id="iva_usd2" class="form-control decimal" readonly="true">
                </div>
            </div>
            <div class="col-md-4">
                  
            </div>
            
        </div>
        <br>
         <div class="row">
            <div class="col-md-4">
                <label for="over_porcentaje2" class="control-label col-md-4">% Over</label>
                <div class="col-md-8">
                        <input type="text" name="over_porcentaje2" id="over_porcentaje2" class="form-control decimal" onkeyup="over_porcentaje2()">
                </div>
                            
            </div>
            <div class="col-md-4" id="rowover_clp2">
                <label for="over_pesos2" class="control-label col-md-4">Over CLP</label>
                <div class="col-md-8">
                        <input type="text" name="over_pesos2" id="over_pesos2" class="form-control decimal" readonly="true"">
                </div>            
            </div>
            <div class="col-md-4" id="rowover_usd2">
                <label for="over_usd2" class="control-label col-md-4">Over USD</label>
                <div class="col-md-8">
                        <input type="text" name="over_usd2" id="over_usd2" class="form-control decimal" readonly="true"">
                </div>
                
            </div>
            <div class="col-md-4">
               
            </div>
           
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                 <label for="amex_porcentaje2" class="control-label col-md-4">% Amex</label>
                <div class="col-md-8">
                        <input type="text" name="amex_porcentaje2" id="amex_porcentaje2" class="form-control decimal" onkeyup="amex_porcentaje2()">
                </div>
                
            </div>
            <div class="col-md-4" id="rowamex_clp2">
                  <label for="amex_pesos2" class="control-label col-md-4">Amex CLP</label>
                <div class="col-md-8">
                        <input type="text" name="amex_pesos2" id="amex_pesos2" class="form-control decimal" readonly="true"">
                </div>
            </div>
            <div class="col-md-4" id="rowamex_usd2">
                  <label for="amex_usd2" class="control-label col-md-4">Amex USD</label>
                <div class="col-md-8">
                        <input type="text" name="amex_usd2" id="amex_usd2" class="form-control decimal" readonly="true"" >
                </div>
                 
            </div>
            <div class="col-md-4">
                 
            </div>
            
        </div>
        
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="boleta_honorario_porcentaje2" class="control-label col-md-4">% boleta de honorarios</label>
                <div class="col-md-8">
                        <input type="text" name="boleta_honorario_porcentaje2"  id="boleta_honorario_porcentaje2" class="form-control decimal" disabled="disabled">
                </div>
               
            </div>
            <div class="col-md-4" id="rowboleta_honorario_clp2">
                    <label for="boleta_honorario_pesos2" class="control-label col-md-4">Boleta de honorario CLP </label>
                <div class="col-md-8">
                        <input type="text" name="boleta_honorario_pesos2" id="boleta_honorario_pesos2" class="form-control decimal" readonly="true"">
                </div>
            </div>
            <div class="col-md-4" id="rowboleta_honorario_usd2">
                <label for="boleta_honorario_usd2" class="control-label col-md-4">Boleta de honorarios USD</label>
                <div class="col-md-8">
                        <input type="text" name="boleta_honorario_usd2" id="boleta_honorario_usd2" class="form-control decimal" readonly="true"">
                </div>
            </div>
            <div class="col-md-4">
              
            </div>
           
        </div>
        <br>
        <div class="row">
            <div class="col-md-4" id="rowneto_comag_clp2">
                 <label for="neto_comag_pesos"2 class="control-label col-md-4">Neto comag CLP</label>
                <div class="col-md-8">
                        <input type="text" name="neto_comag_pesos2" id="neto_comag_pesos2" class="form-control decimal" readonly="true""> 
                </div>
            </div>
            <div class="col-md-4" id="rowneto_comag_usd2">
                <label for="neto_comag_pesos2" class="control-label col-md-4">Neto comag USD</label>
                <div class="col-md-8" id="rowneto_comag_usd2">
                        <input type="text" name="neto_comag_usd2" id="neto_comag_usd2" class="form-control decimal" readonly="true">
                </div> 
            </div>
            <div class="col-md-4" id="rowiva_land_clp2"> 
                <label for="iva_land_pesos2" class="control-label col-md-4">IVA land CLP</label>
                <div class="col-md-8">
                        <input type="text" name="iva_land_pesos2" id="iva_land_pesos2" class="form-control decimal" readonly="true">
                </div>
            </div>
            <div class="col-md-4" id="rowiva_land_usd2"> 
                <label for="iva_land_usd2" class="control-label col-md-4">IVA land USD</label>
                <div class="col-md-8">
                        <input type="text" name="iva_land_usd2" id="iva_land_usd2" class="form-control decimal" readonly="true">
                </div>
               
            </div>

            <div class="col-md-4">
                 
            </div>
           
        </div>        
        <hr>
         <div class="row">
             <div class="col-md-4">
                            
            </div>
             <div class="col-md-4" id="rowtotal_clp2">
               <label for="total_clp2" class="control-label col-md-4">Total a pagar CLP</label>
                <div class="col-md-8">
                        <input type="text" name="total_clp2" id="total_clp2"" class="form-control decimal" readonly="true">
                </div> 
            </div>
            <div class="col-md-4" id="rowtotal_usd2">
                <label for="total_usd2" class="control-label col-md-4">Total a pagar USD</label>
                <div class="col-md-8">
                        <input type="text" name="total_usd2" id="total_usd2" class="form-control decimal" readonly="true">
                </div>
            </div>
             <div class="col-md-4" id="rowtotal_contabilidad_clp2">
                  <label for="total_contabilidad_pesos2" class="control-label col-md-4">Total a contabilidad CLP</label>
                <div class="col-md-8">
                        <input type="text" name="total_contabilidad_pesos2" id="total_contabilidad_pesos2"  class="form-control decimal" readonly="true">
                </div>
            </div>
            <div class="col-md-4" id="rowtotal_contabilidad_usd2">
                <label for="total_contabilidad_usd2" class="control-label col-md-4">Total a contabilidad USD</label>
                <div class="col-md-8">
                        <input type="text" name="total_contabilidad_usd2" id="total_contabilidad_usd2"  class="form-control decimal" readonly="true">
                </div>
            </div>         
        
        <hr>
       <br>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn_guardar_servicio" name="btn_guardar_servicio">Guardar</button>
        </div>


      </div>      
    </div>
    </div>
  </div>
</div>

<!-- Modal para  enviar aprobar ficha-->
<div class="modal fade" id="modalAprobarFicha"  role="dialog" aria-labelledby="myModalLabel" >    
  <div class="modal-dialog" role="document" ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label name="labelmodalaprobar" id="labelmodalaprobar"></label>
        <br>         
      </div>
      <div class="modal-body" >
        <input type="hidden" name="id_ficha2" id="id_ficha2" ">        
        
        <div class="row" style="text-align: center;">
                <label name="labelbodyaprobar" id="labelbodyaprobar"></label>                                
        </div>
        <label for="comentarios" >Comentarios</label>
        <textarea class="form-control" name="comentarios" id="comentarios" rows="4"></textarea>
        

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>            
            <?php 
            $estado = $fichaNegocio['estado_ficha_id'];
            if(is_numeric($estado))
            {
                 
                if($estado == '1')
                { ?>
                    <button type="button" class="btn btn-primary" id="btn_aprobar2" name="btn_aprobar2">Aceptar</button>                   
                 <?php

                }if($estado == '6')
                { ?>
                    <button type="button" class="btn btn-primary" id="btn_aprobar2" name="btn_aprobar2">Aceptar</button>                   
                 <?php
                 
                }elseif ($estado == '2') { ?>
                    <button type="button" class="btn btn-primary" id="btn_aprobar2" name="btn_aprobar2">Aceptar</button>
                <?php 
                }elseif ($estado == '3') { ?>
                    <button type="button" class="btn btn-primary" id="btn_control2" name="btn_control2">Aceptar</button>

                <?php }elseif ($estado == '4') { ?>
                    <button type="button" class="btn btn-primary" id="btn_contabilidad2" name="btn_control2">Aceptar</button>                    
                <?php
                } 
                
            }?>    

            
            
        </div>


      </div>      
    </div>
    </div>
  </div>
</div>
<!-- Modal para  rechazar ficha-->
<div class="modal fade" id="modalRechazarFicha"  role="dialog" aria-labelledby="myModalLabel" >    
  <div class="modal-dialog" role="document" ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label name="labelmodalrechazar" id="labelmodalrechazar"></label>
        
      </div>
      <div class="modal-body" >
        <input type="hidden" name="id_ficha2" id="id_ficha2" ">         
        <label name="labelbodyrechazar" id="labelbodyaprobar"></label>
        <div class="row" style="text-align: center;">
                <?php echo "<h3>Esta seguro que decea rechazar la ficha nº".$fichaNegocio[0]['id']."<h3>" ?> 
        </div>
            <label for="observacionrechazo" >Comentarios</label>
           <textarea class="form-control col-xs-12" id="observacionrechazo" name="observacionrechazo" rows="4"></textarea>
           <br>
           <br>
           <br>
           <br>
           <hr>
        

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn_rechazar_ficha2" name="btn_rechazar_ficha2">Aceptar</button>
        </div>


      </div>      
    </div>
    </div>
  </div>
</div>

<!-- Modal para ver  utilidad -->
<div class="modal fade" id="modalVerutilidad"  role="dialog" aria-labelledby="myModalLabel" >    
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label name="labelFit" id="labelModalEdit"></label>
        <br>
         <input type="radio" name="menuutilidad" id="menu1" value="1" checked="checked">
              <label for="menu1">CLP</label>
              <input type="radio" name="menuutilidad" id="menu2" value="2">
              <label for="menu2">USD</label>
      </div>
      <div class="modal-body" >
        <input type="hidden" name="ficha_id" id="ficha_id" >        
        <div class="row" id="rowtotal_comag_clp">
            
                <label for="total_comag_clp" id="lbltotal_comag_clp" class="control-label col-md-4">Total Comag CLP</label>
                <div class="col-md-6">
                    <input type="text" name="total_comag_clp"  id="total_comag_clp" class="form-control decimal" readonly="true">
                </div>            
        </div>
        <div class="row" id="rowtotal_comag_usd">
                <label for="rowtotal_comag_usd" id="lbltotal_comag_usd" class="control-label col-md-4">Total Comag USD</label>
                <div class="col-md-6">
                    <input type="text" name="total_comag_usd"  id="total_comag_usd" class="form-control decimal" readonly="true">
                </div>            
        </div>
        <br>
        <div class="row" id="rowtotal_fee_clp">
            
                <label for="total_fee_clp" id="lbltotal_fee_clp" class="control-label col-md-4">Total FEE CLP</label>
                <div class="col-md-6">
                    <input type="text" name="total_fee_clp"  id="total_fee_clp" class="form-control decimal" readonly="true">
                </div>            
        </div>
        <div class="row" id="rowtotal_fee_usd">
                <label for="total_fee_usd" id="lbltotal_fee_usd" class="control-label col-md-4">Total FEE USD</label>
                <div class="col-md-6">
                    <input type="text" name="total_fee_usd"  id="total_fee_usd" class="form-control decimal" readonly="true">
                </div>          
        </div>
        <br>

        <div class="row" id="rowdiferencia_clp">
            
                <label for="total_diferencia_clp" id="lbltotal_diferencia_clp" class="control-label col-md-4">Diferencia CLP</label>
                <div class="col-md-6">
                    <input type="text" name="diferencia_clp"  id="diferencia_clp" class="form-control decimal" readonly="true">
                </div>            
        </div>

        <div class="row" id="rowdiferencia_usd">
                <label for="total_diferencia_usd" id="lbltotal_diferencia_usd" class="control-label col-md-4">Diferencia  USD</label>
                <div class="col-md-6">
                    <input type="text" name="diferencia_usd"  id="diferencia_usd" class="form-control decimal" readonly="true">
                </div>           
        </div>

        <br>
        <div class="row" id="rowtotal_cobro_tc_clp">            
            <label for="total_cobro_tc_clp" id="lbltotal_cobro_tc_clp" class="control-label col-md-4">5% Cobro TC CLP </label>
            <div class="col-md-6">
                <input type="text" name="total_cobro_tc_clp"  id="total_cobro_tc_clp" class="form-control decimal" readonly="true">
            </div>            
        </div>

        <div class="row" id="rowtotal_cobro_tc_usd">
            <label for="total_cobro_tc_usd" id="lbltotal_cobro_tc_usd" class="control-label col-md-4">5% Cobro TC USD</label>
            <div class="col-md-6">
                <input type="text" name="total_cobro_tc_usd"  id="total_cobro_tc_usd" class="form-control decimal" readonly="true">
            </div>           
        </div>
        <br>
        <div class="row" id="rowtotal_descuento_clp">
            
                <label for="total_descuento_clp" id="lbltotaldescuento_clp" class="control-label col-md-4">Descuento CLP</label>
                <div class="col-md-6">
                    <input type="text" name="total_descuento_clp"  id="total_descuento_clp" class="form-control decimal" readonly="true">
                </div>            
        </div>
        <div class="row" id="rowtotal_descuento_usd">
                <label for="total_descuento_usd" id="lbltotal_descuento_usd" class="control-label col-md-4">Descuento USD</label>
                <div class="col-md-6">
                    <input type="text" name="total_descuento_usd"  id="total_descuento_usd" class="form-control decimal" readonly="true">
                </div>           
        </div>        
        
        <br>
      <div class="row" id="rowcargo_tc_clp">
            
                <label for="cargo_tc_clp" id="lblcargo_tc_clp" class="control-label col-md-4">Cargo TC CLP</label>
                <div class="col-md-6">
                    <input type="text" name="cargo_tc_clp"  id="cargo_tc_clp" class="form-control decimal" readonly="true">
                </div>            
        </div>
        <div class="row" id="rowcargo_tc_usd">

                <label for="cargo_tc_usd" id="lblcargo_tc_usd" class="control-label col-md-4">Cargo TC USD</label>
                <div class="col-md-6">
                    <input type="text" name="cargo_tc_usd"  id="cargo_tc_usd" class="form-control decimal" readonly="true">
                </div>           
        </div>        
        <br>
        <div class="row" id="rowcargo_remesa_clp">
            
                <label for="cargo_remesa_clp"   id="lblcargo_remesa_clp"  class="control-label col-md-4">Cargo remesa CLP</label>
                <div class="col-md-6">
                    <input type="text" name="cargo_remesa_clp"  id="cargo_remesa_clp" class="form-control decimal" readonly="true">
                </div>    
        </div>
        <div class="row" id="rowcargo_remesa_usd">
                <label for="cargo_remesa_usd" id="lblcargo_remesa_usd" class="control-label col-md-4">Cargo remesa USD</label>
                <div class="col-md-6">
                    <input type="text" name="cargo_remesa_usd"  id="cargo_remesa_usd" class="form-control decimal" readonly="true">
                </div>      

        </div>
        <hr>
        
        
        <div class="row" id="rowutilidad_clp">
            
                <label for="utilidad_clp"   id="lblutilidad_clp"  class="control-label col-md-4">Utilidad CLP</label>
                <div class="col-md-6">
                    <input type="text" name="utilidad_clp"  id="utilidad_clp" class="form-control decimal" readonly="true">
                </div>    
        </div>
        <div class="row" id="rowutilidad_usd">
                <label for="utilidad_usd" id="lblutilidad_usd" class="control-label col-md-4">Utilidad USD</label>
                <div class="col-md-6">
                    <input type="text" name="utilidad_usd"  id="utilidad_usd" class="form-control decimal" readonly="true">
                </div>      

        </div>
        <br>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn_guardar_servicio" name="btn_guardar_servicio">Guardar</button>
        </div>


      </div>      
    </div>
    </div>
  </div>
</div>



