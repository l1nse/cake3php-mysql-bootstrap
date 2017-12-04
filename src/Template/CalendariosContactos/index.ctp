<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calendarios Contacto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contactos'), ['controller' => 'Contactos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contacto'), ['controller' => 'Contactos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calendariosContactos index large-9 medium-8 columns content">
    <h3><?= __('Calendarios Contactos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contacto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reunion_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calendariosContactos as $calendariosContacto): ?>
            <tr>
                <td><?= $this->Number->format($calendariosContacto->id) ?></td>
                <td><?= $calendariosContacto->has('contacto') ? $this->Html->link($calendariosContacto->contacto->name, ['controller' => 'Contactos', 'action' => 'view', $calendariosContacto->contacto->id]) : '' ?></td>
                <td><?= $this->Number->format($calendariosContacto->reunion_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $calendariosContacto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calendariosContacto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calendariosContacto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendariosContacto->id)]) ?>
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
