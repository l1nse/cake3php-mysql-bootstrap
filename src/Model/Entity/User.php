<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $apellido1
 * @property string $password
 * @property string $name
 * @property string $roleees
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $active
 * @property int $estado
 * @property string $apellido2
 * @property int $role_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Asignacione[] $asignaciones
 * @property \App\Model\Entity\Bsp[] $bsps
 * @property \App\Model\Entity\CalendariosAsistente[] $calendarios_asistentes
 * @property \App\Model\Entity\Cotizacione[] $cotizaciones
 * @property \App\Model\Entity\FichaPersonale[] $ficha_personales
 * @property \App\Model\Entity\Ticket[] $tickets
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
