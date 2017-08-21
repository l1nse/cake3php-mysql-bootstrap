<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3 class="page-header"><?= __('Áreas creadas') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>areas/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Área</a>
        </div>
    </div>
<div class="table-responsive">
    <table class="table table-striped data-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Empresa</th>
                <th scope="col">Nombre</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificado</th>
                <th scope="col">Estado</th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($areas as $area): ?>
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
                
            <tr>
                <td><?= $this->Number->format($area->id) ?></td>
                <td><?= h($area->empresa->name )  ?></td>
                <td><?= h($area->name) ?></td>
                <td><?= h($area->created) ?></td>
                <td><?= h($area->modified) ?></td>
                <td style="text-align: left;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>areas/view/<?php echo $area->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>areas/edit/<?php echo $area->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($area->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>areas/anular/<?php echo $area->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>areas/activar/<?php echo $area->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>

    
    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
