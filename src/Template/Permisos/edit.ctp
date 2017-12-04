<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="permisos form large-9 medium-8 columns content">
    <?= $this->Form->create($permiso) ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <fieldset>
        <legend><?= __('Editar Permiso') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <?php
            echo $this->Form->control('Nombre *' , ["id" => "name", "name" => "name", "class" => "form-control", "value" => $permiso['name'] , "required" => true]);

            //echo $this->Form->control('Rol *', ["id" => "role_id", "name" => "role_id", "class" => "form-control",'options' => $roles, 'empty' => true, "required" => true]);

        ?>

        <div class="input select required">
                <label for="padre">Padre * </label>
                <!--<?php if($permiso['nivel'] == 0)
                {   
                    
                    ?> <select class="form-control" required="required" id="padre_id" name="padre_id" disabled="true"> <?php
                }else
                {   

                    ?> <select class="form-control" required="required" id="padre_id" name="padre_id">    <?php
                }
                ?>-->
                <select class="form-control"  id="padre" name="padre">
                <option value=""></option>
                <?php
                    if(is_array($padres) && count($padres)>0){
                        foreach ($padres  as $row) {
                            if($permiso['padre'] == $row['id'] && $permiso['nivel'] != 0){
                                //var_dump($permiso['padre']); die;

                               echo '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';

                            }else{  
                                if($permiso['nivel'] == 0)
                                {
                                    echo '<option value=" "> </option>';
                                }else
                                {
                                    
                                    echo '<option value="'.$row['id'].'" ">'.$row['name'].'</option>';
                                    
                                }
                                

                            }
                            
                        }
                    }
                ?>
                </select>
            </div>
     
        <?php
            echo $this->Form->control('controlador', ["id" => "controlador", "name" => "controlador", "class" => "form-control", "value" => $permiso['controlador'] ]);
            echo $this->Form->control('action', ["id" => "action", "name" => "action", "class" => "form-control", "value" => $permiso['action'] 
               ]);
            echo $this->Form->control('Parametro', ["id" => "parametro", "name" => "parametro", "value" => $permiso['parametro'] , "class" => "form-control"]);
            echo $this->Form->control('nivel', ["id" => "nivel", "name" => "nivel", "class" => "form-control", "value" => $permiso['nivel'] , "required" => true]);

            echo $this->Form->control('Descripción (*) ' , ["id" => "descripcion", "name" => "descripcion", "value" => $permiso['descripcion'] ,"class" => "form-control", "required" => true]);
            //echo $this->Form->control('padre', ["id" => "padre", "name" => "padre", "class" => "form-control", "value" => $permiso['padre'] , "required" => true]);
           
            ?>
          
            <?php
            echo $this->Form->control('Posición', ["id" => "position", "name" => "position", "class" => "form-control", "value" => $permiso['position'] ]);
            echo $this->Form->control('Icono (*)', ["id" => "icono", "name" => "icono", "class" => "form-control", "value" => $permiso['icono']  ]);
            //echo $this->Form->control('menu', ["id" => "menu", "name" => "menu"]);
            //echo $this->Form->control('active');menu
            
            $checked_si = isset($permiso['menu']) && $permiso['menu']=='1' ? 'checked="checked"' : '';
            $checked_no = isset($permiso['menu']) && $permiso['menu']=='0' ? 'checked="checked"' : '';
        ?>
        <label class="col-md-12">Menú</label>
        <div class="input text required" >
            
            <div class="menu col-md-9" >
                <label>
                    <input  type="radio" <?php echo $checked_si; ?> value="1" id="menu" name="menu"  required="true">
                       <b>SI  </b> 
                       
                </label>
            
                <label>
                    <input  type="radio" <?php echo $checked_no; ?> value="0" id="menu" name="menu" required="true" >
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
    <?= $this->Form->end() ?>
</div>
