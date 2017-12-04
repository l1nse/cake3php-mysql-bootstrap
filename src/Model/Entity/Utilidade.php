<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Utilidade Entity
 *
 * @property int $id
 * @property int $ficha_negocio_id
 * @property float $total_comag_clp
 * @property float $total_comag_usd
 * @property float $total_fee_clp
 * @property float $total_fee_usd
 * @property float $diferencia_clp
 * @property float $diferencia_usd
 * @property float $cobro_tc_clp
 * @property float $cobro_tc_usd
 * @property string $descuento_clp
 * @property string $descuento_usd
 * @property float $cargo_tc_clp
 * @property float $cargo_tc_usd
 * @property float $cargo_remesa_clp
 * @property float $cargo_remesa_usd
 * @property float $utilidad_final_clp
 * @property float $utilidad_final_usd
 * @property int $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\FichaNegocio $ficha_negocio
 */
class Utilidade extends Entity
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
