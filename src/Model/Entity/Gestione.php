<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gestione Entity
 *
 * @property int $id
 * @property string $comentarios
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $active
 * @property int $ticket_id
 *
 * @property \App\Model\Entity\Ticket $ticket
 * @property \App\Model\Entity\GestioneArchive[] $gestione_archives
 */
class Gestione extends Entity
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
