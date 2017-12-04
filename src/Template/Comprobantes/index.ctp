<?php
/**
  * @var \App\View\AppView $this
  */
?>


    <h3><?= __('Matriz comprobantes') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>comprobantes/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear comprobante </a>
        </div>
    </div>
    <div class="table-responsive">
   
        <table class="table table-striped data-table"> 
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <!--<th scope="col">Nombre</th> -->
                    <th scope="col">Concepto</th>
                    <th scope="col">N° cuenta</th>
                    <th scope="col">Tipo asiento</th>
                    <th scope="col">Glosa</th>
                    <th scope="col">Tipo doc</th>
                    <th scope="col">Tipo doc</th>
                    <th scope="col">N° documento</th>
                    <th scope="col">Estado</th>
                    
                    <th scope="col" class="actions">Actions </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comprobantes as $comprobante): ?>
                    <?php
                if(isset($comprobante->active)){
                    if($comprobante->active =='1'){
                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($comprobante->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($comprobante->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';
                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>
                <tr>
                    <td><?= $this->Number->format($comprobante->id) ?></td>
                    <!--<td><?= h($comprobante->name) ?></td> -->
                    <td><?= h($comprobante->tipo_item['name']) ?></td>
                    <td><?= h($comprobante->numero_cuenta_ficha) ?></td>
                     <td><?= h($comprobante->tipo_asiento) ? __('Si') : __('No'); ?></td>
                    

                    <td><?= h($comprobante->glosa_ficha) ?></td>
                    
                    <td><?= $comprobante->tipo_documento1_ficha ? __('Si') : __('No'); ?></td>
                    <td><?= h($comprobante->tipo_documento2_ficha) ?></td>
                    
                    <td><?= $comprobante->numero_documento_ficha ? __('Si') : __('No'); ?></td>
                    <td style="text-align: center;"><?= $estado;  ?></td>
                <td class="actions">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>comprobantes/view/<?php echo $comprobante->id; ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>comprobantes/edit/<?php echo $comprobante->id; ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>

                    <?php if($comprobante->active == '1')  
                    {
                    ?>

                    <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>comprobantes/anular/<?php echo $comprobante->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>comprobantes/activar/<?php echo $comprobante->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

