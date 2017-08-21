<?php
/**
  * @var \App\View\AppView $this
  */

    $rs_user = $this->request->session()->read('Auth.User');
?>
<?= $this->Html->script('entidades') ?>

<div class="contactos index large-9 medium-8 columns content">
    <div class="table-responsive">
        <table class="table table-striped data-table-index">
            <thead>
                <tr>
                    <th ></th>
                    <th >Id</th>
                    <th >Rut</th>
                    <th >Codigo Softland</th>
                    <th >Nombre</th>
                    <th >Direccion</th>
                    <th >Giro</th>
                    <th >Telefono </th>                    
                    <th >Rol</th>
                    <th >Acuerdo</th>
                    <th >Tipo</th>
                    <th >Estado</th>
                    <th >Acciones </th>

                    
                </tr>
            </thead>
            <tbody>
                 <?php foreach ($entidades as $entidad): ?>
                     <?php
                if(isset($entidad->active)){
                    if($entidad->active=='1'){
                        $estado =  '<span class="label label-success">Activo</span>';
                        
                    }elseif($entidad->active=='2'){
                        $estado =  '<span class="label label-danger">Inactivo</span>';
                    }elseif ($entidad->active=='0') {
                        $estado =  '<span class="label label-warning">Pendiente</span>';

                    }
                    else{
                        $estado =  '';
                    }
                }

                ?>

                    <td></td>
                    <td> <?= h($entidad->id) ?> </td>
                    <td> <?= h($entidad->rut) ?> </td>
                    <td> <?= h($entidad->codigo_softland) ?> </td>
                    <td> <?= h($entidad->name) ?> </td>
                    <td> <?= h($entidad->direccion) ?> </td>
                    <td> <?= h($entidad->giro) ?> </td>
                    <td> <?= h($entidad->telefono) ?> </td>                    
                    <td> <?= h($entidad->role) ?> </td>
                    <td> <?= h($entidad->acuerdo) ?> </td>
                    <td> <?= h($entidad->tipo) ?> </td>
                    <td style="text-align: center;"><?= $estado;  ?></td>
                    <td style="text-align: center;">
                    

                        <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>Entidades/activar/<?php echo $entidad->id; ?>" data-toggle="tooltip" data-placement="center" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>   
                        <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>Entidades/edit/<?php echo $entidad->id; ?>/2"><i class="glyphicon glyphicon-plus-edit" class="btn_editar_contacto" ><i class="glyphicon glyphicon-edit data-toggle="tooltip" data-placement="center" title="Editar"" clas="modal"></i></a>

                        
                    </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

