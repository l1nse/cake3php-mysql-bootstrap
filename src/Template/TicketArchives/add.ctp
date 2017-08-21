<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ticket Archives'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Archives'), ['controller' => 'Archives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Archive'), ['controller' => 'Archives', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ticketArchives form large-9 medium-8 columns content">
    <?= $this->Form->create($ticketArchive) ?>
    <fieldset>
        <legend><?= __('Add Ticket Archive') ?></legend>
        <?php
            echo $this->Form->control('ticket_id', ['options' => $tickets, 'empty' => true]);
            echo $this->Form->control('archive_id', ['options' => $archives, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
