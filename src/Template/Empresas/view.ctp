<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="empresas view large-9 medium-8 columns content">
    <h3> <?= h($empresa->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($empresa->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rut') ?></th>
            <td><?= h($empresa->rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Softland') ?></th>
            <td><?= h($empresa->name_softland) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($empresa->id) ?></td>
        </tr>
        <tr>
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
            <th scope="row"><?= __('Estado') ?></th>
            <td style="text-align: left;"><?= $estado;  ?></td>
        </tr>
    </table>
    <div class="related">

    <h3>Áreas por empresa</h3>
        
        <?php if (!empty($empresa->areas)): ?>
        <table cellpadding="0" cellspacing="0">
            <table class="table table-striped table-bordered">
            <tr>
                <th scope="col"><?= __('ID Área') ?></th>
                <!--<th scope="col"><?= __('Empresa Id') ?></th> -->
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Creado') ?></th>
                <th scope="col"><?= __('Modificado') ?></th>
                <th scope="col"><?= __('Activo') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($empresa->areas as $areas): ?>
                <?php
                if(isset($areas)){
                    if($areas->active=='1'){

                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($areas->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($areas->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>

            <tr>
                <td><?= h($areas->id) ?></td>
                <!-- <td><?= h($areas->empresa_id) ?></td> -->
                <td><?= h($areas->name) ?></td>
              <!--  <td><?= h($areas->created) ?></td>
                <td><?= h($areas->modified) ?></td>             -->
                <td style="text-align: left;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>areas/view/<?php echo $areas->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>areas/edit/<?php echo $areas->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($areas->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>areas/anular2/<?php echo $areas->id; ?>/<?php echo $empresa->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>areas/activar2/<?php echo $areas->id; ?>/<?php echo $empresa->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>empresas/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
    
</div>
