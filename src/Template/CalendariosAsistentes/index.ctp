<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calendarios Asistente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calendariosAsistentes index large-9 medium-8 columns content">
    <h3><?= __('Calendarios Asistentes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reuinion_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calendariosAsistentes as $calendariosAsistente): ?>
            <tr>
                <td><?= $this->Number->format($calendariosAsistente->id) ?></td>
                <td><?= $this->Number->format($calendariosAsistente->reuinion_id) ?></td>
                <td><?= $calendariosAsistente->has('user') ? $this->Html->link($calendariosAsistente->user->id, ['controller' => 'Users', 'action' => 'view', $calendariosAsistente->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $calendariosAsistente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calendariosAsistente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calendariosAsistente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendariosAsistente->id)]) ?>
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
