<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('cotizaciones') ?>
<div class="cotizaciones index large-9 medium-8 columns content">
    <h3><?= __('Cotizaciones') ?></h3>
    
    <div class="tickets form large-9 medium-8 columns content">
        <?= $this->Form->create('', array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_add')) ?>
        <div class="row">
            <div class="form-group">
                <div class="col-md-2 col-xs-12">
                    <br>
                    <a class="btn btn-primary" href="<?php echo APP_URI; ?>cotizaciones/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Cotización</a>
                </div>
                <div class="col-md-1 col-xs-12">
                    <?php
                        echo $this->Form->control('Año', ["class" => "form-control", "id" => "year", "name" => "year", "options" => ["" => "", "2016" => "2016", "2017" => "2017"], 'required' => true]);

                    ?>
                </div>
                <div class="col-md-1 col-xs-12">
                    <?php
                        echo $this->Form->control('Mes', ["class" => "form-control", "id" => "month", "name" => "month", "options" => ["" => "", "1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"], 'required' => true]); 
                    ?>
                </div>
                <div class="col-md-1 col-xs-12">
                    <div class="input select required">
                        
                        <br>
                        <?= $this->Form->button('Buscar',  array("class" => 'btn btn-success', 'id' => 'btn_buscar', 'name' => 'btn_buscar')) ?>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped data-table-index" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Folio</th>
                        <th>RUT Cliente</th>
                        <th>Nombre Cliente</th>
                        <th>Fecha</th>
                        <!--<th>Canal Venta</th>-->
                        <!--<th>Total</th>-->
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cotizaciones as $cotizacione): ?>
                    <?php
                        if(isset($cotizacione->active)){
                            if($cotizacione->active=='1'){
                                $estado =  '<span class="label label-success">Activo</span>';
                            }elseif($cotizacione->active=='2'){
                                $estado =  '<span class="label label-danger">Inactivo</span>';
                            }elseif ($cotizacione->active=='0') {
                                $estado =  '<span class="label label-info">procesada</span>';
                            }else{
                                $estado =  '';
                            }
                        }
                        $date = $cotizacione->created;
                    ?>
                    <tr>
                        <td class="details-control" id="<?= $cotizacione->folio; ?>"><a class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="right" title="Ver Versiones"><i class="glyphicon glyphicon-menu-down"></i></a></td>
                        <td style="text-align: center;"><?= $cotizacione->folio; ?></td>
                        <td><?= $cotizacione->entidade['rut']; ?></td>
                        <td><?= $cotizacione->entidade['name']; ?></td>
                        <td><?= $date->format('d/m/Y'); ?></td>
                        <td><?= $cotizacione->user['name'].' '.$cotizacione->user['apellido1'].' '.$cotizacione->user['apellido2']; ?></td>
                        <td style="text-align: center;"><?= $estado; ?></td>
                        <td style="text-align: center;">
                            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>cotizaciones/view/<?php echo $cotizacione->folio; ?>/<?php echo $cotizacione->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                            <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>cotizaciones/edit/<?php echo $cotizacione->folio; ?>/<?php echo $cotizacione->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
