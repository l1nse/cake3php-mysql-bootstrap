<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Asignaciones'), ['controller' => 'Asignaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Asignacione'), ['controller' => 'Asignaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subtipo Productos'), ['controller' => 'SubtipoProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subtipo Producto'), ['controller' => 'SubtipoProductos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoProductos form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoProducto) ?>
    <fieldset>
        <legend><?= __('Add Tipo Producto') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
