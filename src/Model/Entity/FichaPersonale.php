<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FichaPersonale Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $empresa_id
 * @property int $tipo_movimiento_id
 * @property int $area_id
 * @property int $cargo_id
 * @property string $name
 * @property string $email
 * @property \Cake\I18n\Time $fecha_nacimiento
 * @property int $estado_civil
 * @property int $paise_id
 * @property int $ciudade_id
 * @property int $comuna_id
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $nombre_emergencia
 * @property string $telefono_emergencia
 * @property string $numero_cuenta
 * @property int $tipo_cuenta_id
 * @property int $banco_id
 * @property int $afp_id
 * @property float $apv
 * @property float $ahorro_cta2
 * @property int $isapre_id
 * @property float $valor_isapre
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $active
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\TipoMovimiento $tipo_movimiento
 * @property \App\Model\Entity\Area $area
 * @property \App\Model\Entity\Cargo $cargo
 * @property \App\Model\Entity\Paise $paise
 * @property \App\Model\Entity\Ciudade $ciudade
 * @property \App\Model\Entity\Comuna $comuna
 * @property \App\Model\Entity\TipoCuenta $tipo_cuenta
 * @property \App\Model\Entity\Banco $banco
 * @property \App\Model\Entity\Afp $afp
 * @property \App\Model\Entity\Isapre $isapre
 * @property \App\Model\Entity\JefeArea[] $jefe_areas
 */
class FichaPersonale extends Entity
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
