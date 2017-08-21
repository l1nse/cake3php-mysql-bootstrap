<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipoCambio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipoCambio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tipo Cambios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Item Cotizaciones'), ['controller' => 'ItemCotizaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Cotizacione'), ['controller' => 'ItemCotizaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoCambios form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoCambio) ?>
    <fieldset>
        <legend><?= __('Edit Tipo Cambio') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
