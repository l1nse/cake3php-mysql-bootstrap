<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Asignaciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Productos'), ['controller' => 'TipoProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Producto'), ['controller' => 'TipoProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Detalle Asignaciones'), ['controller' => 'DetalleAsignaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Detalle Asignacione'), ['controller' => 'DetalleAsignaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="asignaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($asignacione) ?>
    <fieldset>
        <legend><?= __('Add Asignacione') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('tipo_producto_id', ['options' => $tipoProductos, 'empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
