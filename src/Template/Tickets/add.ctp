<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('tickets') ?>

 <script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script type="text/javascript">
  tinymce.init({
    selector: 'textarea',
    theme: 'modern',
    width: "100%",
    height: "100%",
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });
  </script>




    <div class="tickets form large-9 medium-8 columns content">
        <?= $this->Form->create($ticket, array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_add')) ?>
        
        <input type="hidden" name="active" id="active" value="1"> 
            <input type="hidden" name="sub_sistema_id_hd" id="sub_sistema_id_hd" value="">
    <fieldset>
        <legend><?= __('Agregar Ticket') ?></legend>
        <div class="form-group">
        <?php
            echo $this->Form->control('sistema_id', ['options' => $sistemas, 'empty' => true, "class" => 'form-control', 'required' => true]);
        ?>
        </div>
        <div class="form-group">
        <?php
            echo $this->Form->control('sub_sistema_id', ["class" => 'form-control', 'empty' => true, 'required' => true]);
            /*echo $this->Form->control('Asignar Usuario', ['options' => $userAsignados, 'empty' => true, "class" => 'form-control', "name" => "user_asignado_id", "id" => "user_asignado_id", 'required' => true]);*/
        ?>
        </div>
        <div class="form-group">
            <div class="input select required">
                <label for="user_asignado_id">Asignar Usuario</label>
                <select class="form-control" required="required" id="user_asignado_id" name="user_asignado_id">
                <option value=""></option>
                <?php
                    if(is_array($userAsignados) && count($userAsignados)>0){
                        foreach ($userAsignados as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['apellido1'].'</option>';
                        }
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="form-group">
        <?php
            echo $this->Form->control('prioridad', ["class" => 'form-control', 'options' => ['' => '', '1' => 'Alta', '2' => 'Media', '3' => 'Baja'], 'required' => true]);
        ?>
        </div>
        <div class="form-group">
        <?php

            echo $this->Form->control('Tiempo limite', ["class" => "form-control numeric", "id" => "tiempo_limite", "name" => "tiempo_limite", 'required' => true]);
        ?>
        </div>
        <div class="form-group">
        <?php
            echo $this->Form->control('Unidad de tiempo', ["class" => "form-control", "id" => "tiempo_tipo", "name" => "tiempo_tipo", "options" => ["" => "", "Hora(s)" => "Hora(s)", "Día(s)" => "Día(s)", "Semana(s)" => "Semana(s)", "Mes(es)" => "Mes(es)"], 'required' => true]);
        ?>
        </div>
        <div class="form-group">
        <?php
            echo $this->Form->control('asunto', ["class" => 'form-control', 'required' => true]);
        ?>
        </div>
        <div class="form-group">
        <?php
            echo $this->Form->input('adjunto',array( 'type' => 'file'));
        ?>
        </div>
        <div class="form-group">
        <?php
            echo $this->Form->control('descripcion', ["class" => 'form-control', 'required' => true]);
        ?>
        </div>
    </div>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>tickets/index/">Cancelar</a>
        </div>
        <div class="col-md-1 col-md-offset-5">
            <button type="button" id="btn_guardar"  class="btn btn-success">Guardar</button>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
