<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Comuna'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ciudades'), ['controller' => 'Ciudades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciudade'), ['controller' => 'Ciudades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comunas index large-9 medium-8 columns content">
    <h3><?= __('Comunas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ciudade_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comunas as $comuna): ?>
            <tr>
                <td><?= $this->Number->format($comuna->id) ?></td>
                <td><?= h($comuna->name) ?></td>
                <td><?= $comuna->has('ciudade') ? $this->Html->link($comuna->ciudade->name, ['controller' => 'Ciudades', 'action' => 'view', $comuna->ciudade->id]) : '' ?></td>
                <td><?= h($comuna->created) ?></td>
                <td><?= h($comuna->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $comuna->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comuna->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comuna->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comuna->id)]) ?>
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
