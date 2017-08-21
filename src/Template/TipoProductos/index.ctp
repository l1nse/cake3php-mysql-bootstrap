<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Asignaciones'), ['controller' => 'Asignaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Asignacione'), ['controller' => 'Asignaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subtipo Productos'), ['controller' => 'SubtipoProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subtipo Producto'), ['controller' => 'SubtipoProductos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoProductos index large-9 medium-8 columns content">
    <h3><?= __('Tipo Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoProductos as $tipoProducto): ?>
            <tr>
                <td><?= $this->Number->format($tipoProducto->id) ?></td>
                <td><?= h($tipoProducto->name) ?></td>
                <td><?= h($tipoProducto->created) ?></td>
                <td><?= h($tipoProducto->modified) ?></td>
                <td><?= $this->Number->format($tipoProducto->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoProducto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoProducto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoProducto->id)]) ?>
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
