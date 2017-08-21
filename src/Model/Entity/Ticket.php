<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property int $sistema_id
 * @property int $sub_sistema_id
 * @property int $user_id
 * @property int $user_asignado_id
 * @property int $prioridad
 * @property int $tiempo_limite
 * @property string $tiempo_tipo
 * @property string $asunto
 * @property string $descripcion
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $active
 *
 * @property \App\Model\Entity\Sistema $sistema
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\UserAsignado $user_asignado
 * @property \App\Model\Entity\Gestione[] $gestiones
 * @property \App\Model\Entity\TicketArchive[] $ticket_archives
 */
class Ticket extends Entity
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
