<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('tickets') ?>

  <script type="text/javascript">
  tinymce.init({
    selector: '#descripcion',
      statusbar: false,
      visual: false,
      menubar: false,
      toolbar: false,
    

  });
  </script>
<div class="tickets form large-9 medium-8 columns content">
    <?= $this->Form->create($ticket, array('class' => 'formulario','enctype' => "multipart/form-data")) ?>
    <input type="hidden" name="sub_sistema_id_hd" id="sub_sistema_id_hd" value="<?php echo $ticket['sub_sistema_id']; ?>">
    <fieldset>
        <legend><?= __('Editar Ticket N°'. $ticket->id) ?></legend>
        <div class="form-group">
        <?php
            echo $this->Form->control('sistema_id', ['options' => $sistemas, 'empty' => true, "class" => 'form-control', 'required' => true]);
            echo $this->Form->control('sub_sistema_id', ['options' => $sistemas, "class" => 'form-control', 'empty' => true, 'value' => $ticket['sub_sistema_id'],  'required' => true]);
            /*echo $this->Form->control('Asignar Usuario', ['options' => $userAsignados, 'empty' => true, "class" => 'form-control', "name" => "user_asignado_id", "id" => "user_asignado_id",'value' => $ticket['user_asignado_id'], 'required' => true]);*/
            ?>
            <div class="input select required">
                <label for="user_asignado_id">Asignar Usuario</label>
                <select class="form-control" required="required" id="user_asignado_id" name="user_asignado_id">
                <option value=""></option>
                <?php
                    if(is_array($userAsignados) && count($userAsignados)>0){
                        foreach ($userAsignados as $row) {
                            if($ticket['user_asignado_id']==$row['id']){
                                echo '<option value="'.$row['id'].'" selected="selected">'.$row['name'].' '.$row['apellido1'].'</option>';
                            }else{
                                echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';
                            }
                            
                        }
                    }
                ?>
                </select>
            </div>
            <?php
            echo $this->Form->control('prioridad', ["class" => 'form-control', 'options' => ['' => '', '1' => 'Alta', '2' => 'Media', '3' => 'Baja'], 'required' => true]);
            echo $this->Form->control('Tiempo limite', ["class" => "form-control numeric", "id" => "tiempo_limite", "name" => "tiempo_limite", 'value' => $ticket['tiempo_limite'], 'required' => true]);
            echo $this->Form->control('Unidad de tiempo', ["class" => "form-control", "id" => "tiempo_tipo", "name" => "tiempo_tipo", "options" => ["" => "", "Hora(s)" => "Hora(s)", "Día(s)" => "Día(s)", "Semana(s)" => "Semana(s)", "Mes(es)" => "Mes(es)"], 'value' => $ticket['tiempo_tipo'], 'required' => true]);
            echo $this->Form->control('asunto', ["class" => 'form-control']);
            echo $this->Form->input('adjunto',array( 'type' => 'file'));

            if(is_array($rs_archive) && count($rs_archive)>0){
            ?>
                <div class="input text">
                    <br>
                    <a href="<?= APP_URI ?>uploads/descarga/ticket/<?= $rs_archive[0]->name; ?>" class="btn btn-success btn-xs" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
                </div>
            <?php
            }
       
            echo $this->Form->control('descripcion', ["class" => 'form-control']);
            ?>
        </div>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>tickets/index/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/delete/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
