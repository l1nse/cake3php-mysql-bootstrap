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
                ['action' => 'delete', $fichaNegocio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fichaNegocio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendedores'), ['controller' => 'Vendedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendedore'), ['controller' => 'Vendedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Promotores'), ['controller' => 'Promotores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Promotore'), ['controller' => 'Promotores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contacto Clientes'), ['controller' => 'ContactoClientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contacto Cliente'), ['controller' => 'ContactoClientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ficha Negocio Servicios'), ['controller' => 'FichaNegocioServicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ficha Negocio Servicio'), ['controller' => 'FichaNegocioServicios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Utilidades'), ['controller' => 'Utilidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Utilidade'), ['controller' => 'Utilidades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fichaNegocios form large-9 medium-8 columns content">
    <?= $this->Form->create($fichaNegocio) ?>
    <fieldset>
        <legend><?= __('Edit Ficha Negocio') ?></legend>
        <?php
            echo $this->Form->control('folio_ficha');
            echo $this->Form->control('folio_factura');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('ficha_cotizacion_id');
            echo $this->Form->control('vendedore_id', ['options' => $vendedores, 'empty' => true]);
            echo $this->Form->control('promotore_id', ['options' => $promotores, 'empty' => true]);
            echo $this->Form->control('empresa_id', ['options' => $empresas, 'empty' => true]);
            echo $this->Form->control('negocio');
            echo $this->Form->control('fecha', ['empty' => true]);
            echo $this->Form->control('tipoCambio');
            echo $this->Form->control('free');
            echo $this->Form->control('cliente_id', ['options' => $clientes, 'empty' => true]);
            echo $this->Form->control('cliente_rut');
            echo $this->Form->control('cliente_direccion');
            echo $this->Form->control('tipo_de_venta_land');
            echo $this->Form->control('giro');
            echo $this->Form->control('contacto_cliente_id', ['options' => $contactoClientes, 'empty' => true]);
            echo $this->Form->control('nombre_contacto');
            echo $this->Form->control('fono_contacto');
            echo $this->Form->control('email_contacto');
            echo $this->Form->control('fecha_pago');
            echo $this->Form->control('forma_pago');
            echo $this->Form->control('forma_pago_soft');
            echo $this->Form->control('valor_bruto_tkt_clp');
            echo $this->Form->control('valor_bruto_tkt_usd');
            echo $this->Form->control('valor_tax_clp');
            echo $this->Form->control('valor_tax_usd');
            echo $this->Form->control('valor_neto_land_clp');
            echo $this->Form->control('valor_neto_land_usd');
            echo $this->Form->control('iva_19__land_clp');
            echo $this->Form->control('iva_19__land_usd');
            echo $this->Form->control('fee_emisiom_clp');
            echo $this->Form->control('fee_emisiom_usd');
            echo $this->Form->control('iva_fee_clp');
            echo $this->Form->control('iva_fee_usd');
            echo $this->Form->control('diferencia_tarifa_clp');
            echo $this->Form->control('diferencia_tarifa_usd');
            echo $this->Form->control('cargo_tarifa_clp');
            echo $this->Form->control('cargo_tarifa_usd');
            echo $this->Form->control('descuento_clp');
            echo $this->Form->control('descuento_usd');
            echo $this->Form->control('total_clp');
            echo $this->Form->control('total_usd');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
