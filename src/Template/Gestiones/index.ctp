<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gestione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gestione Archives'), ['controller' => 'GestioneArchives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gestione Archive'), ['controller' => 'GestioneArchives', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gestiones index large-9 medium-8 columns content">
    <h3><?= __('Gestiones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gestiones as $gestione): ?>
            <tr>
                <td><?= $this->Number->format($gestione->id) ?></td>
                <td><?= h($gestione->created) ?></td>
                <td><?= h($gestione->modified) ?></td>
                <td><?= $this->Number->format($gestione->active) ?></td>
                <td><?= $gestione->has('ticket') ? $this->Html->link($gestione->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $gestione->ticket->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gestione->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gestione->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gestione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestione->id)]) ?>
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
