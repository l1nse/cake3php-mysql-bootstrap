<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Roles Permiso'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permisos'), ['controller' => 'Permisos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permiso'), ['controller' => 'Permisos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rolesPermisos index large-9 medium-8 columns content">
    <h3><?= __('Roles Permisos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('permiso_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rolesPermisos as $rolesPermiso): ?>
            <tr>
                <td><?= $this->Number->format($rolesPermiso->id) ?></td>
                <td><?= $rolesPermiso->has('role') ? $this->Html->link($rolesPermiso->role->name, ['controller' => 'Roles', 'action' => 'view', $rolesPermiso->role->id]) : '' ?></td>
                <td><?= $rolesPermiso->has('permiso') ? $this->Html->link($rolesPermiso->permiso->name, ['controller' => 'Permisos', 'action' => 'view', $rolesPermiso->permiso->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rolesPermiso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rolesPermiso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rolesPermiso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolesPermiso->id)]) ?>
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
