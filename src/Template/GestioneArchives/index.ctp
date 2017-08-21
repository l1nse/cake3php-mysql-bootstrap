<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Gestione Archive'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gestiones'), ['controller' => 'Gestiones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gestione'), ['controller' => 'Gestiones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Archives'), ['controller' => 'Archives', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Archive'), ['controller' => 'Archives', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gestioneArchives index large-9 medium-8 columns content">
    <h3><?= __('Gestione Archives') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gestione_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('archive_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gestioneArchives as $gestioneArchive): ?>
            <tr>
                <td><?= $this->Number->format($gestioneArchive->id) ?></td>
                <td><?= $gestioneArchive->has('gestione') ? $this->Html->link($gestioneArchive->gestione->id, ['controller' => 'Gestiones', 'action' => 'view', $gestioneArchive->gestione->id]) : '' ?></td>
                <td><?= $gestioneArchive->has('archive') ? $this->Html->link($gestioneArchive->archive->name, ['controller' => 'Archives', 'action' => 'view', $gestioneArchive->archive->id]) : '' ?></td>
                <td><?= h($gestioneArchive->created) ?></td>
                <td><?= h($gestioneArchive->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gestioneArchive->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gestioneArchive->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gestioneArchive->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestioneArchive->id)]) ?>
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
