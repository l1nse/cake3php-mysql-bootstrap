<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permiso Entity
 *
 * @property int $id
 * @property string $name
 * @property string $controlador
 * @property string $action
 * @property int $parametro
 * @property string $descripcion
 * @property int $nivel
 * @property int $padre
 * @property int $position
 * @property int $menu
 * @property int $role_id
 * @property string $created
 * @property string $modified
 * @property string $active
 * @property string $icono
 *
 * @property \App\Model\Entity\Role[] $roles
 */
class Permiso extends Entity
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
