<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Asignacione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['controller' => 'TipoProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['controller' => 'TipoProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Detalle Asignaciones'), ['controller' => 'DetalleAsignaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Detalle Asignacione'), ['controller' => 'DetalleAsignaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="asignaciones index large-9 medium-8 columns content">
    <h3><?= __('Asignaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_producto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asignaciones as $asignacione): ?>
            <tr>
                <td><?= $this->Number->format($asignacione->id) ?></td>
                <td><?= $asignacione->has('user') ? $this->Html->link($asignacione->user->id, ['controller' => 'Users', 'action' => 'view', $asignacione->user->id]) : '' ?></td>
                <td><?= $asignacione->has('tipo_producto') ? $this->Html->link($asignacione->tipo_producto->name, ['controller' => 'TipoProductos', 'action' => 'view', $asignacione->tipo_producto->id]) : '' ?></td>
                <td><?= h($asignacione->created) ?></td>
                <td><?= h($asignacione->modified) ?></td>
                <th scope="row"><?= __('Active') ?></th>
            <td style="text-align: left;">Estado<?= $estado;  ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $asignacione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $asignacione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $asignacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asignacione->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    