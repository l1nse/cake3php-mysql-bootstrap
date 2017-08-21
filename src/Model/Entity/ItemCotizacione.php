<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemCotizacione Entity
 *
 * @property int $id
 * @property int $cotizacione_id
 * @property int $tipo_item_id
 * @property int $tipo_cambio_id
 * @property string $descripcion
 * @property float $valor
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $active
 *
 * @property \App\Model\Entity\Cotizacione $cotizacione
 * @property \App\Model\Entity\TipoItem $tipo_item
 * @property \App\Model\Entity\TipoCambio $tipo_cambio
 */
class ItemCotizacione extends Entity
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
