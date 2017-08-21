<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="empresas index large-9 medium-8 columns content">
    <h3><?= __('Empresas') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>empresas/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Empresa</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped data-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Nombre Softland</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empresas as $empresa): ?>
                    <?php
                if(isset($empresa->active)){
                    if($empresa->active=='1'){
                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($empresa->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($empresa->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>
                <tr>
                    <td><?= $this->Number->format($empresa->id) ?></td>
                     <td><?= h($empresa->name) ?></td>
                    <td><?= h($empresa->rut) ?></td>
                    <td><?= h($empresa->name_softland) ?></td>
                    <!--<td><?= $this->Number->format($empresa->active) ?></td> -->
                    <td style="text-align: left;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>Empresas/view/<?php echo $empresa->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>Empresas/edit/<?php echo $empresa->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                    <?php if($empresa->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>Empresas/anular/<?php echo $empresa->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>Empresas/activar/<?php echo $empresa->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
   
</div>
