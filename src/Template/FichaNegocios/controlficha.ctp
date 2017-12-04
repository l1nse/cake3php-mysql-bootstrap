<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('fichaNegociosIndex') ?>
<h3><?= __('Control ficha') ?></h3>
<div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>fichaNegocios/newAdd/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Ficha de negocios </a>
        </div>
    </div>

<div class="table-responsive" style="overflow: hidden;">
    
    <table class="table table-striped data-table"> 
        <thead>
            <tr>
                <th scope="col">id</th>                
                               
                <th scope="col">cliente</th>   
                <th scope="col">fecha emisión</th>                
                <th scope="col">fecha pago</th>                               
                <th scope="col">Total CLP</th>
                <th scope="col">Total USD</th>                 
                <th scope="col">Utilidad bruto CLP</th>
                <th scope="col">Utilidad bruto USD</th>                
                <th scope="col">Estado</th>                
                <th scope="col">Acciones</th>            
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fichaNegocios as $row): ?> 
            <tr>
                <td><?= h($row['id']) ?></td>                
                          
                <td><?= h($row['cliente']['name'])?></td>
                
                <td><?= h($row['fecha']) ?></td>              
                
                <?php
                    $date = $row->created;                                        
                ?>
                <td><?= h($date->format('d/m/Y')) ?></td>
                <td ><?= h($row['total_clp']) ?></th>
                <td ><?= h($row['total_usd']) ?></th> 
                <td ><?= h($row['utilidad_bruto_clp']) ?></th>
                <td ><?= h($row['utilidad_bruto_usd']) ?></th>                     
                
                 <?php
                if(isset($row->estado_ficha_id)){
                    if($row->estado_ficha_id =='1'){
                        $estado =  '<span class="label label-success">Creada</span>';
                        
                    }elseif($row->estado_ficha_id=='2'){
                        
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }elseif ($row->estado_ficha_id=='3') {
                        $estado =  '<span class="label label-danger">Espera aprobación</span>';
                        
                    }
                    elseif ($row->estado_ficha_id=='4') {
                        $estado =  '<span class="label label-danger">Espera control</span>';
                        
                    }
                    elseif ($row->estado_ficha_id=='5') {
                        $estado =  '<span class="label label-danger">Espera contabilidad</span>';
                        
                    }
                    elseif ($row->estado_ficha_id=='6') {
                        $estado =  '<span class="label label-danger">Rechazada</span>';
                        
                    }

                    else{
                        $estado =  '';
                    }
                }

                ?>

                
                <td style="text-align: left;"><?= $estado;  ?></td>
                <td>
                
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>fichaNegocios/add/<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="left" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>   

                    <a class="btn btn-primary btn-xs" href="javascript:verUtilidad(<?php echo $row->id; ?> )" data-toggle="tooltip" data-placement="left"  title="Ver utilidad"><i class="glyphicon glyphicon-search" ></i></a>
                </td>
                
                
                
            
                
            </tr>
            <?php endforeach; ?>            
        </tbody>
    </table>
        
        
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
         <input type="radio" name="menu" id="menu1" value="1" checked="checked">
              <label for="menu1">CLP</label>
              <input type="radio" name="menu" id="menu2" value="2">
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

<!-- Modal para  aceptar enviar a contabilidad ficha-->
<div class="modal fade" id="modalControlFicha"  role="dialog" aria-labelledby="myModalLabel" >    
  <div class="modal-dialog" role="document" ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3> aprobar ficha </h3>
        <br>         
      </div>
      <div class="modal-body" >
        <input type="hidden" name="id_ficha2" id="id_ficha2" ">        
        
        <div class="row" style="text-align: center;">
                <?php echo "<h3>Esta seguro que decea enviar a contabilidad la ficha nº".$fichaNegocios[0]['id']."<h3>" ?> 
        </div>

        <textarea class="form-control col-xs-12" id="observacioncontrol" name="observacionrechazo" rows="4"></textarea>
           <br>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn_control" name="btn_control">Aceptar</button>
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
        <h3>Rechazar ficha</h3>
        
      </div>
      <div class="modal-body" >
        <input type="hidden" name="id_ficha2" id="id_ficha2" ">        
        
        <div class="row" style="text-align: center;">
                <?php echo "<h3>Esta seguro que decea rechazar la ficha nº".$fichaNegocios[0]['id']."<h3>" ?> 
        </div>
        
           <textarea class="form-control col-xs-12" id="observacionrechazo" name="observacionrechazo" rows="4"></textarea>
           <br>
        

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn_rechazar_ficha" name="btn_rechazar_ficha">Aceptar</button>
        </div>


      </div>      
    </div>
    </div>
  </div>
</div>



