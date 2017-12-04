<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="comprobantes view large-9 medium-8 columns content">
    <h3><?= h($comprobante->tipo_item['name'] ) ?></h3>
    <table class="table table-striped table-bordered" >
        <!--<tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($comprobante->name) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Numero de Cuenta ') ?></th>
            <td><?= h($comprobante->numero_cuenta_ficha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Glosa') ?></th>
            <td><?= h($comprobante->glosa_ficha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Documento1 ') ?></th>
            <td><?= $comprobante->tipo_documento1_ficha ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Documento2 ') ?></th>
            <td><?= h($comprobante->tipo_documento2_ficha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comprobante->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Concepto Ficha') ?></th>
            <td><?= h($comprobante->tipo_item->name) ?></td>
        </tr>
        <?php
                    if(isset($comprobante->active)){
                        if($comprobante->active=='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($comprobante->active=='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($comprobante->active=='0') {
                            $estado =  '<span class="label label-warning">Pendiente</span>';
                        }
                        else{
                            $estado =  '';
                        }
                    }
                ?>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td style="text-align: left;"><?= $estado;  ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($comprobante->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($comprobante->modified) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Tipo Asiento') ?></th>
            <td><?= $comprobante->tipo_asiento ? __('Si') : __('No'); ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Numero Documento') ?></th>
            <td><?= $comprobante->numero_documento_ficha ? __('Si') : __('No'); ?></td>
        </tr>
    </table>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>comprobantes/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>
