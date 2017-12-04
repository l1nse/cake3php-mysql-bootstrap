<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CalendariosContacto Entity
 *
 * @property int $id
 * @property int $contacto_id
 * @property int $calendario_id
 *
 * @property \App\Model\Entity\Contacto $contacto
 * @property \App\Model\Entity\Reunion $reunion
 */
class CalendariosContacto extends Entity
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
