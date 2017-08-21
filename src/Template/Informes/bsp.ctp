<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('tickets') ?>
<div class="tickets form large-9 medium-8 columns content">
    <?= $this->Form->create($ticket, array('class' => 'formulario','enctype' => "multipart/form-data", 'id' => 'frm_add')) ?>
    <input type="hidden" name="active" id="active" value="1"> 
        <input type="hidden" name="sub_sistema_id_hd" id="sub_sistema_id_hd" value="">
    <fieldset>
        <legend><?= __('Agregar Ticket') ?></legend>
        <div class="form-group">
        <?php
            
            echo $this->Form->input('adjunto',array( 'type' => 'file'));
            echo $this->Form->control('descripcion', ["class" => 'form-control', 'required' => true]);
        ?>
        </div>
    </fieldset>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>tickets/index/">Cancelar</a>
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success', 'id' => 'btn_guardar')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
