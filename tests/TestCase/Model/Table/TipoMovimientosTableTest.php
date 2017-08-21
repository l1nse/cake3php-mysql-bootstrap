<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoMovimientosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoMovimientosTable Test Case
 */
class TipoMovimientosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoMovimientosTable
     */
    public $TipoMovimientos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_movimientos',
        'app.ficha_personales',
        'app.users',
        'app.asignaciones',
        'app.tipo_productos',
        'app.subtipo_productos',
        'app.detalle_asignaciones',
        'app.tickets',
        'app.sistemas',
        'app.user_asignados',
        'app.empresas',
        'app.areas',
        'app.cargos',
        'app.jefe_areas',
        'app.paises',
        'app.ciudades',
        'app.comunas',
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
        $config = TableRegistry::exists('TipoMovimientos') ? [] : ['className' => 'App\Model\Table\TipoMovimientosTable'];
        $this->TipoMovimientos = TableRegistry::get('TipoMovimientos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoMovimientos);

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
}
