<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pasajeros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pasajeros form large-9 medium-8 columns content">
    <?= $this->Form->create($pasajero) ?>
    <fieldset>
        <legend><?= __('Add Pasajero') ?></legend>
        <?php
            echo $this->Form->control('folio_ficha');
            echo $this->Form->control('numero_ticket');
            echo $this->Form->control('nombre1');
            echo $this->Form->control('nombre2');
            echo $this->Form->control('apellidop');
            echo $this->Form->control('apellidom');
            echo $this->Form->control('rut');
            echo $this->Form->control('nacionalidad');
            echo $this->Form->control('origen');
            echo $this->Form->control('destino');
            echo $this->Form->control('aerolinea');
            echo $this->Form->control('cod_pasasje');
            echo $this->Form->control('aeropuerto_origen');
            echo $this->Form->control('aeropuerto_destino');
            echo $this->Form->control('fecha_hora_salida', ['empty' => true]);
            echo $this->Form->control('fecha_hora_llegada', ['empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
