<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="tipoItems view large-9 medium-8 columns content">
    <h3><?= h($tipoItem->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($tipoItem->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($tipoItem->id) ?></td>
        </tr>
        <tr>
            <?php
                    if(isset($tipoItem->active)){
                        if($tipoItem->active=='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($user->active=='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($user->active=='0') {
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
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tipoItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tipoItem->modified) ?></td>
        </tr> -->
    </table>
    <hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>tipoItems/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>


</div>
