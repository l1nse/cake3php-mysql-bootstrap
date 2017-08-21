<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DespachosFixture
 *
 */
class DespachosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ticket_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'empresa_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'regione_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ciudade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'comuna_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'entidade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tipo_documento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'numero_documento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'direccion' => ['type' => 'string', 'length' => 500, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'horario' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha_solicitud' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Index_despacho' => ['type' => 'index', 'columns' => ['id'], 'length' => []],
            'FK_Reference_34' => ['type' => 'index', 'columns' => ['ticket_id'], 'length' => []],
            'FK_Reference_35' => ['type' => 'index', 'columns' => ['empresa_id'], 'length' => []],
            'FK_Reference_36' => ['type' => 'index', 'columns' => ['comuna_id'], 'length' => []],
            'FK_Reference_37' => ['type' => 'index', 'columns' => ['ciudade_id'], 'length' => []],
            'FK_Reference_38' => ['type' => 'index', 'columns' => ['tipo_documento_id'], 'length' => []],
            'FK_Reference_42' => ['type' => 'index', 'columns' => ['entidade_id'], 'length' => []],
            'FK_Reference_46' => ['type' => 'index', 'columns' => ['regione_id'], 'length' => []],
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
            'ticket_id' => 1,
            'empresa_id' => 1,
            'regione_id' => 1,
            'ciudade_id' => 1,
            'comuna_id' => 1,
            'entidade_id' => 1,
            'tipo_documento_id' => 1,
            'numero_documento' => 1,
            'direccion' => 'Lorem ipsum dolor sit amet',
            'horario' => 'Lorem ipsum dolor sit amet',
            'fecha_solicitud' => '2017-06-05 15:54:26',
            'created' => '2017-06-05 15:54:26',
            'modified' => '2017-06-05 15:54:26'
        ],
    ];
}
