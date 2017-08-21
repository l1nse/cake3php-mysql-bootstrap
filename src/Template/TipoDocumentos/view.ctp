<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Documento'), ['action' => 'edit', $tipoDocumento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Documento'), ['action' => 'delete', $tipoDocumento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoDocumento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Documentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Documento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Despachos'), ['controller' => 'Despachos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Despacho'), ['controller' => 'Despachos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoDocumentos view large-9 medium-8 columns content">
    <h3><?= h($tipoDocumento->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tipoDocumento->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoDocumento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($tipoDocumento->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tipoDocumento->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tipoDocumento->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Despachos') ?></h4>
        <?php if (!empty($tipoDocumento->despachos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ticket Id') ?></th>
                <th scope="col"><?= __('Empresa Id') ?></th>
                <th scope="col"><?= __('Ciudade Id') ?></th>
                <th scope="col"><?= __('Comuna Id') ?></th>
                <th scope="col"><?= __('Entidade Id') ?></th>
                <th scope="col"><?= __('Tipo Documento Id') ?></th>
                <th scope="col"><?= __('Numero Documento') ?></th>
                <th scope="col"><?= __('Direccion') ?></th>
                <th scope="col"><?= __('Horario') ?></th>
                <th scope="col"><?= __('Fecha Solicitud') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipoDocumento->despachos as $despachos): ?>
            <tr>
                <td><?= h($despachos->id) ?></td>
                <td><?= h($despachos->ticket_id) ?></td>
                <td><?= h($despachos->empresa_id) ?></td>
                <td><?= h($despachos->ciudade_id) ?></td>
                <td><?= h($despachos->comuna_id) ?></td>
                <td><?= h($despachos->entidade_id) ?></td>
                <td><?= h($despachos->tipo_documento_id) ?></td>
                <td><?= h($despachos->numero_documento) ?></td>
                <td><?= h($despachos->direccion) ?></td>
                <td><?= h($despachos->horario) ?></td>
                <td><?= h($despachos->fecha_solicitud) ?></td>
                <td><?= h($despachos->created) ?></td>
                <td><?= h($despachos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Despachos', 'action' => 'view', $despachos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Despachos', 'action' => 'edit', $despachos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Despachos', 'action' => 'delete', $despachos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $despachos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
