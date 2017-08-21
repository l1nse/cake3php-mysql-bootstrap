<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Detalle Asignacione'), ['action' => 'edit', $detalleAsignacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Detalle Asignacione'), ['action' => 'delete', $detalleAsignacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleAsignacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Asignaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Asignacione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subtipo Productos'), ['controller' => 'SubtipoProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subtipo Producto'), ['controller' => 'SubtipoProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Asignaciones'), ['controller' => 'Asignaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Asignacione'), ['controller' => 'Asignaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="detalleAsignaciones view large-9 medium-8 columns content">
    <h3><?= h($detalleAsignacione->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Subtipo Producto') ?></th>
            <td><?= $detalleAsignacione->has('subtipo_producto') ? $this->Html->link($detalleAsignacione->subtipo_producto->name, ['controller' => 'SubtipoProductos', 'action' => 'view', $detalleAsignacione->subtipo_producto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asignacione') ?></th>
            <td><?= $detalleAsignacione->has('asignacione') ? $this->Html->link($detalleAsignacione->asignacione->id, ['controller' => 'Asignaciones', 'action' => 'view', $detalleAsignacione->asignacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($detalleAsignacione->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($detalleAsignacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($detalleAsignacione->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($detalleAsignacione->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($detalleAsignacione->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Termino') ?></th>
            <td><?= h($detalleAsignacione->fecha_termino) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($detalleAsignacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($detalleAsignacione->modified) ?></td>
        </tr>
    </table>
</div>
