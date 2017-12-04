<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ficha Negocio'), ['action' => 'edit', $fichaNegocio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ficha Negocio'), ['action' => 'delete', $fichaNegocio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichaNegocio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ficha Negocios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficha Negocio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendedores'), ['controller' => 'Vendedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendedore'), ['controller' => 'Vendedores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Promotores'), ['controller' => 'Promotores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Promotore'), ['controller' => 'Promotores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contacto Clientes'), ['controller' => 'ContactoClientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contacto Cliente'), ['controller' => 'ContactoClientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ficha Negocio Servicios'), ['controller' => 'FichaNegocioServicios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ficha Negocio Servicio'), ['controller' => 'FichaNegocioServicios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicios'), ['controller' => 'Servicios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicio'), ['controller' => 'Servicios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Utilidades'), ['controller' => 'Utilidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Utilidade'), ['controller' => 'Utilidades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fichaNegocios view large-9 medium-8 columns content">
    <h3><?= h($fichaNegocio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $fichaNegocio->has('user') ? $this->Html->link($fichaNegocio->user->id, ['controller' => 'Users', 'action' => 'view', $fichaNegocio->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vendedore') ?></th>
            <td><?= $fichaNegocio->has('vendedore') ? $this->Html->link($fichaNegocio->vendedore->id, ['controller' => 'Vendedores', 'action' => 'view', $fichaNegocio->vendedore->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotore') ?></th>
            <td><?= $fichaNegocio->has('promotore') ? $this->Html->link($fichaNegocio->promotore->id, ['controller' => 'Promotores', 'action' => 'view', $fichaNegocio->promotore->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Empresa') ?></th>
            <td><?= $fichaNegocio->has('empresa') ? $this->Html->link($fichaNegocio->empresa->name, ['controller' => 'Empresas', 'action' => 'view', $fichaNegocio->empresa->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TipoCambio') ?></th>
            <td><?= h($fichaNegocio->tipoCambio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $fichaNegocio->has('cliente') ? $this->Html->link($fichaNegocio->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $fichaNegocio->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente Rut') ?></th>
            <td><?= h($fichaNegocio->cliente_rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente Direccion') ?></th>
            <td><?= h($fichaNegocio->cliente_direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo De Venta Land') ?></th>
            <td><?= h($fichaNegocio->tipo_de_venta_land) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Giro') ?></th>
            <td><?= h($fichaNegocio->giro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contacto Cliente') ?></th>
            <td><?= $fichaNegocio->has('contacto_cliente') ? $this->Html->link($fichaNegocio->contacto_cliente->name, ['controller' => 'ContactoClientes', 'action' => 'view', $fichaNegocio->contacto_cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Contacto') ?></th>
            <td><?= h($fichaNegocio->nombre_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Contacto') ?></th>
            <td><?= h($fichaNegocio->email_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Pago') ?></th>
            <td><?= h($fichaNegocio->fecha_pago) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forma Pago Soft') ?></th>
            <td><?= h($fichaNegocio->forma_pago_soft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fichaNegocio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Folio Ficha') ?></th>
            <td><?= $this->Number->format($fichaNegocio->folio_ficha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Folio Factura') ?></th>
            <td><?= $this->Number->format($fichaNegocio->folio_factura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ficha Cotizacion Id') ?></th>
            <td><?= $this->Number->format($fichaNegocio->ficha_cotizacion_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Negocio') ?></th>
            <td><?= $this->Number->format($fichaNegocio->negocio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fono Contacto') ?></th>
            <td><?= $this->Number->format($fichaNegocio->fono_contacto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forma Pago') ?></th>
            <td><?= $this->Number->format($fichaNegocio->forma_pago) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Bruto Tkt Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->valor_bruto_tkt_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Bruto Tkt Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->valor_bruto_tkt_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Tax Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->valor_tax_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Tax Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->valor_tax_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Neto Land Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->valor_neto_land_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Neto Land Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->valor_neto_land_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva 19  Land Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->iva_19__land_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva 19  Land Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->iva_19__land_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fee Emisiom Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->fee_emisiom_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fee Emisiom Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->fee_emisiom_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva Fee Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->iva_fee_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva Fee Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->iva_fee_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diferencia Tarifa Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->diferencia_tarifa_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Diferencia Tarifa Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->diferencia_tarifa_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo Tarifa Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->cargo_tarifa_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo Tarifa Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->cargo_tarifa_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descuento Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->descuento_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descuento Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->descuento_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Clp') ?></th>
            <td><?= $this->Number->format($fichaNegocio->total_clp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Usd') ?></th>
            <td><?= $this->Number->format($fichaNegocio->total_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($fichaNegocio->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($fichaNegocio->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fichaNegocio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fichaNegocio->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Free') ?></h4>
        <?= $this->Text->autoParagraph(h($fichaNegocio->free)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ficha Negocio Servicios') ?></h4>
        <?php if (!empty($fichaNegocio->ficha_negocio_servicios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ficha Negocio Id') ?></th>
                <th scope="col"><?= __('Servicio Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fichaNegocio->ficha_negocio_servicios as $fichaNegocioServicios): ?>
            <tr>
                <td><?= h($fichaNegocioServicios->id) ?></td>
                <td><?= h($fichaNegocioServicios->ficha_negocio_id) ?></td>
                <td><?= h($fichaNegocioServicios->servicio_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FichaNegocioServicios', 'action' => 'view', $fichaNegocioServicios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FichaNegocioServicios', 'action' => 'edit', $fichaNegocioServicios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FichaNegocioServicios', 'action' => 'delete', $fichaNegocioServicios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fichaNegocioServicios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Servicios') ?></h4>
        <?php if (!empty($fichaNegocio->servicios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ficha Negocio Id') ?></th>
                <th scope="col"><?= __('Entidade Id') ?></th>
                <th scope="col"><?= __('Tipo Servicio') ?></th>
                <th scope="col"><?= __('Condicion Pago') ?></th>
                <th scope="col"><?= __('Valor Neto') ?></th>
                <th scope="col"><?= __('Valor Neto Usd') ?></th>
                <th scope="col"><?= __('Tax') ?></th>
                <th scope="col"><?= __('Tax Usd') ?></th>
                <th scope="col"><?= __('Valor Neto Land') ?></th>
                <th scope="col"><?= __('Valor Neto Land Usd') ?></th>
                <th scope="col"><?= __('Iva Land Tipo') ?></th>
                <th scope="col"><?= __('Iva Land Pesos') ?></th>
                <th scope="col"><?= __('Iva Land Usd') ?></th>
                <th scope="col"><?= __('Comag Procentaje') ?></th>
                <th scope="col"><?= __('Comag Pesos') ?></th>
                <th scope="col"><?= __('Comag Usd') ?></th>
                <th scope="col"><?= __('Over Porcentaje') ?></th>
                <th scope="col"><?= __('Over Pesos') ?></th>
                <th scope="col"><?= __('Over Usd') ?></th>
                <th scope="col"><?= __('Amex Porcentaje') ?></th>
                <th scope="col"><?= __('Amex Pesos') ?></th>
                <th scope="col"><?= __('Amex Usd') ?></th>
                <th scope="col"><?= __('Neto Comag Pesos') ?></th>
                <th scope="col"><?= __('Neto Comag Usd') ?></th>
                <th scope="col"><?= __('Iva Porcentaje') ?></th>
                <th scope="col"><?= __('Iva Pesos') ?></th>
                <th scope="col"><?= __('Iva Usd') ?></th>
                <th scope="col"><?= __('Boleta Honorario Porcentaje') ?></th>
                <th scope="col"><?= __('Boleta Honorario Pesos') ?></th>
                <th scope="col"><?= __('Boleta Honorario Usd') ?></th>
                <th scope="col"><?= __('Total Pesos') ?></th>
                <th scope="col"><?= __('Total Usd') ?></th>
                <th scope="col"><?= __('Total Contabilidad Pesos') ?></th>
                <th scope="col"><?= __('Total Contabilidad Usd') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fichaNegocio->servicios as $servicios): ?>
            <tr>
                <td><?= h($servicios->id) ?></td>
                <td><?= h($servicios->ficha_negocio_id) ?></td>
                <td><?= h($servicios->entidade_id) ?></td>
                <td><?= h($servicios->tipo_servicio) ?></td>
                <td><?= h($servicios->condicion_pago) ?></td>
                <td><?= h($servicios->valor_neto) ?></td>
                <td><?= h($servicios->valor_neto_usd) ?></td>
                <td><?= h($servicios->tax) ?></td>
                <td><?= h($servicios->tax_usd) ?></td>
                <td><?= h($servicios->valor_neto_land) ?></td>
                <td><?= h($servicios->valor_neto_land_usd) ?></td>
                <td><?= h($servicios->iva_land_tipo) ?></td>
                <td><?= h($servicios->iva_land_pesos) ?></td>
                <td><?= h($servicios->iva_land_usd) ?></td>
                <td><?= h($servicios->comag_procentaje) ?></td>
                <td><?= h($servicios->comag_pesos) ?></td>
                <td><?= h($servicios->comag_usd) ?></td>
                <td><?= h($servicios->over_porcentaje) ?></td>
                <td><?= h($servicios->over_pesos) ?></td>
                <td><?= h($servicios->over_usd) ?></td>
                <td><?= h($servicios->amex_porcentaje) ?></td>
                <td><?= h($servicios->amex_pesos) ?></td>
                <td><?= h($servicios->amex_usd) ?></td>
                <td><?= h($servicios->neto_comag_pesos) ?></td>
                <td><?= h($servicios->neto_comag_usd) ?></td>
                <td><?= h($servicios->iva_porcentaje) ?></td>
                <td><?= h($servicios->iva_pesos) ?></td>
                <td><?= h($servicios->iva_usd) ?></td>
                <td><?= h($servicios->boleta_honorario_porcentaje) ?></td>
                <td><?= h($servicios->boleta_honorario_pesos) ?></td>
                <td><?= h($servicios->boleta_honorario_usd) ?></td>
                <td><?= h($servicios->total_pesos) ?></td>
                <td><?= h($servicios->total_usd) ?></td>
                <td><?= h($servicios->total_contabilidad_pesos) ?></td>
                <td><?= h($servicios->total_contabilidad_usd) ?></td>
                <td><?= h($servicios->modified) ?></td>
                <td><?= h($servicios->active) ?></td>
                <td><?= h($servicios->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicios', 'action' => 'view', $servicios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicios', 'action' => 'edit', $servicios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicios', 'action' => 'delete', $servicios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Utilidades') ?></h4>
        <?php if (!empty($fichaNegocio->utilidades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ficha Negocio Id') ?></th>
                <th scope="col"><?= __('Total Comag Clp') ?></th>
                <th scope="col"><?= __('Total Comag Usd') ?></th>
                <th scope="col"><?= __('Total Fee Clp') ?></th>
                <th scope="col"><?= __('Total Fee Usd') ?></th>
                <th scope="col"><?= __('Diferencia Cl') ?></th>
                <th scope="col"><?= __('Diferencia Usd') ?></th>
                <th scope="col"><?= __('Cobro Tc Clp') ?></th>
                <th scope="col"><?= __('Cobro Tc Usd') ?></th>
                <th scope="col"><?= __('Cargo Tc Clp') ?></th>
                <th scope="col"><?= __('Cargo Tc Usd') ?></th>
                <th scope="col"><?= __('Cargo Remesa Clp') ?></th>
                <th scope="col"><?= __('Cargo Remesa Usd') ?></th>
                <th scope="col"><?= __('Ult Final Clp') ?></th>
                <th scope="col"><?= __('Ult Final Usd') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fichaNegocio->utilidades as $utilidades): ?>
            <tr>
                <td><?= h($utilidades->id) ?></td>
                <td><?= h($utilidades->ficha_negocio_id) ?></td>
                <td><?= h($utilidades->total_comag_clp) ?></td>
                <td><?= h($utilidades->total_comag_usd) ?></td>
                <td><?= h($utilidades->total_fee_clp) ?></td>
                <td><?= h($utilidades->total_fee_usd) ?></td>
                <td><?= h($utilidades->diferencia_cl) ?></td>
                <td><?= h($utilidades->diferencia_usd) ?></td>
                <td><?= h($utilidades->cobro_tc_clp) ?></td>
                <td><?= h($utilidades->cobro_tc_usd) ?></td>
                <td><?= h($utilidades->cargo_tc_clp) ?></td>
                <td><?= h($utilidades->cargo_tc_usd) ?></td>
                <td><?= h($utilidades->cargo_remesa_clp) ?></td>
                <td><?= h($utilidades->cargo_remesa_usd) ?></td>
                <td><?= h($utilidades->ult_final_clp) ?></td>
                <td><?= h($utilidades->ult_final_usd) ?></td>
                <td><?= h($utilidades->active) ?></td>
                <td><?= h($utilidades->created) ?></td>
                <td><?= h($utilidades->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Utilidades', 'action' => 'view', $utilidades->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Utilidades', 'action' => 'edit', $utilidades->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Utilidades', 'action' => 'delete', $utilidades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utilidades->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
