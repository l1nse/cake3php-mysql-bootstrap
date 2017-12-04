<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users view large-9 medium-8 columns content">
    <h3> <?= h($area->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= h($area->empresa->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($area->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($area->id) ?></td>
        </tr>
        <tr>
         <?php
                    if(isset($area->active)){
                        if($area->active=='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($area->active=='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($area->active=='0') {
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
     <!--   <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($area->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($area->modified) ?></td>
        </tr> -->
    </table>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="<?php echo APP_URI; ?>areas/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
            
        </div>
</div>
    
</div>
