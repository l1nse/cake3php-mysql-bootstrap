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
                ['action' => 'delete', $subtipoProducto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subtipoProducto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subtipo Productos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['controller' => 'TipoProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['controller' => 'TipoProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Detalle Asignaciones'), ['controller' => 'DetalleAsignaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Detalle Asignacione'), ['controller' => 'DetalleAsignaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subtipoProductos form large-9 medium-8 columns content">
    <?= $this->Form->create($subtipoProducto) ?>
    <fieldset>
        <legend><?= __('Edit Subtipo Producto') ?></legend>
        <?php
            echo $this->Form->control('tipo_producto_id', ['options' => $tipoProductos, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
