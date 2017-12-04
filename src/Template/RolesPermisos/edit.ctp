<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rolesPermiso->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rolesPermiso->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Roles Permisos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permisos'), ['controller' => 'Permisos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permiso'), ['controller' => 'Permisos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rolesPermisos form large-9 medium-8 columns content">
    <?= $this->Form->create($rolesPermiso) ?>
    <fieldset>
        <legend><?= __('Edit Roles Permiso') ?></legend>
        <?php
            echo $this->Form->control('role_id', ['options' => $roles, 'empty' => true]);
            echo $this->Form->control('permiso_id', ['options' => $permisos, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
