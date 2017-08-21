<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entidade Entity
 *
 * @property int $id
 * @property string $name
 * @property string $giro
 * @property string $direccion
 * @property int $ciudade_id
 * @property int $comuna_id
 * @property int $paise_id
 * @property string $telefono
 * @property string $rut
 * @property string $rut_representante
 * @property string $name_representante
 * @property string $correo_representante
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $active
 * @property string $role
 *
 * @property \App\Model\Entity\Ciudade $ciudade
 * @property \App\Model\Entity\Comuna $comuna
 * @property \App\Model\Entity\Paise $paise
 * @property \App\Model\Entity\Despacho[] $despachos
 */
class Entidade extends Entity
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
