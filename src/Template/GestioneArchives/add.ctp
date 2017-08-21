<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Gestione Archives'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Gestiones'), ['controller' => 'Gestiones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gestione'), ['controller' => 'Gestiones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Archives'), ['controller' => 'Archives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Archive'), ['controller' => 'Archives', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gestioneArchives form large-9 medium-8 columns content">
    <?= $this->Form->create($gestioneArchive) ?>
    <fieldset>
        <legend><?= __('Add Gestione Archive') ?></legend>
        <?php
            echo $this->Form->control('gestione_id', ['options' => $gestiones, 'empty' => true]);
            echo $this->Form->control('archive_id', ['options' => $archives, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
