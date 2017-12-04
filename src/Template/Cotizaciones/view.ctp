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
                
        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th style="text-align: center;">N°</th>
                            <th style="text-align: center;">Nombre pasajero</th>
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
                        
                        echo '</tr>';
                        $i++;
                        $contador++;
                        
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="table-responsive">
            <table class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th style="text-align: center;">N°</th>
                        <th style="text-align: center;">Item</th>
                        <th style="text-align: center;">Tipo Cambio</th>
                        <th style="text-align: center;">Valor</th>
                        <th style="text-align: center;">Descripción</th>
                        
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
                        
                        echo '<td>'.$row['descripcion'].'</td>';
                        
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
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>cotizaciones/index/">Volver</a>
        <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
    </div>
    
</div>
<?= $this->Form->end() ?>
