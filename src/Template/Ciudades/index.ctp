<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ciudade'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Paises'), ['controller' => 'Paises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Paise'), ['controller' => 'Paises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comunas'), ['controller' => 'Comunas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comuna'), ['controller' => 'Comunas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ciudades index large-9 medium-8 columns content">
    <h3><?= __('Ciudades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('paise_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciudades as $ciudade): ?>
            <tr>
                <td><?= $this->Number->format($ciudade->id) ?></td>
                <td><?= h($ciudade->name) ?></td>
                <td><?= $ciudade->has('paise') ? $this->Html->link($ciudade->paise->name, ['controller' => 'Paises', 'action' => 'view', $ciudade->paise->id]) : '' ?></td>
                <td><?= h($ciudade->created) ?></td>
                <td><?= h($ciudade->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciudade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciudade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciudade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciudade->id)]) ?>
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
