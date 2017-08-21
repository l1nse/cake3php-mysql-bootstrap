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
                ['action' => 'delete', $itemCotizacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemCotizacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Item Cotizaciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cotizaciones'), ['controller' => 'Cotizaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cotizacione'), ['controller' => 'Cotizaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Items'), ['controller' => 'TipoItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Item'), ['controller' => 'TipoItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Cambios'), ['controller' => 'TipoCambios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Cambio'), ['controller' => 'TipoCambios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemCotizaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($itemCotizacione) ?>
    <fieldset>
        <legend><?= __('Edit Item Cotizacione') ?></legend>
        <?php
            echo $this->Form->control('cotizacione_id', ['options' => $cotizaciones, 'empty' => true]);
            echo $this->Form->control('tipo_item_id', ['options' => $tipoItems, 'empty' => true]);
            echo $this->Form->control('tipo_cambio_id', ['options' => $tipoCambios, 'empty' => true]);
            echo $this->Form->control('descripcion');
            echo $this->Form->control('valor');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
