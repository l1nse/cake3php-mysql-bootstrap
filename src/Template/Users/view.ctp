<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users view large-9 medium-8 columns content">
    <h3>ID: <?= h($user->id) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido Paterno') ?></th>
            <td><?= h($user->apellido1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido Materno') ?></th>
            <td><?= h($user->apellido2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td><?= h($user->role['name']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <?php
                    if(isset($user->active)){
                        if($user->active=='1'){
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
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr> -->
    </table>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>users/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>

