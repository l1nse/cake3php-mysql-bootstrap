<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cotizacione Entity
 *
 * @property int $id
 * @property int $cotizacione_id
 * @property int $entidade_id
 * @property int $canal_venta_id
 * @property int $version
 * @property float $total
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $user_id
 * @property int $active
 *
 * @property \App\Model\Entity\Cotizacione $cotizacione
 * @property \App\Model\Entity\Entidade $entidade
 * @property \App\Model\Entity\CanalVenta $canal_venta
 * @property \App\Model\Entity\User $user
 */
class Cotizacione extends Entity
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
        'cotizacione_id' => false
    ];
}
