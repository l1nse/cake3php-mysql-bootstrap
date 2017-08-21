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
                ['action' => 'delete', $jefeArea->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $jefeArea->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Jefe Areas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jefeAreas form large-9 medium-8 columns content">
    <?= $this->Form->create($jefeArea) ?>
    <fieldset>
        <legend><?= __('Edit Jefe Area') ?></legend>
        <?php
            echo $this->Form->control('area_id', ['options' => $areas, 'empty' => true]);
            echo $this->Form->control('ficha_personale_id', ['options' => $fichaPersonales, 'empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
