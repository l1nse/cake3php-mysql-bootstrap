<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Subtipo Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['controller' => 'TipoProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['controller' => 'TipoProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Detalle Asignaciones'), ['controller' => 'DetalleAsignaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Detalle Asignacione'), ['controller' => 'DetalleAsignaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subtipoProductos index large-9 medium-8 columns content">
    <h3><?= __('Subtipo Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_producto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subtipoProductos as $subtipoProducto): ?>
            <tr>
                <td><?= $this->Number->format($subtipoProducto->id) ?></td>
                <td><?= $subtipoProducto->has('tipo_producto') ? $this->Html->link($subtipoProducto->tipo_producto->name, ['controller' => 'TipoProductos', 'action' => 'view', $subtipoProducto->tipo_producto->id]) : '' ?></td>
                <td><?= h($subtipoProducto->name) ?></td>
                <td><?= h($subtipoProducto->created) ?></td>
                <td><?= h($subtipoProducto->modified) ?></td>
                <td><?= $this->Number->format($subtipoProducto->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subtipoProducto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subtipoProducto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subtipoProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subtipoProducto->id)]) ?>
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
