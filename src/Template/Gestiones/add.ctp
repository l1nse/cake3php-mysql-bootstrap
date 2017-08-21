<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Gestiones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gestione Archives'), ['controller' => 'GestioneArchives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gestione Archive'), ['controller' => 'GestioneArchives', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gestiones form large-9 medium-8 columns content">
    <?= $this->Form->create($gestione) ?>
    <fieldset>
        <legend><?= __('Add Gestione') ?></legend>
        <?php
            echo $this->Form->control('comentarios');
            echo $this->Form->control('active');
            echo $this->Form->control('ticket_id', ['options' => $tickets, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
