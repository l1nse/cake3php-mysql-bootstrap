<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contactos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Entidades'), ['controller' => 'Entidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entidade'), ['controller' => 'Entidades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contactos form large-9 medium-8 columns content">
    <?= $this->Form->create($contacto) ?>
    <fieldset>
        <legend><?= __('Add Contacto') ?></legend>
        <?php
            echo $this->Form->control('entidade_id', ['options' => $entidades, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('email');
            echo $this->Form->control('telefono');
            echo $this->Form->control('cargo');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
