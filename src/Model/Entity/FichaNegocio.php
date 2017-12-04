<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FichaNegocio Entity
 *
 * @property int $id
 * @property int $folio_ficha
 * @property int $folio_factura
 * @property int $user_id
 * @property int $ficha_cotizacione_id
 * @property string $vendedore_id
 * @property string $promotore_id
 * @property string $empresa_id
 * @property \Cake\I18n\Time $fecha
 * @property string $tipoCambio
 * @property string $free
 * @property string $cliente_id
 * @property string $cliente_rut
 * @property string $cliente_direccion
 * @property string $tipo_de_venta_land
 * @property string $giro
 * @property string $contacto_cliente_id
 * @property string $nombre_contacto
 * @property int $fono_contacto
 * @property string $email_contacto
 * @property \Cake\I18n\Time $fecha_pago
 * @property int $forma_pago
 * @property string $forma_pago_soft
 * @property float $valor_bruto_tkt_clp
 * @property float $valor_bruto_tkt_usd
 * @property float $valor_tax_clp
 * @property float $valor_tax_usd
 * @property float $valor_neto_land_clp
 * @property float $valor_neto_land_usd
 * @property float $iva_19__land_clp
 * @property float $iva_19__land_usd
 * @property float $fee_emisiom_clp
 * @property float $fee_emisiom_usd
 * @property float $iva_fee_clp
 * @property float $iva_fee_usd
 * @property float $diferencia_tarifa_clp
 * @property float $diferencia_tarifa_usd
 * @property float $cargo_tarifa_clp
 * @property float $cargo_tarifa_usd
 * @property float $descuento_clp
 * @property float $descuento_usd
 * @property float $total_clp
 * @property float $total_usd
 * @property int $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property float $utilidad_bruto_clp
 * @property float $utilidad_bruto_usd
 * @property string $estado_ficha_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\FichaCotizacione $ficha_cotizacione
 * @property \App\Model\Entity\Vendedore $vendedore
 * @property \App\Model\Entity\Promotore $promotore
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\ContactoCliente $contacto_cliente
 * @property \App\Model\Entity\FichaNegocioServicio[] $ficha_negocio_servicios
 * @property \App\Model\Entity\Servicio[] $servicios
 * @property \App\Model\Entity\Utilidade[] $utilidades
 */
class FichaNegocio extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
