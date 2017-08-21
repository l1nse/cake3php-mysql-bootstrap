<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ticket Archive'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Archives'), ['controller' => 'Archives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Archive'), ['controller' => 'Archives', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ticketArchives index large-9 medium-8 columns content">
    <h3><?= __('Ticket Archives') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('archive_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ticketArchives as $ticketArchive): ?>
            <tr>
                <td><?= $this->Number->format($ticketArchive->id) ?></td>
                <td><?= $ticketArchive->has('ticket') ? $this->Html->link($ticketArchive->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $ticketArchive->ticket->id]) : '' ?></td>
                <td><?= $ticketArchive->has('archive') ? $this->Html->link($ticketArchive->archive->name, ['controller' => 'Archives', 'action' => 'view', $ticketArchive->archive->id]) : '' ?></td>
                <td><?= h($ticketArchive->created) ?></td>
                <td><?= h($ticketArchive->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ticketArchive->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ticketArchive->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ticketArchive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketArchive->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
