<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
        <tr>
            <?php
                    if(isset($role->active)){
                        if($role->active=='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($role->active=='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($role->active=='0') {
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
    <!--    <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($role->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($role->modified) ?></td>
        </tr> -->
    </table>   
</div>
 <div class="table-responsive">
         <h4><?= __('Permisos') ?></h4>
                <table class="table table-striped data-table">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Action</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    
                </thead>
                <tbody>
                    <?php foreach ($rolesPermiso as $row): ?>
                        <?php
                            //var_dump($row->permiso['active'] =='1'); die;    
                            if(isset($rolesPermiso)){

                                if($row->permiso['active'] =='1'){
                                    $estado =  '<span class="label label-success">Activo</span>';
                                    
                                }elseif($row->permiso['active'] =='2'){
                                    $estado =  '<span class="label label-danger">Inactivo</span>';
                                }elseif ($row->permiso['active'] =='0') {
                                    $estado =  '<span class="label label-warning">Pendiente</span>';
                                }
                                else{
                                    $estado =  '';
                                }
                            }
                        ?>
                        <tr>
                            <td><?php echo $row['permiso_id']  ?> </td>
                            <td><?php echo $row->permiso['name']  ?> </td>
                            <td><?php echo $row->permiso['action']  ?> </td>
                            <td style="text-align: left;"><?= $estado; ?></td>
                     
                              <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>permisos/view/<?php echo $row['permiso_id'] ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>                  
                </td>  
                        </tr>
                    <?php endforeach; ?>
                </tbody>

                </table>
    </div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>roles/index/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>