<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h3 class="page-header"><?= __('Usuarios creados') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>users/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Usuario</a>
        </div>
    </div>
<div class="table-responsive">
    <table class="table table-striped data-table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
                <th scope="col">Modificado</th>
                <th scope="col">Estado</th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
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
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->name.' '.$user->apellido1.' '.$user->apellido2) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= h($user->modified) ?></td>
                <td style="text-align: center;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>users/view/<?php echo $user->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>users/edit/<?php echo $user->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($user->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>users/anular/<?php echo $user->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>users/activar/<?php echo $user->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

