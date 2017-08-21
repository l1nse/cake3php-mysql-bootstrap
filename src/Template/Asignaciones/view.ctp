<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Asignacione'), ['action' => 'edit', $asignacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Asignacione'), ['action' => 'delete', $asignacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asignacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Asignaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Asignacione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['controller' => 'TipoProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['controller' => 'TipoProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Detalle Asignaciones'), ['controller' => 'DetalleAsignaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Detalle Asignacione'), ['controller' => 'DetalleAsignaciones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="asignaciones view large-9 medium-8 columns content">
    <h3><?= h($asignacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $asignacione->has('user') ? $this->Html->link($asignacione->user->id, ['controller' => 'Users', 'action' => 'view', $asignacione->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Producto') ?></th>
            <td><?= $asignacione->has('tipo_producto') ? $this->Html->link($asignacione->tipo_producto->name, ['controller' => 'TipoProductos', 'action' => 'view', $asignacione->tipo_producto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($asignacione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($asignacione->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($asignacione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($asignacione->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Detalle Asignaciones') ?></h4>
        <?php if (!empty($asignacione->detalle_asignaciones)): ?>
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
            <?php foreach ($asignacione->detalle_asignaciones as $detalleAsignaciones): ?>
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
