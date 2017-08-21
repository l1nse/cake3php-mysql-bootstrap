<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h3 class="page-header"><?= __('Cargos creados') ?></h3>
<div class="cargos index large-9 medium-8 columns content">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>cargos/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear cargo</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped data-table">   
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Área</th>
                <th scope="col">Creado</th>
                <th scope="col">Modificado</th>
                <th scope="col">Estado</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cargos as $cargo): ?>
            
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
            <tr>
                <td><?= $this->Number->format($cargo->id) ?></td>
                <td><?= h($cargo->name) ?></td>
                <td><?= h($cargo->area['name']) ?></td>
                <td><?= h($cargo->created) ?></td>
                <td><?= h($cargo->modified) ?></td>
                <td style="text-align: left;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>cargos/view/<?php echo $cargo->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>cargos/edit/<?php echo $cargo->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($cargo->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>cargos/anular/<?php echo $cargo->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>cargos/activar/<?php echo $cargo->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  
</div>
