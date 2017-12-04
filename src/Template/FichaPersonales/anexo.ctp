<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3 class="page-header"><?= __('Listado corporativo') ?></h3>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success btn-xs" href="<?php echo APP_URI; ?>fichaPersonales/exportar_excel/"><i class="glyphicon glyphicon-download-alt"></i> Exportar a Excel </a>
        </div>
    </div>
<div class="table-responsive">
    <table class="table table-striped data-table-list"> 
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

            <?php 
            
            foreach ($fichaPersonales as $fichas): 

            ?>
                
            <tr>
                <td><?= $fichas->user['id']; ?></td>
        <?php 
            $esta = $fichas->user['estado'];
            
            switch ($esta) {

              //Almuerzo
              case '1':
                 $color = "#0000FF";                 
                break;
              //Banco
              case '2':
                 $color = "#492A01";                 
                break;
              //Despacho
              case '3':
                 $color = "#BF5200";                 
                break;
              //Oficina
              case '4':
                 $color = "#298A08";                 
                break; 
              //Otro 
              case '5':
                 $color = "#088A85";                 
                break; 
              //Retierado
              case '6':
                 $color = "#FB0004";              
                break; 

              //Vacaciones
              case '7':
                 $color = "#8B017F";              
                break; 
              //Visitas
              case '8':
                 $color = "#4A5776";              
                break; 
              
              default:
                $color = "#6E6E6E";
                break;
            }
        ?>
       
        

         <?php 
            $estad = $fichas->user['estado'];

            switch ($estad) {

              //en lA oficina
              case '1':
                 $estad  =  "Almorzando";
                 //success
                break;
              //almuerzo
              case '2':
                 $estad  =  "Banco";
                 //primary
                break;
              //fuera de la oficina
              case '3':
                 $estad  =  "Despacho";
                 //warning
                break;
              //retirado
              case '4':
                 $estad  =  "Oficina";
                 //danger 
                break; 
              //En reunion 
              case '5':                 
                 //var_dump($digi); die;
                 $estad  =  $digi[0]['observacion'];
                 //info 
                break; 
              //otros
              case '6':
                 $estad  =  "Retirado";
                 //default
                break; 

              case '7':
                 $estad  =  "Vacaciones";
                 //default
                break; 

              case '8':
                 $estad  =  "Visita";
                 //default
                break; 

              
              default:
                $estad = "Pendiente";
                break;
            }
        ?>

        <td><i data-toggle="tooltip" data-placement="top" title="<?php echo $estad ?> " style="color: <?php echo $color ?>" class="glyphicon glyphicon-user "></i> <?= strtoupper($fichas->user['name'].' '.$fichas->user['apellido1'].' '.$fichas->user['apellido2']); ?></td> 

                
                    

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
            <?php 
            endforeach; ?>
        </tbody>
    </table>
</div>

   

