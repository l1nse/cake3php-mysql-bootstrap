<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Paise'), ['action' => 'edit', $paise->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Paise'), ['action' => 'delete', $paise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paise->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Paises'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paise'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ciudades'), ['controller' => 'Ciudades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciudade'), ['controller' => 'Ciudades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ficha Personales'), ['controller' => 'FichaPersonales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficha Personale'), ['controller' => 'FichaPersonales', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paises view large-9 medium-8 columns content">
    <h3><?= h($paise->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($paise->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($paise->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($paise->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($paise->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ciudades') ?></h4>
        <?php if (!empty($paise->ciudades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Regione Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($paise->ciudades as $ciudades): ?>
            <tr>
                <td><?= h($ciudades->id) ?></td>
                <td><?= h($ciudades->regione_id) ?></td>
                <td><?= h($ciudades->name) ?></td>
                <td><?= h($ciudades->created) ?></td>
                <td><?= h($ciudades->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ciudades', 'action' => 'view', $ciudades->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ciudades', 'action' => 'edit', $ciudades->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ciudades', 'action' => 'delete', $ciudades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciudades->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ficha Personales') ?></h4>
        <?php if (!empty($paise->ficha_personales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('Tipo Movimiento Id') ?></th>
                <th scope="col"><?= __('Area Id') ?></th>
                <th scope="col"><?= __('Cargo Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Fecha Nacimiento') ?></th>
                <th scope="col"><?= __('Estado Civil') ?></th>
                <th scope="col"><?= __('Paise Id') ?></th>
                <th scope="col"><?= __('Ciudade Id') ?></th>
                <th scope="col"><?= __('Comuna Id') ?></th>
                <th scope="col"><?= __('Direccion') ?></th>
                <th scope="col"><?= __('Telefono') ?></th>
                <th scope="col"><?= __('Celular') ?></th>
                <th scope="col"><?= __('Nombre Emergencia') ?></th>
                <th scope="col"><?= __('Telefono Emergencia') ?></th>
                <th scope="col"><?= __('Numero Cuenta') ?></th>
                <th scope="col"><?= __('Tipo Cuenta Id') ?></th>
                <th scope="col"><?= __('Banco Id') ?></th>
                <th scope="col"><?= __('Afp Id') ?></th>
                <th scope="col"><?= __('Apv') ?></th>
                <th scope="col"><?= __('Ahorro Cta2') ?></th>
                <th scope="col"><?= __('Isapre Id') ?></th>
                <th scope="col"><?= __('Valor Isapre') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($paise->ficha_personales as $fichaPersonales): ?>
            <tr>
                <td><?= h($fichaPersonales->id) ?></td>
                <td><?= h($fichaPersonales->user_id) ?></td>
                <td><?= h($fichaPersonales->empresa_id) ?></td>
                <td><?= h($fichaPersonales->tipo_movimiento_id) ?></td>
                <td><?= h($fichaPersonales->area_id) ?></td>
                <td><?= h($fichaPersonales->cargo_id) ?></td>
                <td><?= h($fichaPersonales->name) ?></td>
                <td><?= h($fichaPersonales->email) ?></td>
                <td><?= h($fichaPersonales->fecha_nacimiento) ?></td>
                <td><?= h($fichaPersonales->estado_civil) ?></td>
                <td><?= h($fichaPersonales->paise_id) ?></td>
                <td><?= h($fichaPersonales->ciudade_id) ?></td>
                <td><?= h($fichaPersonales->comuna_id) ?></td>
                <td><?= h($fichaPersonales->direccion) ?></td>
                <td><?= h($fichaPersonales->telefono) ?></td>
                <td><?= h($fichaPersonales->celular) ?></td>
                <td><?= h($fichaPersonales->nombre_emergencia) ?></td>
                <td><?= h($fichaPersonales->telefono_emergencia) ?></td>
                <td><?= h($fichaPersonales->numero_cuenta) ?></td>
                <td><?= h($fichaPersonales->tipo_cuenta_id) ?></td>
                <td><?= h($fichaPersonales->banco_id) ?></td>
                <td><?= h($fichaPersonales->afp_id) ?></td>
                <td><?= h($fichaPersonales->apv) ?></td>
                <td><?= h($fichaPersonales->ahorro_cta2) ?></td>
                <td><?= h($fichaPersonales->isapre_id) ?></td>
                <td><?= h($fichaPersonales->valor_isapre) ?></td>
                <td><?= h($fichaPersonales->created) ?></td>
                <td><?= h($fichaPersonales->modified) ?></td>
                <td><?= h($fichaPersonales->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FichaPersonales', 'action' => 'view', $fichaPersonales->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FichaPersonales', 'action' => 'edit', $fichaPersonales->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FichaPersonales', 'action' => 'delete', $fichaPersonales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichaPersonales->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
