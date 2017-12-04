<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Servicio Entity
 *
 * @property int $id
 * @property int $ficha_negocio_id
 * @property string $proveedore_id
 * @property string $tipo_servicio
 * @property string $condicion_pago
 * @property float $valor_neto
 * @property float $valor_neto_usd
 * @property float $tax
 * @property float $tax_usd
 * @property float $valor_neto_land
 * @property float $valor_neto_land_usd
 * @property string $iva_land_tipo
 * @property string $iva_land_pesos
 * @property string $iva_land_usd
 * @property float $comag_procentaje
 * @property float $comag_pesos
 * @property float $comag_usd
 * @property float $over_porcentaje
 * @property float $over_pesos
 * @property float $over_usd
 * @property float $amex_porcentaje
 * @property float $amex_pesos
 * @property float $amex_usd
 * @property float $neto_comag_pesos
 * @property float $neto_comag_usd
 * @property float $comag_iva_porcentaje
 * @property float $comag_iva_pesos
 * @property float $comag_iva_usd
 * @property float $boleta_honorario_porcentaje
 * @property float $boleta_honorario_pesos
 * @property float $boleta_honorario_usd
 * @property float $total_pesos
 * @property float $total_usd
 * @property float $total_contabilidad_pesos
 * @property float $total_contabilidad_usd
 * @property \Cake\I18n\Time $modified
 * @property int $active
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\FichaNegocio $ficha_negocio
 * @property \App\Model\Entity\Proveedore $proveedore
 * @property \App\Model\Entity\FichaNegocioServicio[] $ficha_negocio_servicios
 */
class Servicio extends Entity
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
