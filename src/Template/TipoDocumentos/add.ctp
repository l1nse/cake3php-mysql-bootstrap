<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tipo Documentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Despachos'), ['controller' => 'Despachos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Despacho'), ['controller' => 'Despachos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoDocumentos form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoDocumento) ?>
    <fieldset>
        <legend><?= __('Add Tipo Documento') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
