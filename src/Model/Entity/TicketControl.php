<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TicketControl Entity
 *
 * @property int $id
 * @property string $placa
 * @property string $linea_aerea
 * @property string $ticket
 * @property string $moneda
 * @property string $emision_tkt
 * @property string $ficha
 * @property string $factura
 * @property string $empresa
 * @property string $apellido
 * @property string $nombre
 * @property string $ruta
 * @property string $pais
 * @property string $continente
 * @property string $itinerario
 * @property string $vendedor
 * @property string $observaciones_1
 * @property string $tkt_usd_1
 * @property string $tkt_clp_1
 * @property string $tax_usd_1
 * @property string $tax_clp_1
 * @property string $tkt_usd_2
 * @property string $tkt_clp_2
 * @property string $tax_usd_2
 * @property string $tax_clp_2
 * @property string $normal
 * @property string $over
 * @property string $dolares_1
 * @property string $pesos_1
 * @property string $dolares_2
 * @property string $pesos_2
 * @property string $dolares_3
 * @property string $pesos_3
 * @property string $observaciones_2
 * @property string $total_usd
 * @property string $total_clp
 * @property string $utilidad_usd
 * @property string $utilidad_clp
 * @property string $com_usd
 * @property string $com_clp
 * @property string $over_usd
 * @property string $over_clp
 */
class TicketControl extends Entity
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
