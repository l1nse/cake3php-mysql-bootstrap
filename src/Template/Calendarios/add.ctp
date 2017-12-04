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
      <input type="hidden" name="est" id="est" value="6"> <!-- 1 reuniones pre a-->
        <legend><?= __('Agregar Calendario') ?></legend>
        <div class="alert alertlert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <?php
            echo $this->Form->control('Titulo (*)', [ "class" => 'form-control', 'required' => true, "name" => 'titulo' , "id" => 'titulo']);
            
            ?>
             <div class="form-group required">
                    <label for="observacion" class="col-2 col-form-label" required="true">Observación (*)</label>
                    <tr>
                        
                        <td><textarea class="form-control" name="observacion" id="observacion" rows="4" cols="50">
                                <td><?= $calendario->observacion ?></td>
                            </textarea>
                        </td>
                    </tr>
                    
            </div>  
              <div class="form-group required">
                    <label for="descripcion" class="col-2 col-form-label" required="true">Motivo (*)</label>
                    <div class="col-10">
                        
                        <td><textarea class="form-control" name="descripcion" id="descripcion" rows="4" cols="50">
                            <td><?= $calendario->descripcion ?></td>
                        </textarea></td>
                        
                    </div>
            </div>        

            <div class="input select required">
                <label for="user_asignado_id">Tipo reunión (*)</label>
                 <select class="form-control" required="required" id="tipo_calendario" name="tipo_calendario">
                <option value="">""</option>
                <option value="1">Calendario ventas travel</option>
                <option value="2">Calendario marketing travel</option>
                <option value="3">Calendario ventas propiedades</option>
                <option value="4">Calendario marketing propiedades </option>
                
                </select>
            </div>
            

            <div class="form-group required">
              <label for="date_time" class="col-2 col-form-label" required="true">Hora y fecha (*)</label>
              <div >
                <input class="form-control datetimeCalendar" type="text"  id="date_calendar" name="date_calendar" >
              </div>
            </div>        
        
            <?php
            echo $this->Form->control('Dirección (*)' , ["class" => "form-control", "id" => "address", "name" => "address", 'required' => true]);
            //echo $this->Form->control('Estado' , ["class" => "form-control", "id" => "active", "name" => "active", 'required' => true] );
            //echo $this->Form->control('tipo_calendario'); campo oculto valor = 1 
            //echo $this->Form->control('contactos._ids', ['options' => $contactos]);
        ?>
        <div class="form-group">
        
            <div class="input select required">
                <label for="contacto">Contacto (*)</label> 
                <select multiple class="form-control" required="required" id="contacto" name="contacto[]">
                <option value=""></option>
                <?php

                    if(is_array($contactos) && count($contactos)>0){
                        
                        foreach ($contactos as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        </div>

        <div class="form-group">
        
            <div class="input select required">
                <label for="asistentes">Asistente (*)</label> 
                <select multiple class="form-control" required="required" id="asistentes" name="asistentes[]">
                <option value=""></option>
                <?php
                    if(is_array($asistentes) && count($asistentes)>0){
                        
                        foreach ($asistentes as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        </div>

       
</div>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>entidades/index/">Cancelar</a>
        </div>

         <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    
    
</div>
