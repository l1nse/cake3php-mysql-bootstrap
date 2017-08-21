<?php
/**
  * @var \App\View\AppView $this
  */

?>
<?= $this->Html->script('entidades') ?>
<div class="entidades form large-9 medium-8 columns content">
    <?= $this->Form->create($entidade) ?>
    <fieldset>

        <legend><?= __('Editar Empresa') ?></legend>
        <div class="alert alert-success" role="alert">Los campos marcados con <b>(*)</b> son obligatorios.</div>
        <div class="form-group">
        <?php
            echo $this->Form->control('rut (*)', ["class" => 'form-control', 'required' => true, 'id' => 'rut', 'name' => 'rut', 'value' => $entidade->rut]);
            echo $this->Form->control('codigo_softland (*)', ["class" => 'form-control numeric' , 'required' => true, 'id' => 'codigo_softland', 'name' => 'codigo_softland','value' => $entidade->codigo_softland]);
            echo $this->Form->control('razón_social (*)', ["class" => 'form-control', 'required' => true, 'id' => 'name', 'name' => 'name', 'value' => $entidade->name]);
            echo $this->Form->control('giro (*)', ["class" => 'form-control' , 'required' => true, 'id' => 'giro', 'name' => 'giro','value' => $entidade->giro]);
            echo $this->Form->control('tipo (*)', ["class" => 'form-control', 'options' => ['' => '', '1' => 'Proveedor', '2' => 'Cliente' ],'required' => true, 'id' => 'tipo', 'name' => 'tipo','value' => $entidade->tipo]);
            echo $this->Form->control('direccion', ["class" => 'form-control', 'value' => $entidade->direccion]);
            echo $this->Form->control('telefono', ["class" => 'form-control phone', 'value' => $entidade->telefono]);
            //echo $this->Form->control('rut_representante', ["class" => 'form-control']);
            //echo $this->Form->control('nombre_representante', ["class" => 'form-control', 'id' => 'name_representante', 'name' => 'name_representante']);
            //echo $this->Form->control('correo_representante', ["class" => 'form-control']);
            
            echo $this->Form->control('acuerdo_de_pago  (*)', ["class" => 'form-control', 'required' => true, 'id' => 'acuerdo', 'name' => 'acuerdo', 'value' => $entidade->acuerdo]);
        ?>
        </div>
    </fieldset>
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-danger" href="<?php echo APP_URI; ?>entidades/index/">Cancelar</a>
        </div>
        <div class="col-md-1 col-md-offset-5">
            <?= $this->Form->button('Guardar',  array("class" => 'btn btn-success', 'id' => 'btn_guardar')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
