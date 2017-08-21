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
                ['action' => 'delete', $detalleAsignacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detalleAsignacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Detalle Asignaciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Subtipo Productos'), ['controller' => 'SubtipoProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subtipo Producto'), ['controller' => 'SubtipoProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Asignaciones'), ['controller' => 'Asignaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Asignacione'), ['controller' => 'Asignaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleAsignaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($detalleAsignacione) ?>
    <fieldset>
        <legend><?= __('Edit Detalle Asignacione') ?></legend>
        <?php
            echo $this->Form->control('subtipo_producto_id', ['options' => $subtipoProductos, 'empty' => true]);
            echo $this->Form->control('asignacione_id', ['options' => $asignaciones, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('cantidad');
            echo $this->Form->control('fecha_inicio', ['empty' => true]);
            echo $this->Form->control('fecha_termino', ['empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
