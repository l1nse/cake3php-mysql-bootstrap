<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket Archive'), ['action' => 'edit', $ticketArchive->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket Archive'), ['action' => 'delete', $ticketArchive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketArchive->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ticket Archives'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket Archive'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Archives'), ['controller' => 'Archives', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Archive'), ['controller' => 'Archives', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ticketArchives view large-9 medium-8 columns content">
    <h3><?= h($ticketArchive->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ticket') ?></th>
            <td><?= $ticketArchive->has('ticket') ? $this->Html->link($ticketArchive->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $ticketArchive->ticket->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Archive') ?></th>
            <td><?= $ticketArchive->has('archive') ? $this->Html->link($ticketArchive->archive->name, ['controller' => 'Archives', 'action' => 'view', $ticketArchive->archive->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticketArchive->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ticketArchive->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ticketArchive->modified) ?></td>
        </tr>
    </table>
</div>
