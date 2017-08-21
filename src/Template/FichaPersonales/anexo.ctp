<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3 class="page-header"><?= __('Ficha usuarios') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>fichaPersonales/exportar_excel/"><i class="glyphicon glyphicon-plus-sign"></i> Exportar </a>
        </div>
    </div>
<div class="table-responsive">
    <table class="table table-striped data-table"> 
            <thead>
                <tr>
                    <!-- <th scope="col">id </th> -->
                    <th scope="col">ID </th>
                    <th scope="col">Nombre </th>
                    <th scope="col">Empresa </th>
                    <!-- <th scope="col">tipo_movimiento_id </th> -->
                    <th scope="col">Área  </th>
                    <th scope="col">Cargo  </th>
                    
                    <th scope="col">Email </th>
                
                    <th scope="col">Anexo</th>
                    <th scope="col">Celular </th>
                 
              
                </tr>
            </thead>
        <tbody>

            <?php foreach ($fichaPersonales as $fichas): ?>
                
            <tr>
                <td><?= $this->Number->format($fichas->user_id) ?></td>
                <td><?= strtoupper($fichas->user['name'].' '.$fichas->user['apellido1'].' '.$fichas->user['apellido2']); ?></td>

              <!--  <td><?= h($fichas->user_id) ?></td> -->
               <!-- <td><?= h($fichas->empresa_id) ?></td> -->
                 <td><?= h($fichas->empresa->name)?></td>
            <!--<td><?= h($fichas->tipo_movimiento_id) ?></td>-->
                <!--<td><?= h($fichas->area_id) ?></td> -->
                <td><?= h($fichas->area->name)?></td>

        <!--  <td><?= h($fichas->cargo_id) ?></td> -->
                <td><?= h($fichas->cargo->name)?></td>

                
                
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
                

                
               
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

   

