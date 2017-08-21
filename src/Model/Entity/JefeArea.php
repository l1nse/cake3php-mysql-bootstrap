<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JefeArea Entity
 *
 * @property int $id
 * @property int $area_id
 * @property int $ficha_personale_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $active
 *
 * @property \App\Model\Entity\Area $area
 * @property \App\Model\Entity\FichaPersonale $ficha_personale
 */
class JefeArea extends Entity
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
