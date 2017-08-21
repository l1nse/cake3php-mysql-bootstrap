<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subtipo Producto'), ['action' => 'edit', $subtipoProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subtipo Producto'), ['action' => 'delete', $subtipoProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subtipoProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subtipo Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subtipo Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['controller' => 'TipoProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['controller' => 'TipoProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Asignaciones'), ['controller' => 'DetalleAsignaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Asignacione'), ['controller' => 'DetalleAsignaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subtipoProductos view large-9 medium-8 columns content">
    <h3><?= h($subtipoProducto->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo Producto') ?></th>
            <td><?= $subtipoProducto->has('tipo_producto') ? $this->Html->link($subtipoProducto->tipo_producto->name, ['controller' => 'TipoProductos', 'action' => 'view', $subtipoProducto->tipo_producto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subtipoProducto->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subtipoProducto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($subtipoProducto->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subtipoProducto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subtipoProducto->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Detalle Asignaciones') ?></h4>
        <?php if (!empty($subtipoProducto->detalle_asignaciones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Subtipo Producto Id') ?></th>
                <th scope="col"><?= __('Asignacione Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col"><?= __('Fecha Inicio') ?></th>
                <th scope="col"><?= __('Fecha Termino') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subtipoProducto->detalle_asignaciones as $detalleAsignaciones): ?>
            <tr>
                <td><?= h($detalleAsignaciones->id) ?></td>
                <td><?= h($detalleAsignaciones->subtipo_producto_id) ?></td>
                <td><?= h($detalleAsignaciones->asignacione_id) ?></td>
                <td><?= h($detalleAsignaciones->name) ?></td>
                <td><?= h($detalleAsignaciones->cantidad) ?></td>
                <td><?= h($detalleAsignaciones->fecha_inicio) ?></td>
                <td><?= h($detalleAsignaciones->fecha_termino) ?></td>
                <td><?= h($detalleAsignaciones->created) ?></td>
                <td><?= h($detalleAsignaciones->modified) ?></td>
                <td><?= h($detalleAsignaciones->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DetalleAsignaciones', 'action' => 'view', $detalleAsignaciones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DetalleAsignaciones', 'action' => 'edit', $detalleAsignaciones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DetalleAsignaciones', 'action' => 'delete', $detalleAsignaciones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleAsignaciones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
