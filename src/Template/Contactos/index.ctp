<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contacto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entidades'), ['controller' => 'Entidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entidade'), ['controller' => 'Entidades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contactos index large-9 medium-8 columns content">
    <h3><?= __('Contactos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entidade_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto): ?>
            <tr>
                <td><?= $this->Number->format($contacto->id) ?></td>
                <td><?= $contacto->has('entidade') ? $this->Html->link($contacto->entidade->name, ['controller' => 'Entidades', 'action' => 'view', $contacto->entidade->id]) : '' ?></td>
                <td><?= h($contacto->name) ?></td>
                <td><?= h($contacto->email) ?></td>
                <td><?= h($contacto->telefono) ?></td>
                <td><?= h($contacto->cargo) ?></td>
                <td><?= h($contacto->descripcion) ?></td>
                <td><?= $this->Number->format($contacto->active) ?></td>
                <td><?= h($contacto->created) ?></td>
                <td><?= h($contacto->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contacto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contacto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contacto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contacto->id)]) ?>
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
