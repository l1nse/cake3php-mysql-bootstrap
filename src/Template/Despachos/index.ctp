<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Despacho'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ciudades'), ['controller' => 'Ciudades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciudade'), ['controller' => 'Ciudades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Comunas'), ['controller' => 'Comunas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Comuna'), ['controller' => 'Comunas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Entidades'), ['controller' => 'Entidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Entidade'), ['controller' => 'Entidades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Documentos'), ['controller' => 'TipoDocumentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Documento'), ['controller' => 'TipoDocumentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="despachos index large-9 medium-8 columns content">
    <h3><?= __('Despachos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ciudade_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comuna_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entidade_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_documento_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero_documento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('horario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_solicitud') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($despachos as $despacho): ?>
            <tr>
                <td><?= $this->Number->format($despacho->id) ?></td>
                <td><?= $despacho->has('ticket') ? $this->Html->link($despacho->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $despacho->ticket->id]) : '' ?></td>
                <td><?= $despacho->has('empresa') ? $this->Html->link($despacho->empresa->name, ['controller' => 'Empresas', 'action' => 'view', $despacho->empresa->id]) : '' ?></td>
                <td><?= $despacho->has('ciudade') ? $this->Html->link($despacho->ciudade->name, ['controller' => 'Ciudades', 'action' => 'view', $despacho->ciudade->id]) : '' ?></td>
                <td><?= $despacho->has('comuna') ? $this->Html->link($despacho->comuna->name, ['controller' => 'Comunas', 'action' => 'view', $despacho->comuna->id]) : '' ?></td>
                <td><?= $despacho->has('entidade') ? $this->Html->link($despacho->entidade->name, ['controller' => 'Entidades', 'action' => 'view', $despacho->entidade->id]) : '' ?></td>
                <td><?= $despacho->has('tipo_documento') ? $this->Html->link($despacho->tipo_documento->name, ['controller' => 'TipoDocumentos', 'action' => 'view', $despacho->tipo_documento->id]) : '' ?></td>
                <td><?= $this->Number->format($despacho->numero_documento) ?></td>
                <td><?= h($despacho->direccion) ?></td>
                <td><?= h($despacho->horario) ?></td>
                <td><?= h($despacho->fecha_solicitud) ?></td>
                <td><?= h($despacho->created) ?></td>
                <td><?= h($despacho->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $despacho->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $despacho->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $despacho->id], ['confirm' => __('Are you sure you want to delete # {0}?', $despacho->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
