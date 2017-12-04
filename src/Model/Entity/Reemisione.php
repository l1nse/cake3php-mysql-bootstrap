<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reemisione Entity
 *
 * @property int $id
 * @property string $AMD
 * @property string $A
 * @property string $K
 * @property string $M
 * @property string $N
 * @property string $O
 * @property string $Q
 * @property string $I
 * @property string $T_K
 * @property string $F
 * @property string $FP
 * @property string $FVLA
 * @property string $FM
 * @property string $TK
 * @property string $AI
 *
 * @property \App\Model\Entity\DetallesTiket[] $detalles_tikets
 * @property \App\Model\Entity\MensajesAerolinea[] $mensajes_aerolineas
 */
class Reemisione extends Entity
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
