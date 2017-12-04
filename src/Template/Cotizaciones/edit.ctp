<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('cotizaciones') ?>
<div  id="flashMessage"></div>

<div class="cotizaciones form large-9 medium-8 columns content ">
    <fieldset>
        <legend><?= __('Crear Cotización') ?></legend>
        <!--<div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>-->

    </fieldset>
</div>
<br>
<!-- buscar cliente desde Softland -->
<div class="content">
    <?= $this->Form->create($cotizacione, ['class' => 'form-horizontal well']) ?>
    <div class="form-group">
        <label class="col-md-1 control-label" for="rut_aux">RUT (*):</label>
        <div class="col-md-3">
            <input type="text" name="rut_aux" id="rut_aux" value="<?php echo $rs_cotizacione[0]['entidade']['rut']; ?>" class="form-control" maxlength="12" disabled>
        </div>
        <label class="col-md-1 control-label" for="nombre_aux">Nombre (*):</label>
        <div class="col-md-3">
            <input type="text" name="nombre_aux" id="nombre_aux" value="<?php echo $rs_cotizacione[0]['entidade']['name']; ?>" class="form-control" maxlength="12" disabled>
        </div>
        <div class="col-md-3"></div>
    </div>
    <?= $this->Form->end() ?>        

</div>
<!-- agregar clientes -->
<div class="content">
<?= $this->Form->create($cotizacione, ['class' => 'form-horizontal well', 'id' => 'pasajeros']) ?>
    <div class="form-group">
        <label class="col-md-2 control-label" for="rut_aux">Nombre Pasajero (*):</label>
        <div class="col-md-3">
            <input type="text" name="nombre_pasajero" id="nombre_pasajero" class="form-control" maxlength="50">
        </div>
        <div class="col-md-1">
            <button class="btn btn-success" type="button" id="btn_add_pasajero" name="btn_add_pasajero"><i class="glyphicon glyphicon glyphicon-plus-sign"></i> Agregar</button>
        </div>
        
        <div class="col-md-6" id="divPasajeros">
            <div class="table-responsive">
                <table class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th style="text-align: center;">N°</th>
                            <th style="text-align: center;">Nombre pasajero</th>
                            <th style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $i = 1;
                    $contador = 0;
                    $total = 0; 
                    foreach ($rs_cotizacione[0]['pasajeros'] as $row) {
                        echo '<tr>';
                        echo '<td style="text-align: center;">'.$i.'</td>';
                        echo '<td>'.$row['name'] .'</td>';
                        
                        //echo '<td>'.$row['descripcion'].'</td>';
                        echo '<td style="text-align: center;"><a class="btn btn-danger btn-xs" href="javascript:delPasajero(\''.$contador.'\')" data-toggle="tooltip"  data-toggle="tooltip" data-placement="left" title="Seleccionar"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        echo '</tr>';
                        $i++;
                        $contador++;
                        
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>        

</div>
<!-- agregar clientes -->
<div class="content">
<?= $this->Form->create('', ['class' => 'form-horizontal well', 'id' => 'form_item', 'name' => 'form_item']) ?>
    <div class="form-group">
        <label class="col-md-2 control-label" for="tipo_item">Concepto (*):</label>
        <div class="col-md-2">
            <select class="form-control" required="required" id="tipo_item" name="tipo_item" required>
                <option value=""></option>
            <?php
                if(is_array($tipo_item) && count($tipo_item)>0){
                    foreach ($tipo_item as $row) {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                }
            ?>
            </select>
        </div>
        <label class="col-md-1 control-label" for="tipo_cambio">Tipo Cambio (*):</label>
        <div class="col-md-2">
            <select class="form-control" required="required" id="tipo_cambio" name="tipo_cambio" required>
                <option value=""></option>
            <?php
                if(is_array($tipo_cambio) && count($tipo_cambio)>0){
                    foreach ($tipo_cambio as $row) {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                    }
                }
            ?>
            </select>
        </div>
        <label class="col-md-1 control-label" for="valor">Valor (*):</label>
        <div class="col-md-2">
           <input type="text" name="valor" id="valor" class="form-control decimal" value="" maxlength="15" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-1 control-label" for="descripcion">Descripción:</label>
        <div class="col-md-11">
           <textarea class="form-control textarea_add" id="descripcion" name="descripcion"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-1 col-md-offset-11">
            <button class="btn btn-success" type="button" id="btn_add_item" name="btn_add_item"><i class="glyphicon glyphicon glyphicon-plus-sign"></i> Agregar</button>
        </div>
    </div>
    <div class="form-group" id="divItems">
        <div class="table-responsive">
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th style="text-align: center;">N°</th>
                        <th style="text-align: center;">Item</th>
                        <th style="text-align: center;">Tipo Cambio</th>
                        <th style="text-align: center;">Valor</th>
                        <th style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    $contador = 0;
                    $total = 0; 
                    foreach ($rs_cotizacione[0]['item_cotizaciones'] as $row) {
                        if($contador=='0'){
                            $total = $row['valor'];
                        }else{
                            $total = $row['valor']+$total;
                        }
                        echo '<tr>';
                        echo '<td style="text-align: center;">'.$i.'</td>';
                        echo '<td>'.$row['tipo_cambio']['name'] .'</td>';
                        echo '<td>'.$row['tipo_item']['name'].'</td>';
                        echo '<td style="text-align: center;">'.$row['valor'].'</td>';
                        
                        //echo '<td>'.$row['descripcion'].'</td>';
                        echo '<td style="text-align: center;"><a class="btn btn-danger btn-xs" href="javascript:delItem(\''.$contador.'\')" data-toggle="tooltip"  data-toggle="tooltip" data-placement="left" title="Seleccionar"><i class="glyphicon glyphicon-trash"></i></a></td>';
                        echo '</tr>';
                        $i++;
                        $contador++;

                    }
                ?>
                    <tr>
                        <td colspan="3" style="text-align: right;"><b>Sub Total</b></td>
                        <td style="text-align: center;"><b><?php echo $total; ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?= $this->Form->end() ?> 
</div>
<hr>
<?= $this->Form->create('', ['class' => 'form-horizontal well', 'id' => 'form_add_cot', 'name' => 'form_add_cot']) ?>
<input type="hidden" name="cod_aux" id="cod_aux" value="<?php echo $rs_cotizacione[0]['entidade']['codigo_softland']; ?>">
<input type="hidden" name="hdd_total" id="hdd_total">
<input type="hidden" name="hdd_cotizacione_id" id="hdd_cotizacione_id" value="<?php echo $rs_cotizacione[0]['id']; ?>">
<div class="row">
    <div class="col-md-6">
        <a class="btn btn-danger" href="<?php echo APP_URI; ?>cotizaciones/index/">Cancelar</a>
        <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
    </div>
    <div class="col-md-1 col-md-offset-5">
        <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
    </div>
</div>
<?= $this->Form->end() ?>

<!-- modal para buscar cliente -->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="labelmodalCliente">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="labelmodalCliente"><b>Buscar cliente</b></h4>
      </div>
      <div class="modal-body" style="min-height: 350px;">
        <div class="row">
            <div class="col-md-12">
                <label class="col-md-4 control-label" for="nombre">RUT / Nombre / Razón Social (*)</label>
                <div class="col-md-7">
                    <input type="text" name="nombre" id="nombre" class="form-control" maxlength="12">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary" type="button" id="btn_buscar_entidade" name="btn_buscar_entidade"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row col-md-12" id="divResultado">
            
        </div>
        
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>-->
    </div>
  </div>
</div>

<style type="text/css">
    .modal-body {
        max-height: calc(100vh - 210px);
        overflow-y: auto;
    }
</style>
<script type="text/javascript">
    //getDetalleCotizacion(<?php echo $rs_cotizacione[0]['id']; ?>);
</script>