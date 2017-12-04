<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="permisos form large-9 medium-8 columns content">
    <?= $this->Form->create($permiso) ?>
    <fieldset>
        <legend><?= __('Agregar permiso') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        
        <?php
            echo $this->Form->control('Nombre (*)' , ["id" => "name", "name" => "name", "class" => "form-control", "required" => true]);
            //echo $this->Form->control('Rol *' , ["id" => "role_id", "name" => "role_id" ,"class" => "form-control" , 'options' => $roles, 'empty' => true,"required" => true]);
            echo $this->Form->control('controlador', ["id" => "controlador", "name" => "controlador", "class" => "form-control"]);
            echo $this->Form->control('Action', ["id" => "action", "name" => "action", "class" => "form-control"  ]);
            echo $this->Form->control('Parametro', ["id" => "parametro", "name" => "parametro", "class" => "form-control"]);
            echo $this->Form->control('Descripción (*) ' , ["id" => "descripcion", "name" => "descripcion", "class" => "form-control", "required" => true]);
            echo $this->Form->control('Nivel', ["id" => "nivel", "name" => "nivel", "class" => "form-control"]);
            echo $this->Form->control('Icono', ["id" => "icono", "name" => "icono", "class" => "form-control" ]);
            //echo $this->Form->control('Padre' , ["id" => "padre", "name" => "padre", "class" => "form-control"]);
            $checked_si = isset($permiso['menu']) && $permiso['menu']=='1' ? 'checked="checked"' : '';
            $checked_no = isset($permiso['menu']) && $permiso['menu']=='0' ? 'checked="checked"' : '';
        ?>
       <!-- <div class="form-group">
            <div class="input select required">
                <label for="padre">Padre</label>
                <select class="form-control" required="required" id="padre" name="padre">
                <option value=""> </option>
                <option value="1">Mitani Travel</option>
                <option value="2">Mitani Intranet</option>
                <option value="3">Tickets</option>
                <option value="4">Informe</option>
                <option value="5">Mantenedores</option>
                <option value="6">Mi Cuenta</option>
                </select>
            </div>
        </div> -->
        <div class="form-group">
            <div class="input select required">
                <label for="padre_id">Padre</label>
                <select class="form-control" id="padre" name="padre">
                <option value=""></option>
                <?php
                    if(is_array($padres) && count($padres)>0){
                        foreach ($padres as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        </div>

       
        <?php 
            echo $this->Form->control('Posición', ["id" => "position", "name" => "position", "class" => "form-control"]);
            //echo $this->Form->control('menu', ["id" => "position", "name" => "position", "class" => "form-check",  "required" => true]);
        ?>
         <label class="col-md-12">Menú</label>
        <div class="input text required" >
            
            <div class="menu col-md-9" >
                <label>
                    <input  type="radio" <?php echo $checked_si; ?> value="1" id="menu" name="menu" required="true" >
                       <b>SI  </b> 
                       
                </label>
            
                <label>
                    <input  type="radio" <?php echo $checked_no; ?> value="0" id="menu" name="menu"  required="true">
                       <b>NO  </b> 
                       
                </label>
            </div>
        </div>
        

        
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>permisos/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">            
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    
</div>
