<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calendarios Contacto'), ['action' => 'edit', $calendariosContacto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calendarios Contacto'), ['action' => 'delete', $calendariosContacto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendariosContacto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calendarios Contactos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calendarios Contacto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contactos'), ['controller' => 'Contactos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contacto'), ['controller' => 'Contactos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calendariosContactos view large-9 medium-8 columns content">
    <h3><?= h($calendariosContacto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Contacto') ?></th>
            <td><?= $calendariosContacto->has('contacto') ? $this->Html->link($calendariosContacto->contacto->name, ['controller' => 'Contactos', 'action' => 'view', $calendariosContacto->contacto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($calendariosContacto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reunion Id') ?></th>
            <td><?= $this->Number->format($calendariosContacto->reunion_id) ?></td>
        </tr>
    </table>
</div>
