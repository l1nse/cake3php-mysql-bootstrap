<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Calendarios Contactos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contactos'), ['controller' => 'Contactos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contacto'), ['controller' => 'Contactos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calendariosContactos form large-9 medium-8 columns content">
    <?= $this->Form->create($calendariosContacto) ?>
    <fieldset>
        <legend><?= __('Add Calendarios Contacto') ?></legend>
        <?php
            echo $this->Form->control('contacto_id', ['options' => $contactos, 'empty' => true]);
            echo $this->Form->control('reunion_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
