<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BspsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BspsTable Test Case
 */
class BspsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BspsTable
     */
    public $Bsps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bsps',
        'app.users',
        'app.asignaciones',
        'app.tipo_productos',
        'app.subtipo_productos',
        'app.detalle_asignaciones',
        'app.ficha_personales',
        'app.empresas',
        'app.areas',
        'app.cargos',
        'app.jefe_areas',
        'app.tipo_movimientos',
        'app.paises',
        'app.ciudades',
        'app.regiones',
        'app.despachos',
        'app.tickets',
        'app.sistemas',
        'app.sub_sistemas',
        'app.user_asignados',
        'app.gestiones',
        'app.gestione_archives',
        'app.archives',
        'app.ticket_archives',
        'app.comunas',
        'app.entidades',
        'app.tipo_documentos',
        'app.tipo_cuentas',
        'app.bancos',
        'app.afps',
        'app.isapres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bsps') ? [] : ['className' => 'App\Model\Table\BspsTable'];
        $this->Bsps = TableRegistry::get('Bsps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bsps);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
