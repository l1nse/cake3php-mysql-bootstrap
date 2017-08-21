<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciudades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Paises'), ['controller' => 'Paises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Paise'), ['controller' => 'Paises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comunas'), ['controller' => 'Comunas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comuna'), ['controller' => 'Comunas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciudades form large-9 medium-8 columns content">
    <?= $this->Form->create($ciudade) ?>
    <fieldset>
        <legend><?= __('Add Ciudade') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('paise_id', ['options' => $paises, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
