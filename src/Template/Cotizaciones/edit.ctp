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
                ['action' => 'delete', $cotizacione->cotizacione_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cotizacione->cotizacione_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entidades'), ['controller' => 'Entidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entidade'), ['controller' => 'Entidades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Canal Ventas'), ['controller' => 'CanalVentas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Canal Venta'), ['controller' => 'CanalVentas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cotizaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($cotizacione) ?>
    <fieldset>
        <legend><?= __('Edit Cotizacione') ?></legend>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('entidade_id', ['options' => $entidades, 'empty' => true]);
            echo $this->Form->control('canal_venta_id', ['options' => $canalVentas, 'empty' => true]);
            echo $this->Form->control('version');
            echo $this->Form->control('total');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
