<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vitacora Fichas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Estado Fichas'), ['controller' => 'EstadoFichas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estado Ficha'), ['controller' => 'EstadoFichas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['controller' => 'FichaNegocios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['controller' => 'FichaNegocios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vitacoraFichas form large-9 medium-8 columns content">
    <?= $this->Form->create($vitacoraFicha) ?>
    <fieldset>
        <legend><?= __('Add Vitacora Ficha') ?></legend>
        <?php
            echo $this->Form->control('estado_ficha_id', ['options' => $estadoFichas, 'empty' => true]);
            echo $this->Form->control('ficha_negocio_id', ['options' => $fichaNegocios, 'empty' => true]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
