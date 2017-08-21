<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3 class="page-header"><?= __('Ficha usuarios') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>fichaPersonales/add/"><i class="glyphicon glyphicon-plus-sign"></i> Crear Ficha </a>
        </div>
    </div>
<div class="table-responsive">
    <table class="table table-striped data-table"> 
            <thead>
                <tr>
                    <!-- <th scope="col">id </th> -->
                    <th scope="col">ID </th>
                    <th scope="col">Empresa </th>
                    <!-- <th scope="col">tipo_movimiento_id </th> -->
                    <th scope="col">Área  </th>
                    <th scope="col">Cargo  </th>
                    <th scope="col">Nombre </th>
                    <th scope="col">Apellido Paterno </th>
                    <th scope="col">Apellido Materno </th>
                    <th scope="col">Email </th>
                    <!-- <th scope="col">fecha_nacimiento </th> -->
                    <!--<th scope="col">estado_civil </th> -->
                    <!--<th scope="col">paise_id </th>  -->
                    <!--<th scope="col">ciudade_id </th> -->
                    <!--<th scope="col">comuna_id </th> -->
                    <!--<th scope="col">direccion </th> -->
                    <th scope="col">Anexo</th>
                    <th scope="col">Celular </th>
                    <!-- <th scope="col">nombre emergencia </th> -->
                    <!--<th scope="col">telefono emergencia </th> -->
                    <!--<th scope="col">numero_cuenta </th> -->
                    <!--<th scope="col">tipo_cuenta_id </th> -->
                    <!--<th scope="col">banco_id') </th> -->
                    <!--<th scope="col">afp_id </th> -->
                    <!--<th scope="col">apv </th> -->
                    <!--<th scope="col">ahorro_cta2 </th> -->
                    <!--<th scope="col">isapre_id </th> -->
                    <!--<th scope="col">valor_isapre </th> -->
                    <!-- <th scope="col">created </th> -->
                    <!--<th scope="col">modified </th> -->
                    <th scope="col">Estado </th> 
                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
        <tbody>

            <?php foreach ($fichaPersonales as $fichas): ?>
                <?php
                    if(isset($fichas->user['active'])){
                        if($fichas->user['active'] =='1'){
                            $estado =  '<span class="label label-success">Activo</span>';
                            
                        }elseif($fichas->user['active'] =='2'){
                            $estado =  '<span class="label label-danger">Inactivo</span>';
                        }elseif ($fichas->user['active'] == '0') {
                            $estado =  '<span class="label label-warning">Pendiente</span>';
                        }
                        else{
                            $estado =  '';
                        }
                    }
                ?>
            <tr>
                <td><?= $this->Number->format($fichas->user_id) ?></td>
                
              <!--  <td><?= h($fichas->user_id) ?></td> -->
               <!-- <td><?= h($fichas->empresa_id) ?></td> -->
                 <td><?= h($fichas->empresa->name)?></td>
            <!--<td><?= h($fichas->tipo_movimiento_id) ?></td>-->
                <!--<td><?= h($fichas->area_id) ?></td> -->
                <td><?= h($fichas->area->name)?></td>

        <!--  <td><?= h($fichas->cargo_id) ?></td> -->
                <td><?= h($fichas->cargo->name)?></td>

                <td><?= h($fichas->name) ?></td>
                <td><?= h($fichas->user->apellido1) ?></td>
                <td><?= h($fichas->user->apellido2) ?></td>
                <td><?= h($fichas->email) ?></td>
                <!-- //<td><?= h($fichas->fecha_nacimiento) ?></td> -->
                <!--<td><?= h($fichas->estado_civil) ?></td> -->
                <!--<td><?= h($fichas->paise_id) ?></td> -->
                <!--<td><?= h($fichas->ciudade_id) ?></td> -->
                <!--<td><?= h($fichas->comuna_id) ?></td> -->
                <!--<td><?= h($fichas->direccion) ?></td> -->
                <td><?= h($fichas->telefono) ?></td>
                <td><?= h($fichas->celular) ?></td>
                <!--<td><?= h($fichas->nombre_emergencia) ?></td> -->
                <!-- <td><?= h($fichas->telefono_emergencia) ?></td> -->
                <!-- <td><?= h($fichas->numero_cuenta) ?></td> -->
                <!-- <td><?= h($fichas->tipo_cuenta_id) ?></td> -->
                <!-- <td><?= h($fichas->banco_id) ?></td> -->
                <!-- <td><?= h($fichas->afp_id) ?></td> -->
                <!-- <td><?= h($fichas->apv) ?></td> -->
               <!-- <td><?= h($fichas->ahorro_cta2) ?></td> -->
               <!-- <td><?= h($fichas->isapre_id) ?></td> -->
               <!-- <td><?= h($fichas->valor_isapre) ?></td> -->
               <!-- <td><?= h($fichas->created) ?></td> -->
                <!--<td><?= h($fichas->modified) ?></td> -->
                <td style="text-align: center;"><?= $estado;  ?></td>

                
                <td class="actions" style="text-align: center;">
                    <a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>fichaPersonales/view/<?php echo($fichas->id)?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
                    <a class="btn btn-warning btn-xs" href="<?php echo APP_URI; ?>fichaPersonales/edit/<?php echo($fichas->id)?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                     <?php if($fichas->active == '1')  
                    {
                    //var_dump($user->active == '1'); die; 
                    ?>

                 <!--   <a class="btn btn-danger btn-xs" href="<?php echo APP_URI; ?>fichaPersonales/anular/<?php echo $fichas->id; ?>" data-toggle="tooltip" data-placement="left" title="Desactivar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php } else {?>
                    <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>fichaPersonales/activar/<?php echo $fichas->id; ?>" data-toggle="tooltip" data-placement="left" title="Activar"><i class="glyphicon glyphicon-ok"></i></a>
                    <?php } ?> -->
                    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

   

