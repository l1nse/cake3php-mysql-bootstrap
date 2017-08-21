<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Producto'), ['action' => 'edit', $tipoProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Producto'), ['action' => 'delete', $tipoProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Asignaciones'), ['controller' => 'Asignaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Asignacione'), ['controller' => 'Asignaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subtipo Productos'), ['controller' => 'SubtipoProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subtipo Producto'), ['controller' => 'SubtipoProductos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoProductos view large-9 medium-8 columns content">
    <h3><?= h($tipoProducto->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tipoProducto->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoProducto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($tipoProducto->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tipoProducto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tipoProducto->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Asignaciones') ?></h4>
        <?php if (!empty($tipoProducto->asignaciones)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Tipo Producto Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipoProducto->asignaciones as $asignaciones): ?>
            <tr>
                <td><?= h($asignaciones->id) ?></td>
                <td><?= h($asignaciones->user_id) ?></td>
                <td><?= h($asignaciones->tipo_producto_id) ?></td>
                <td><?= h($asignaciones->created) ?></td>
                <td><?= h($asignaciones->modified) ?></td>
                <td><?= h($asignaciones->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Asignaciones', 'action' => 'view', $asignaciones->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Asignaciones', 'action' => 'edit', $asignaciones->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Asignaciones', 'action' => 'delete', $asignaciones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asignaciones->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Subtipo Productos') ?></h4>
        <?php if (!empty($tipoProducto->subtipo_productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tipo Producto Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipoProducto->subtipo_productos as $subtipoProductos): ?>
            <tr>
                <td><?= h($subtipoProductos->id) ?></td>
                <td><?= h($subtipoProductos->tipo_producto_id) ?></td>
                <td><?= h($subtipoProductos->name) ?></td>
                <td><?= h($subtipoProductos->created) ?></td>
                <td><?= h($subtipoProductos->modified) ?></td>
                <td><?= h($subtipoProductos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SubtipoProductos', 'action' => 'view', $subtipoProductos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SubtipoProductos', 'action' => 'edit', $subtipoProductos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SubtipoProductos', 'action' => 'delete', $subtipoProductos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subtipoProductos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
