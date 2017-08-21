<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DetalleAsignacione Entity
 *
 * @property int $id
 * @property int $subtipo_producto_id
 * @property int $asignacione_id
 * @property string $name
 * @property float $cantidad
 * @property \Cake\I18n\Time $fecha_inicio
 * @property \Cake\I18n\Time $fecha_termino
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $active
 *
 * @property \App\Model\Entity\SubtipoProducto $subtipo_producto
 * @property \App\Model\Entity\Asignacione $asignacione
 */
class DetalleAsignacione extends Entity
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
