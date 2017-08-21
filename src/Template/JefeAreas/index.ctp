<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3 class="page-header"><?= __('Jefes de area') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>users/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear jefe de area</a>
        </div>
    </div>


    <h3><?= __('Jefe Areas') ?></h3>
    <div class="table-responsive">
   <table class="table table-striped data-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Area</th>                             
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jefeAreas as $jefe): ?>
            <tr>
                <td><?= $this->Number->format($jefe->id) ?></td>
                <td><?= h($jefe->id_area) ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>users/view/<?php echo $jefe->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>users/edit/<?php echo $jefe->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($jefe->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>users/anular/<?php echo $jefe->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>users/activar/<?php echo $jefe->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
