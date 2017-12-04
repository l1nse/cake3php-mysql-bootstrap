<?php
/**
  * @var \App\View\AppView $this
  */
?>
    
<div class="servicios view large-9 medium-8 columns content">

    <h3><?php echo $servicio[0]->proveedore['name']   ?></h3>    
    <table class="table table-striped table-bordered">
        <tr>
            <th scope="row"><?= __('Ficha de negocio id') ?></th>
            <td><?= h($servicio[0]->ficha_negocio_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID proveedor') ?></th>
            <td><?= h($servicio[0]->proveedore_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Servicio') ?></th>
             <?php
                $tipo_servicio2  = 0;                            
                if($servicio[0]->tipo_servicio == '1')
                {
                    $tipo_servicio2 = "Aereo";
                }
                if($servicio[0]->tipo_servicio == '2')
                {
                    $tipo_servicio2 = "Terrestre";
                }
                if($servicio[0]->tipo_servicio == '3')
                {
                    $tipo_servicio2 = "Otro";
                }
             ?>
            <td><?= h($tipo_servicio2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Condicion Pago') ?></th>
            <td><?= h($servicio[0]->condicion_pago) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva Land Tipo') ?></th>
            <td><?= h($servicio[0]->iva_land_tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva Land Pesos') ?></th>
            <td><?= h($servicio[0]->iva_land_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva Land Usd') ?></th>
            <td><?= h($servicio[0]->iva_land_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicio[0]->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Neto') ?></th>
            <td><?= $this->Number->format($servicio[0]->valor_neto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Neto Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->valor_neto_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax') ?></th>
            <td><?= $this->Number->format($servicio[0]->tax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->tax_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Neto Land') ?></th>
            <td><?= $this->Number->format($servicio[0]->valor_neto_land) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Neto Land Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->valor_neto_land_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comag Procentaje') ?></th>
            <td><?= $this->Number->format($servicio[0]->comag_procentaje) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comag Pesos') ?></th>
            <td><?= $this->Number->format($servicio[0]->comag_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comag Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->comag_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Over Porcentaje') ?></th>
            <td><?= $this->Number->format($servicio[0]->over_porcentaje) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Over Pesos') ?></th>
            <td><?= $this->Number->format($servicio[0]->over_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Over Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->over_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amex Porcentaje') ?></th>
            <td><?= $this->Number->format($servicio[0]->amex_porcentaje) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amex Pesos') ?></th>
            <td><?= $this->Number->format($servicio[0]->amex_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amex Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->amex_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Neto Comag Pesos') ?></th>
            <td><?= $this->Number->format($servicio[0]->neto_comag_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Neto Comag Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->neto_comag_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva Porcentaje') ?></th>
            <td><?= $this->Number->format($servicio[0]->iva_porcentaje) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva Pesos') ?></th>
            <td><?= $this->Number->format($servicio[0]->iva_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Iva Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->iva_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Boleta Honorario Porcentaje') ?></th>
            <td><?= $this->Number->format($servicio[0]->boleta_honorario_porcentaje) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Boleta Honorario Pesos') ?></th>
            <td><?= $this->Number->format($servicio[0]->boleta_honorario_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Boleta Honorario Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->boleta_honorario_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Pesos') ?></th>
            <td><?= $this->Number->format($servicio[0]->total_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->total_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Contabilidad Pesos') ?></th>
            <td><?= $this->Number->format($servicio[0]->total_contabilidad_pesos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Contabilidad Usd') ?></th>
            <td><?= $this->Number->format($servicio[0]->total_contabilidad_usd) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($servicio[0]->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($servicio[0]->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($servicio[0]->created) ?></td>
        </tr>
    </table>
    
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo APP_URI; ?>fichaNegocios/add/<?php echo $servicio[0]->ficha_negocio->id ?>"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
        
    </div>
</div>
