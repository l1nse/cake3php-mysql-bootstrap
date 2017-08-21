<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="cargos view large-9 medium-8 columns content">
    <h3> Nombre cargo : <?= h($cargo->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($cargo->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Área') ?></th>
            <td><?= h($cargo->area->name)?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($cargo->id) ?></td>
        </tr>
        <tr>
             <?php
                    if(isset($cargo->active)){
                        if($cargo->active=='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($cargo->active=='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($cargo->active=='0') {
                            $estado =  '<span class="label label-warning">Pendiente</span>';
                        }
                        else{
                            $estado =  '';
                        }
                    }
                ?>
            <th scope="row"><?= __('Estado') ?></th>
            <td style="text-align: left;"><?= $estado;  ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($cargo->created) ?></td>
        </tr>
        <tr> -->
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($cargo->modified) ?></td>
        </tr>
    </table>
   
</div>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>cargos/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
