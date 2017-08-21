<?php
/**
  * @var \App\View\AppView $this
  */
?>

<h3><?= __('Sistemas') ?></h3>
<div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>sistemas/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Sistema</a>
        </div>
    </div>

<div class="table-responsive">

    <table class="table table-striped data-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nombre Contacto</th>
                <th scope="col">Email Contacto</th>
                <th scope="col">Rut Empresa</th>
                <th scope="col">Nombre Empresa</th>
                <th scope="col">Direccion Empresa</th>
                <th scope="col">Creado </th>
                <th scope="col">Modificado </th>
                <th scope="col">Estado </th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sistemas as $sistema): ?>
                 <?php
                if(isset($sistema->active)){
                    if($sistema->active=='1'){
                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($sistema->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($sistema->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>
            <tr>
                <td><?= $this->Number->format($sistema->id) ?></td>
                <td><?= h($sistema->name) ?></td>
                <td><?= h($sistema->name_contacto) ?></td>
                <td><?= h($sistema->email_contacto) ?></td>
                <td><?= h($sistema->rut_empresa) ?></td>
                <td><?= h($sistema->name_empresa) ?></td>
                <td><?= h($sistema->direccion_empresa) ?></td>
                <td><?= h($sistema->created) ?></td>
                <td><?= h($sistema->modified) ?></td>
                <td style="text-align: center;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>sistemas/view/<?php echo $sistema->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>sistemas/edit/<?php echo $sistema->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($sistema->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>sistemas/anular/<?php echo $sistema->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>sistemas/activar/<?php echo $sistema->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
