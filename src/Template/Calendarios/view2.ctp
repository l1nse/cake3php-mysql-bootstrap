<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3 class="page-header"><?= __('Informe de reuniones asignadas') ?></h3>
<div class="tickets index large-9 medium-8 columns content">
<?= $this->Form->create('', array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_add')) ?>
	<div class="row">
		<div class="form-group">
	        
	            <?php 
	            	if($permisos == 93 || $permisos == 109 || $permisos == 111 || $permisos == 106)
	            	{?>
	            	<div class="col-md-6">
	            		<div class="input select required col-md-6">
		            		<label for="date_time" class="col-2 col-form-label" required="true">Usuario</label><?php echo "<br>" ?>
		            	
			                <select class= required="required" id="user_asignado_id" name="user_asignado_id">
			                <option value="">Seleccionar usuario</option>

	                <?php

		                    if(is_array($usuarios) && count($usuarios)>0){
		                        foreach ($usuarios as $row) {
			                         if($row['id'] == $user_asignado_id )
			                         {
			                         	echo '<option value="'.$row['id'].'" selected="selected">'.$row['name'].' '.$row['apellido1'].'</option>';
			                         }else{
			                         	echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';	
			                         }   
		                        }
		                    }
	                ?>
	                		</select>

	            		</div>
	        	</div>

	            <?php		
	            	}

	             ?>
	            
	        <div class="col-md-1 col-xs-12">
                    <?php
                        echo $this->Form->control('Año', ["class" => "form-control", "id" => "year", "name" => "year", "options" => ["" => "", "2016" => "2016", "2017" => "2017"]]);

                    ?>
                </div>
                <div class="col-md-1 col-xs-12">
                    <?php
                        echo $this->Form->control('Mes', ["class" => "form-control", "id" => "month", "name" => "month", "options" => ["" => "", "1" => "Enero", "2" => "Febrero", "3" => "Marzo", "4" => "Abril", "5" => "Mayo", "6" => "Junio", "7" => "Julio", "8" => "Agosto", "9" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"]]); 
                    ?>
                </div>
                 <div class="col-md-1 col-xs-12">
                    <div class="input ">
                        
                        <br>
                        <?= $this->Form->button('Buscar',  array("class" => 'btn btn-success', 'id' => 'btn_buscar', 'name' => 'btn_buscar')) ?>
                    </div>
                </div>
                <div class="col-md-1 col-xs-12">
                <br>
                <!-- consulta de la vista -->
                <?php
                	  $url =  APP_URI."Calendarios/exportExcel";

                 	  $us= $idus;
                 	  if($us !='')
                 	  {
                 	  	$url = $url."/".$us;
                 	  }else
                 	  {
                 	  	$us = 'N'; // N = No esta
                 	  	$url = $url."/".$us;
                 	  }


                	  $month = $month;
                	  if($month != '')
                	  {
                	  	$url = $url."/". $month;	
                	  }else
                	  {
                	  	$month = 'N'; // N = No esta
                	  	$url = $url."/".$month;	
                	  } 

                	  $year = $year;
                	  if($year != '')
                	  {
                	  	$url = $url."/".$year;
                	  }else
                	  {
                	  	$year = 'N'; // N = No esta
                	  	$url = $url."/".$year;
                	  }

                 ?>
                	
                	<a class="btn btn-success" id="btnExportar" name="btnExportar" href="<?php echo $url ?>"><i class="glyphicon glyphicon-download-alt"></i>
                	 Exportar a Excel</a>
                	
                </div>

	    </div>
	<?= $this->Form->end() ?>

	</div>    
	
	
	   

	<div class="table-responsive">
	         <h4><?= __('Reuniones') ?></h4>
	                <table class="table table-striped data-table">
	                <thead>
	                    <th scope="col">ID</th>
	                    <th scope="col">Titulo</th>
	                    <th scope="col">Fecha</th>
	                    <th scope="col">Empresa</th>
	                    <th scope="col">Estado</th>
	                    <th scope="col">Acciones</th>
	                    </thead>
	                <tbody>
	                <?php if(count($reu)> 0  ){ ?>
	                	<?php foreach ($reu as $row):?>                            

	                        <tr>
	                            <td><?php echo $row['id']  ?> </td>
	                            <td><?php echo $row['titulo']  ?> </td>
	                            <td><?php echo $row['date_time']; ?></td>
	                            <td><?php echo $row['name']  ?> </td>
	                            <td><?php echo $row['active']  ?> </td>
	                            <td><a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>calendarios/view/<?php echo $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a></td>
	                        </tr>
	                    <?php endforeach; ?>
	                <?php }else{ ?>
	                <?php foreach ($calendario as $row):?>                            
	                <!-- vamos a rescatar el tipo calendario desde aca -->
	                <?php $tipocalendario = $row->tipo_calendario; ?>
	                        <tr>
	                            <td><?php echo $row->id ;?> </td>
	                            <td><?php echo $row->titulo;  ?> </td>
	                            <?php $date = $row->date_time; ?>
	                            <td><?= h($date->format('d/m/Y H:m'));?></td>
	                            <td><?php echo $row->contactos[0]['entidade']['name']  ?> </td>
	                            
	                              <?php
							                //var_dump($row->permiso['active'] =='1'); die;    
							            if(isset($row->active)){

							                if($row->active =='1'){
							                    $estado =  '<span class="label label-success">Agendada</span>';
							                                    
							                }elseif($row->active =='2'){
							                    $estado =  '<span class="label label-danger">Cancelada</span>';
							                }elseif ($row->active =='3') {
							                    $estado =  '<span class="label label-warning">Reagendada</span>';
							                }
							                elseif ($row->active =='4') {
							                    $estado =  '<span class="label label-info">Editada</span>';
							                }
							                elseif ($row->active =='5') {
							                    $estado =  '<span class="label label-default">Concretada</span>';
							                }elseif ($row->active =='6') {
							                    $estado =  '<span class="label" style="background-color: #FD05C1" >Pre Agendada</span>';
							                }
							                else{
							                    $estado =  '';
							                }
							            }
							        ?>
							   <td style="text-align: left;"><?= $estado; ?></td>
	                         	
	                            <td><a class="btn btn-primary btn-xs" href="<?php echo APP_URI; ?>calendarios/view/<?php echo $row->id ?>" data-toggle="tooltip" data-placement="top" title="Ver"><i class="glyphicon glyphicon-search"></i></a>
	                            <a class="btn btn-success btn-xs" id="btnExportar" name="btnExportar" href="<?php echo APP_URI; ?>calendarios/exportPdf/<?php echo $row['id']; ?>"></i>
                	 			<i class="glyphicon glyphicon-download-alt"></i></a>	
	                            </td>

	                        </tr>
	                    <?php endforeach; ?>

	                <?php } ?>
	                    
	                </tbody>

	                </table>
	</div>
<div class="form-group required">
        <div class="col-md-6">

        	<?php ; if(isset($tipocalendario))
        	{ ?>
            	<a class="btn btn-primary" href="<?php echo APP_URI; ?>calendarios/index/<?php echo $tipocalendario?>"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>            
            <?php }else{ ?>
            	<a class="btn btn-primary" href="<?php echo APP_URI; ?>Users/home/"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>            
            <?php } ?>


        </div>
    </div>
	
	


</div>


