<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Gestione'), ['action' => 'edit', $gestione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gestione'), ['action' => 'delete', $gestione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Gestiones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gestione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gestione Archives'), ['controller' => 'GestioneArchives', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gestione Archive'), ['controller' => 'GestioneArchives', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gestiones view large-9 medium-8 columns content">
    <h3><?= h($gestione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ticket') ?></th>
            <td><?= $gestione->has('ticket') ? $this->Html->link($gestione->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $gestione->ticket->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gestione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($gestione->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($gestione->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($gestione->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comentarios') ?></h4>
        <?= $this->Text->autoParagraph(h($gestione->comentarios)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Gestione Archives') ?></h4>
        <?php if (!empty($gestione->gestione_archives)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Gestione Id') ?></th>
                <th scope="col"><?= __('Archive Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($gestione->gestione_archives as $gestioneArchives): ?>
            <tr>
                <td><?= h($gestioneArchives->id) ?></td>
                <td><?= h($gestioneArchives->gestione_id) ?></td>
                <td><?= h($gestioneArchives->archive_id) ?></td>
                <td><?= h($gestioneArchives->created) ?></td>
                <td><?= h($gestioneArchives->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GestioneArchives', 'action' => 'view', $gestioneArchives->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GestioneArchives', 'action' => 'edit', $gestioneArchives->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GestioneArchives', 'action' => 'delete', $gestioneArchives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gestioneArchives->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
