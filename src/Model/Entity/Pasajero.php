<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pasajero Entity
 *
 * @property int $id
 * @property int $folio_ficha
 * @property int $numero_ticket
 * @property string $nombre1
 * @property string $nombre2
 * @property string $apellidop
 * @property string $apellidom
 * @property string $rut
 * @property string $nacionalidad
 * @property string $origen
 * @property string $destino
 * @property string $aerolinea
 * @property string $cod_pasasje
 * @property string $aeropuerto_origen
 * @property string $aeropuerto_destino
 * @property \Cake\I18n\Time $fecha_hora_salida
 * @property \Cake\I18n\Time $fecha_hora_llegada
 * @property int $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Cotizacione $cotizacione
 */
class Pasajero extends Entity
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
