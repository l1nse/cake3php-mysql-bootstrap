<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('tickets') ?>
<script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#descripcion',
      statusbar: false,
      visual: false,
      readonly : true,
      menubar: false,
      toolbar: false,
    

  });
  </script>

  
<div class="tickets form large-9 medium-8 columns content">
    <?= $this->Form->create($ticket) ?>
    <fieldset>
        <legend><?= __('Resumen Ticket N°'. $ticket->id) ?></legend>
        <div class="form-group">
        <?php
            echo $this->Form->control('sistema_id', ['options' => $sistemas, 'empty' => true, "class" => 'form-control', 'disabled' => true]);
            echo $this->Form->control('sub_sistema_id', ['options' => $subSistemas, "class" => 'form-control', 'disabled' => true, 'value' => $ticket['sub_sistema_id'], 'id' => 'sub_sistema_id', 'name' => 'sub_sistema_id']);
            echo $this->Form->control('user_id', ["class" => 'form-control', 'disabled' => true]);
            echo $this->Form->control('user_asignado_id', ["class" => 'form-control', 'disabled' => true]);
            echo $this->Form->control('prioridad', ["class" => 'form-control', 'options' => ['' => 'Seleccionar', '1' => 'Alta', '2' => 'Media', '3'=> 'Baja'], 'disabled' => true]);
            echo $this->Form->control('Tiempo limite', ["class" => "form-control numeric", "id" => "tiempo_limite", "name" => "tiempo_limite", 'value' => $ticket['tiempo_limite'], 'disabled' => true]);
            echo $this->Form->control('Unidad de tiempo', ["class" => "form-control", "id" => "tiempo_tipo", "name" => "tiempo_tipo", "options" => ["" => "", "Hora(s)" => "Hora(s)", "Día(s)" => "Día(s)", "Semana(s)" => "Semana(s)", "Mes(es)" => "Mes(es)"], 'value' => $ticket['tiempo_tipo'], 'disabled' => true]);
            echo $this->Form->control('asunto', ["class" => 'form-control', 'disabled' => true]);
            if(is_array($rs_archive) && count($rs_archive)>0){
            ?>
                <div class="input text">
                    <br>
                    <a href="<?= APP_URI ?>uploads/descarga/ticket/<?= $rs_archive[0]->name; ?>" class="btn btn-success btn-xs" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>

                </div>
                <br>
            <?php
            }
            //entyty
            echo $this->Form->control('descripcion', ["class" => 'form-control', 'disabled' => true]);


        ?>

        </div>
    </fieldset>
    <?= $this->Form->end() ?>
    <hr>
    <div class="tickets view large-9 medium-8 columns content well">
        <h4>Detalle de gestiones</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>N°</th>
                    <!--<th>Usuario</th>-->
                    <th>Fecha</th>
                    <th>Comentario</th>
                    <th>Adjunto</th>
                    <!--<th>Acciones</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                    if(is_array($rs_gestiones) && count($rs_gestiones)>0){
                        $i = 1;
                        foreach ($rs_gestiones as $row) {
                            echo '<tr>';
                            echo '<td>'.$i .'</td>';
                            echo '<td>'.$row['created'] .'</td>';
                            echo '<td>'.$row['comentarios'] .'</td>';
                            if($row['file_name']!=''){
                                echo '<td><a href="'.APP_URI.'uploads/descarga/ticket/'.$row['file_name'] .'" class="btn btn-success btn-xs" target="_blank"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a></td>';
                            }else{
                                echo '<td></td>';
                            }
                            
                            echo '<!--<td></td>-->';
                            echo '</tr>';
                            $i++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <hr>
    
    <?= $this->Form->create($gestione, array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_gestion')) ?>
    <?php
    if($ticket->active!='6' && $ticket->active!='0' && $ticket->active!='3'){
    ?>
    <input type="hidden" name="active" id="active" value="1"> 
    <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $ticket->id; ?>">
    <fieldset>
        <legend><?= __('Agregar Gestión Ticket N°'. $ticket->id) ?></legend>
        <div class="form-group">
        <?php
            echo $this->Form->input('adjunto',array( 'type' => 'file'));

            echo $this->Form->control('comentarios', ["class" => 'form-control', 'required' => true]);
        ?>

        </div>
    </fieldset>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>tickets/asignado/">Cancelar</a>
            <!--<a class="btn btn-info" href="<?php echo APP_URI; ?>tickets/cerrar/<?php echo $ticket->id; ?>/3" >Cerrar</a>-->
            <?php
            if($ticket->active!='6' && $ticket->active!='0' && $ticket->active!='3'){
            ?>
                <?= $this->Form->button('Cerrar',  array("class" => 'btn btn-info', 'id' => 'btn_cerrar')) ?>
            <?php
            }
            ?>
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?php
            if($ticket->active!='6' && $ticket->active!='0' && $ticket->active!='3'){
            ?>
                <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success', 'id' => 'btn_guardar')) ?>
            <?php
            }
            ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
