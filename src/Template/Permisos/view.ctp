<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="permisos view large-9 medium-8 columns content">
    <h3><?= h($permiso->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($permiso->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($permiso->name) ?></td>
        </tr>
     <!--    <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td><?= h($permiso->role->name)?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Controlador') ?></th>
            <td><?= h($permiso->controlador) ?></td>
        </tr>
         
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= h($permiso->action) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parametro') ?></th>
            <td><?= $this->Number->format($permiso->parametro) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <td><?= h($permiso->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Icono') ?></th>
            <td><?= h($permiso->icono) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($permiso->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($permiso->modified) ?></td>
        </tr> -->
                <tr>
            <?php
                    if(isset($permiso->active)){
                        if($permiso->active=='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($permiso->active=='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($permiso->active=='0') {
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
       
        
        <tr>
            <th scope="row"><?= __('Nivel') ?></th>
            <td><?= $this->Number->format($permiso->nivel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Padre') ?></th>
            <td><?= $this->Number->format($permiso->padre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Posición') ?></th>
            <td><?= $this->Number->format($permiso->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu') ?></th>
            <td><?= $permiso->menu? __('Si') : __('No'); ?></td>
        </tr>
    </table>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>permisos/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>
