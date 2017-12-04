<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $servicio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $servicio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Servicios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['controller' => 'FichaNegocios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['controller' => 'FichaNegocios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entidades'), ['controller' => 'Entidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entidade'), ['controller' => 'Entidades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocio Servicios'), ['controller' => 'FichaNegocioServicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio Servicio'), ['controller' => 'FichaNegocioServicios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicios form large-9 medium-8 columns content">
    <?= $this->Form->create($servicio) ?>
    <fieldset>
        <legend><?= __('Edit Servicio') ?></legend>
        <?php
            echo $this->Form->control('ficha_negocio_id', ['options' => $fichaNegocios, 'empty' => true]);
            echo $this->Form->control('proveedor_id');
            echo $this->Form->control('tipo_servicio');
            echo $this->Form->control('condicion_pago');
            echo $this->Form->control('valor_neto');
            echo $this->Form->control('valor_neto_usd');
            echo $this->Form->control('tax');
            echo $this->Form->control('tax_usd');
            echo $this->Form->control('valor_neto_land');
            echo $this->Form->control('valor_neto_land_usd');
            echo $this->Form->control('iva_land_tipo');
            echo $this->Form->control('iva_land_pesos');
            echo $this->Form->control('iva_land_usd');
            echo $this->Form->control('comag_procentaje');
            echo $this->Form->control('comag_pesos');
            echo $this->Form->control('comag_usd');
            echo $this->Form->control('over_porcentaje');
            echo $this->Form->control('over_pesos');
            echo $this->Form->control('over_usd');
            echo $this->Form->control('amex_porcentaje');
            echo $this->Form->control('amex_pesos');
            echo $this->Form->control('amex_usd');
            echo $this->Form->control('neto_comag_pesos');
            echo $this->Form->control('neto_comag_usd');
            echo $this->Form->control('iva_porcentaje');
            echo $this->Form->control('iva_pesos');
            echo $this->Form->control('iva_usd');
            echo $this->Form->control('boleta_honorario_porcentaje');
            echo $this->Form->control('boleta_honorario_pesos');
            echo $this->Form->control('boleta_honorario_usd');
            echo $this->Form->control('total_pesos');
            echo $this->Form->control('total_usd');
            echo $this->Form->control('total_contabilidad_pesos');
            echo $this->Form->control('total_contabilidad_usd');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
