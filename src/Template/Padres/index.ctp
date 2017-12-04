<?php
/**
  * @var \App\View\AppView $this
  */
?>

    <h3><?= __('Padres') ?></h3>
     <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>padres/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Padres</a>
        </div>
    </div>
    <div class="table-responsive">
        
        <table class="table table-striped data-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <!--<th scope="col">created/th>
                    <th scope="col">modified/th> -->
                    <th scope="col">Estado</th>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($padres as $padre): ?>
                     <?php
                if(isset($padre->active)){
                    if($padre->active=='1'){
                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($padre->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($padre->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }
                    else{
                        $estado =  '';
                    }
                }
                ?>
                <tr>
                    <td><?= $this->Number->format($padre->id) ?></td>
                    <td><?= h($padre->name) ?></td>
                  <!--  <td><?= h($padre->created) ?></td>
                    <td><?= h($padre->modified) ?></td> -->
                    
                     <td style="text-align: left;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>padres/view/<?php echo $padre->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>padres/edit/<?php echo $padre->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($padre->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>padres/anular/<?php echo $padre->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>padres/activar/<?php echo $padre->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></apadre                    <?php } ?>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
