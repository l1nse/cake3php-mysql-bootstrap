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
                ['action' => 'delete', $ticketControl->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ticketControl->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ticket Control'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ticketControl form large-9 medium-8 columns content">
    <?= $this->Form->create($ticketControl) ?>
    <fieldset>
        <legend><?= __('Edit Ticket Control') ?></legend>
        <?php
            echo $this->Form->control('placa');
            echo $this->Form->control('linea_aerea');
            echo $this->Form->control('ticket');
            echo $this->Form->control('moneda');
            echo $this->Form->control('emision_tkt');
            echo $this->Form->control('ficha');
            echo $this->Form->control('factura');
            echo $this->Form->control('empresa');
            echo $this->Form->control('apellido');
            echo $this->Form->control('nombre');
            echo $this->Form->control('ruta');
            echo $this->Form->control('pais');
            echo $this->Form->control('continente');
            echo $this->Form->control('itinerario');
            echo $this->Form->control('vendedor');
            echo $this->Form->control('observaciones_1');
            echo $this->Form->control('tkt_usd_1');
            echo $this->Form->control('tkt_clp_1');
            echo $this->Form->control('tax_usd_1');
            echo $this->Form->control('tax_clp_1');
            echo $this->Form->control('tkt_usd_2');
            echo $this->Form->control('tkt_clp_2');
            echo $this->Form->control('tax_usd_2');
            echo $this->Form->control('tax_clp_2');
            echo $this->Form->control('normal');
            echo $this->Form->control('over');
            echo $this->Form->control('dolares_1');
            echo $this->Form->control('pesos_1');
            echo $this->Form->control('dolares_2');
            echo $this->Form->control('pesos_2');
            echo $this->Form->control('dolares_3');
            echo $this->Form->control('pesos_3');
            echo $this->Form->control('observaciones_2');
            echo $this->Form->control('total_usd');
            echo $this->Form->control('total_clp');
            echo $this->Form->control('utilidad_usd');
            echo $this->Form->control('utilidad_clp');
            echo $this->Form->control('com_usd');
            echo $this->Form->control('com_clp');
            echo $this->Form->control('over_usd');
            echo $this->Form->control('over_clp');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
