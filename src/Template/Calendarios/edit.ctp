<?php
/**
  * @var \App\View\AppView $this
  */
?>

  <script type="text/javascript">
  tinymce.init({
    selector: '#descripcion',
      statusbar: false,
      visual: false,
      menubar: false,
      toolbar: false,
      convert_newlines_to_brs : false,
  });
  tinymce.init({
    selector: '#observacion',
      statusbar: false,
      visual: false,
      menubar: false,
      toolbar: false,
      convert_newlines_to_brs : false,
  });
  </script>
<div class="calendarios form large-9 medium-8 columns content">
    <?= $this->Form->create($calendario) ?>
    <fieldset>
        <legend><?= __('Editar Reunion') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        
        <div class="form-group">
        
                <?php
                    echo $this->Form->control('Titulo (*)' , ["class" => 'form-control' , 'required' => true, 'id' => 'titulo', 'name' => 'titulo','value' => $calendario->titulo]);
                    //echo $this->Form->control('Motivo (*)', ["class" => 'form-control' ,'required' => true,  'id' => 'descripcion', 'name' => 'descripcion','value' => $calendario->descripcion]);

                    //echo $this->Form->control('Observación (*)', ["class" => 'form-control','required' => true ,  'id' => 'observacion', 'name' => 'observacion']);
                    //echo $this->Form->control('date_time',["type"=>"text", "class" => 'form-control' ,  'id' => 'date_time', 'name' => 'date_time','value' => $calendario->date_time] );
                    $date = $calendario->date_time;
                ?>
                <div class="form-group required">
                    <label for="date_time" class="col-2 col-form-label" required="true">Observación (*)</label>
                    <tr>
                        
                        <td><textarea class="form-control" name="observacion" id="observacion" rows="4" cols="50">
                                <td><?= $calendario->observacion ?></td>
                            </textarea>
                        </td>
                    </tr>
                    
            </div>  
              <div class="form-group required">
                    <label for="date_time" class="col-2 col-form-label" required="true">Motivo (*)</label>
                    <div class="col-10">
                        
                        <td><textarea class="form-control" name="descripcion" id="descripcion" rows="4" cols="50">
                            <td><?= $calendario->descripcion ?></td>
                        </textarea></td>
                        
                    </div>
            </div>  

            

                    

                <div class="form-group">
                  <label for="date_time" class="col-2 col-form-label">Fecha y hora (*)</label>
                  <div class="col-10">
                    <input class="form-control datetimeCalendar" type="text"  id="date_time" name="date_time" value="<?php echo $date->format('d/m/Y H:m') ?>" >
                  </div>
                </div>
                
                <?php
                    echo $this->Form->control('Dirección (*)' , ["class" => 'form-control' , 'required' => true, 'id' => 'address', 'name' => 'address','value' => $calendario->address ]);
                  //  echo $this->Form->control('active');

                    //echo $this->Form->control('contactos._ids', ['options' => $contactos]);
                ?>
                <div class="form-group">
                <div class="input select required">
                    <label for="role_id">Estado (*)</label>
                     <select class="form-control" required="required" id="active" name="active">
                     >
                    <option value=""> </option>
                    <?php if($calendario->active == 6) 
                    { ?>
                        <option value="1"> Agendada</option>
                        <option value="6"> Pre agendada</option>
                    <?php } ?>
                    <option value="3"> Reasignada</option>
                    <option value="4"> Editada</option>
                    
                    </select>
                </div>
            </div>
            <div class="form-group">
                    <?php
                        //    echo $this->Form->control('Estado', ["class" => 'form-control', 'options' => ['' => '', '1' => 'Agendada', '2' => 'Cancelada', '3' => 'ReAgendada'], 'required' => true , "id" => 'active' , "name" => 'active']);
                    ?>
                <div class="input select ">
                    <label for="contactosAdd">Contactos </label> 
                    <select multiple class="form-control"  id="contactosAdd" name="contactosAdd[]">
                    <option value=""></option>
                    <?php

                        if(is_array($contactosEmpresa ) && count($contactosEmpresa )>0){
                            
                            foreach ($contactosEmpresa as $row) {
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                    <?php
                        //    echo $this->Form->control('Estado', ["class" => 'form-control', 'options' => ['' => '', '1' => 'Agendada', '2' => 'Cancelada', '3' => 'ReAgendada'], 'required' => true , "id" => 'active' , "name" => 'active']);
                    ?>
                <div class="input select ">
                    <label for="listaAsistentes">Asistentes </label> 
                    <select multiple class="form-control"  id="listaAsistentes" name="listaAsistentes[]">
                    <option value=""></option>
                    <?php

                        if(is_array($listaAsistentes ) && count($listaAsistentes )>0){
                            
                            foreach ($listaAsistentes as $row) {
                                echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            

        </div>
    </div>
        
    </fieldset>
    <div class="form-group">
        <div class="table-responsive">
             <h4><?= __('Contactos') ?></h4>
                    <table class="table table-striped data-table">
                        <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Borrar</th>
                            
                            
                        </thead>
                        <tbody>

                            <?php foreach ($contactos as $row):?>                            

                                <tr>
                                    <td><?php echo $row->contacto['id']  ?> </td>
                                    <td><?php echo $row->contacto['name']  ?> </td>
                                    <td><?php echo $row->contacto['email']  ?> </td>
                                    <td><?php echo $row->contacto['telefono']  ?> </td>    
                                    <?php if(count($contactos) > 1) { ?>
                                        <td><a class="btn btn-danger btn-xs"  href="<?php echo APP_URI; ?>CalendariosContactos/delete/<?php echo $row->id; ?>/<?php echo $calendario->id ?>/<?php echo $calendario->contactos[0]['entidade_id'] ?>" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></td>
                                    <?php } else {?>                                                 
                                        <td><a class="btn btn-danger btn-xs"  href="#" data-toggle="tooltip" data-placement="top" title="Borrar" disabled><i class="glyphicon glyphicon-trash"></i></a></td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
        </div>
    </div>


    <div class="form-group">
        <div class="table-responsive">
             <h4><?= __('Asistentes') ?></h4>
                    <table class="table table-striped data-table">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Borrar</th>
                        
                        </thead>
                    <tbody> 

                        <?php foreach ($asistentes as $row):?>                            

                            <tr>
                                <td><?php echo $row->id  ?> </td>
                                <td><?php echo $row->user['name'].' '.$row->user['apellido1']  ?> </td>
                                <td><?php echo $row->user['username'] ?> </td>
                                <td><?php echo $row->user->ficha_personales [0]['telefono'] ?> </td>
                                <?php if(count($asistentes)==1) {?>                                                      
                                    <td><a class="btn btn-danger btn-xs"  href="#" data-toggle="tooltip" data-placement="top" title="Borrar" disabled><i class="glyphicon glyphicon-trash" ></i></a></td>
                                <?php } else {?>
                                
                                    <td><a class="btn btn-danger btn-xs"  href="<?php echo APP_URI; ?>CalendariosAsistentes/delete/<?php echo $row->id;?>/<?php echo $calendario->id ?>/<?php echo $calendario->contactos[0]['entidade_id'] ?>/" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></td>
                                <?php } ?>                                                   
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    </table>
    </div>
<hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>calendarios/index/<?php echo $calendario->tipo_calendario ?>" >Cancelar</a>
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success', 'id' => 'btn_guardar')) ?>
        </div>
    </div>

    
    <?= $this->Form->end() ?>
</div>
