<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <h3><?= __('Permisos') ?></h3>
<div class="permisos index large-9 medium-8 columns content">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>permisos/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear permiso</a>
        </div>
    </div>
<br>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <?php foreach ($padres as $row): ?>
        <?php
                if(isset($row->active)){
                    if($row->active=='1'){

                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($row->active=='2'){

                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($row->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>
      <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $row['id']; ?>" class="col-md-10 col-sm-8 ">

                  <?php echo $row['position'].' '.$row['name'] ?> 

                  

                    
                </a>

                <div style="text-align: right;" >
                       <a style="text-align: center;"><?= $estado;  ?></a>

                       <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>permisos/view/<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search" ></i></a> 

                       <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>permisos/edit/<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                       <?php if($row->active == '1')  
                        {
                        //var_dump($user->active == '1'); die; 
                        ?>

                        <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>permisos/anular/<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                        <?php } else {?>
                        <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>permisos/activar/<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                        <?php } ?>
                </div>
                  
              </h4>
            </div>
            <div id="collapse<?php echo $row['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-striped data-table">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Posición</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Icono</th>
                        <th scope="col">Estado</th>
                        
                        <th scope="col">Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach ($list_hijos as $row2): ?>

                            
                            <tr>
                            <?php
                             foreach ($row2 as $row3): 
                            if($row3['padre'] == $row['id'])
                            { ?>
                                <?php
                                if(isset($row3->active)){

                                    if($row3->active=='1'){

                                        $estado =  '<span class="label label-success">Activo</span>';
                                        
                                    }elseif($row3->active=='2'){
                                        $estado =  '<span class="label label-danger">Inactivo</span>';
                                    }elseif ($row3->active=='0') {
                                        $estado =  '<span class="label label-warning">Pendiente</span>';
                                    }
                                    else{
                                        $estado =  '';
                                    }
                                }

                            ?>
                                <td> <?= $row3['id'] ?></td>    
                                <td> <?= $row3['name'] ?></td>    
                                <td> <?= $row3['position'] ?></td>
                                <td> <?= $row3['nivel'] ?></td>
                                <td><i  class = "<?= $row3['icono'] ?>" > </i> </td>
                                <td> <a style="text-align: center;"><?= $estado;  ?></a> </td>

                                <td> 
                                      <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>permisos/view/<?php echo $row3['id']; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search" ></i></a> 

                                       <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>permisos/edit/<?php echo $row3['id']; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                                       <?php if($row3->active == '1')  
                                        {
                                        //var_dump($user->active == '1'); die; 
                                        ?>

                                        <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>permisos/anular/<?php echo $row3->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                                        <?php } else {?>
                                        <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>permisos/activar/<?php echo $row3->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                                        <?php } ?>
                                </td>

                                 
                                
                                <?php
                            }
                            ?>
                            </tr>
                            <?php
                            endforeach;
                        endforeach; ?>    
                    </tbody>
                    </table>
                </div>
                

               
                
              </div>
            </div>
      </div>
    <?php endforeach; ?>
</div>
