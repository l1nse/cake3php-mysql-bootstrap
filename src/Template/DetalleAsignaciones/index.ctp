<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Detalle Asignacione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subtipo Productos'), ['controller' => 'SubtipoProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subtipo Producto'), ['controller' => 'SubtipoProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Asignaciones'), ['controller' => 'Asignaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Asignacione'), ['controller' => 'Asignaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="detalleAsignaciones index large-9 medium-8 columns content">
    <h3><?= __('Detalle Asignaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subtipo_producto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asignacione_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_termino') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalleAsignaciones as $detalleAsignacione): ?>
            <tr>
                <td><?= $this->Number->format($detalleAsignacione->id) ?></td>
                <td><?= $detalleAsignacione->has('subtipo_producto') ? $this->Html->link($detalleAsignacione->subtipo_producto->name, ['controller' => 'SubtipoProductos', 'action' => 'view', $detalleAsignacione->subtipo_producto->id]) : '' ?></td>
                <td><?= $detalleAsignacione->has('asignacione') ? $this->Html->link($detalleAsignacione->asignacione->id, ['controller' => 'Asignaciones', 'action' => 'view', $detalleAsignacione->asignacione->id]) : '' ?></td>
                <td><?= h($detalleAsignacione->name) ?></td>
                <td><?= $this->Number->format($detalleAsignacione->cantidad) ?></td>
                <td><?= h($detalleAsignacione->fecha_inicio) ?></td>
                <td><?= h($detalleAsignacione->fecha_termino) ?></td>
                <td><?= h($detalleAsignacione->created) ?></td>
                <td><?= h($detalleAsignacione->modified) ?></td>
                <td><?= $this->Number->format($detalleAsignacione->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $detalleAsignacione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detalleAsignacione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detalleAsignacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleAsignacione->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
