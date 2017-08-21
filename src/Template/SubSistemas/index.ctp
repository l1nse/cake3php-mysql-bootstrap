<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sub Sistema'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sistemas'), ['controller' => 'Sistemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sistema'), ['controller' => 'Sistemas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subSistemas index large-9 medium-8 columns content">
    <h3><?= __('Sub Sistemas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sistema_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subSistemas as $subSistema): ?>
            <tr>
                <td><?= $this->Number->format($subSistema->id) ?></td>
                <td><?= $subSistema->has('sistema') ? $this->Html->link($subSistema->sistema->name, ['controller' => 'Sistemas', 'action' => 'view', $subSistema->sistema->id]) : '' ?></td>
                <td><?= h($subSistema->name) ?></td>
                <td><?= h($subSistema->created) ?></td>
                <td><?= h($subSistema->modified) ?></td>
                <td><?= $this->Number->format($subSistema->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subSistema->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subSistema->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subSistema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subSistema->id)]) ?>
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
