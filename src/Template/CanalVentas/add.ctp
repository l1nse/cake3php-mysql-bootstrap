<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="canalVentas form large-9 medium-8 columns content">
    <?= $this->Form->create($canalVenta) ?>
    <fieldset>
        <legend><?= __('Add Canal Venta') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('active', ['empty' => true]);
        ?>
    </fieldset>

</div>
