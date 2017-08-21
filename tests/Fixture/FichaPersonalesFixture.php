<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FichaPersonalesFixture
 *
 */
class FichaPersonalesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'empresa_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo_movimiento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'area_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'cargo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha_nacimiento' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'estado_civil' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'paise_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ciudade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'comuna_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'direccion' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'telefono' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'celular' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nombre_emergencia' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'telefono_emergencia' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'numero_cuenta' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tipo_cuenta_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'banco_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'afp_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'apv' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'ahorro_cta2' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'isapre_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'valor_isapre' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'active' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'Index_ficha_personal' => ['type' => 'index', 'columns' => ['id'], 'length' => []],
            'FK_Reference_1' => ['type' => 'index', 'columns' => ['tipo_movimiento_id'], 'length' => []],
            'FK_Reference_10' => ['type' => 'index', 'columns' => ['area_id'], 'length' => []],
            'FK_Reference_12' => ['type' => 'index', 'columns' => ['cargo_id'], 'length' => []],
            'FK_Reference_19' => ['type' => 'index', 'columns' => ['paise_id'], 'length' => []],
            'FK_Reference_2' => ['type' => 'index', 'columns' => ['empresa_id'], 'length' => []],
            'FK_Reference_20' => ['type' => 'index', 'columns' => ['comuna_id'], 'length' => []],
            'FK_Reference_21' => ['type' => 'index', 'columns' => ['ciudade_id'], 'length' => []],
            'FK_Reference_22' => ['type' => 'index', 'columns' => ['tipo_cuenta_id'], 'length' => []],
            'FK_Reference_23' => ['type' => 'index', 'columns' => ['banco_id'], 'length' => []],
            'FK_Reference_24' => ['type' => 'index', 'columns' => ['afp_id'], 'length' => []],
            'FK_Reference_25' => ['type' => 'index', 'columns' => ['isapre_id'], 'length' => []],
            'FK_Reference_3' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'user_id' => 1,
            'empresa_id' => 1,
            'tipo_movimiento_id' => 1,
            'area_id' => 1,
            'cargo_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'fecha_nacimiento' => '2017-06-05',
            'estado_civil' => 1,
            'paise_id' => 1,
            'ciudade_id' => 1,
            'comuna_id' => 1,
            'direccion' => 'Lorem ipsum dolor sit amet',
            'telefono' => 'Lorem ipsum dolor ',
            'celular' => 'Lorem ipsum dolor ',
            'nombre_emergencia' => 'Lorem ipsum dolor sit amet',
            'telefono_emergencia' => 'Lorem ipsum dolor ',
            'numero_cuenta' => 'Lorem ipsum dolor sit amet',
            'tipo_cuenta_id' => 1,
            'banco_id' => 1,
            'afp_id' => 1,
            'apv' => 1,
            'ahorro_cta2' => 1,
            'isapre_id' => 1,
            'valor_isapre' => 1,
            'created' => '2017-06-05 15:54:18',
            'modified' => '2017-06-05 15:54:18',
            'active' => 1
        ],
    ];
}
