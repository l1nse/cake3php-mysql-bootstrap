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
                ['action' => 'delete', $canalVenta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $canalVenta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Canal Ventas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="canalVentas form large-9 medium-8 columns content">
    <?= $this->Form->create($canalVenta) ?>
    <fieldset>
        <legend><?= __('Edit Canal Venta') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
