<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Despacho Entity
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $empresa_id
 * @property int $regione_id
 * @property int $ciudade_id
 * @property int $comuna_id
 * @property int $entidade_id
 * @property int $tipo_documento_id
 * @property int $numero_documento
 * @property string $direccion
 * @property string $horario
 * @property \Cake\I18n\Time $fecha_solicitud
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Ticket $ticket
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Ciudade $ciudade
 * @property \App\Model\Entity\Comuna $comuna
 * @property \App\Model\Entity\Entidade $entidade
 * @property \App\Model\Entity\TipoDocumento $tipo_documento
 */
class Despacho extends Entity
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
