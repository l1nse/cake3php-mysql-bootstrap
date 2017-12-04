<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3><?= __('Tipo Cambios') ?></h3>
  <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>tipo-cambios/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear cambio</a>
        </div>
    </div>
<div class="table-responsive">
    
    <table class="table table-striped data-table"> 
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                <th scope="col">Estado</th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoCambios as $tipoCambio): ?>
                <?php
                if(isset($tipoCambio->active)){
                    if($tipoCambio->active =='1'){
                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($tipoCambio->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($tipoCambio->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>
            <tr>
                <td><?= $this->Number->format($tipoCambio->id) ?></td>
                <td><?= h($tipoCambio->name) ?></td>
             <!--   <td><?= h($tipoCambio->created) ?></td>
                <td><?= h($tipoCambio->modified) ?></td> -->
                <td style="text-align: left;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>tipo-cambios/view/<?php echo $tipoCambio->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>tipo-cambios/edit/<?php echo $tipoCambio->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($tipoCambio->active == '1')  
                    {
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>tipo-cambios/anular/<?php echo $tipoCambio->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>tipo-cambios/activar/<?php echo $tipoCambio->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
