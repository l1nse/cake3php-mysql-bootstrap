<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Digi'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="digis index large-9 medium-8 columns content">
    <h3><?= __('Digis') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_desde') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_hasta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($digis as $digi): ?>
            <tr>
                <td><?= $this->Number->format($digi->id) ?></td>
                <td><?= $this->Number->format($digi->active) ?></td>
                <td><?= h($digi->observacion) ?></td>
                <td><?= h($digi->fecha_desde) ?></td>
                <td><?= h($digi->fecha_hasta) ?></td>
                <td><?= h($digi->created) ?></td>
                <td><?= h($digi->modified) ?></td>
                <td><?= $digi->has('user') ? $this->Html->link($digi->user->id, ['controller' => 'Users', 'action' => 'view', $digi->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $digi->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $digi->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $digi->id], ['confirm' => __('Are you sure you want to delete # {0}?', $digi->id)]) ?>
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
