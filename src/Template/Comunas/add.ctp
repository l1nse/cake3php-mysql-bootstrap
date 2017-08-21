<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Comunas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ciudades'), ['controller' => 'Ciudades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciudade'), ['controller' => 'Ciudades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comunas form large-9 medium-8 columns content">
    <?= $this->Form->create($comuna) ?>
    <fieldset>
        <legend><?= __('Add Comuna') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('ciudade_id', ['options' => $ciudades, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
