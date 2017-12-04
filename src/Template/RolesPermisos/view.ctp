<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Roles Permiso'), ['action' => 'edit', $rolesPermiso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Roles Permiso'), ['action' => 'delete', $rolesPermiso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rolesPermiso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles Permisos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Roles Permiso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permisos'), ['controller' => 'Permisos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permiso'), ['controller' => 'Permisos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rolesPermisos view large-9 medium-8 columns content">
    <h3><?= h($rolesPermiso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $rolesPermiso->has('role') ? $this->Html->link($rolesPermiso->role->name, ['controller' => 'Roles', 'action' => 'view', $rolesPermiso->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permiso') ?></th>
            <td><?= $rolesPermiso->has('permiso') ? $this->Html->link($rolesPermiso->permiso->name, ['controller' => 'Permisos', 'action' => 'view', $rolesPermiso->permiso->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rolesPermiso->id) ?></td>
        </tr>
    </table>
</div>
