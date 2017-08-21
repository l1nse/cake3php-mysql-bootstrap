<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contacto Entity
 *
 * @property int $id
 * @property int $entidade_id
 * @property string $name
 * @property string $email
 * @property string $telefono
 * @property string $cargo
 * @property string $descripcion
 * @property string $nacionalidad
 * @property int $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Entidade $entidade
 */
class Contacto extends Entity
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
