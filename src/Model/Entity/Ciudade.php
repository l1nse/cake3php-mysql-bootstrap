<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ciudade Entity
 *
 * @property int $id
 * @property int $regione_id
 * @property string $name
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Paise $paise
 * @property \App\Model\Entity\Comuna[] $comunas
 * @property \App\Model\Entity\FichaPersonale[] $ficha_personales
 */
class Ciudade extends Entity
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
