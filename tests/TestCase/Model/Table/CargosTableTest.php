<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CargosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CargosTable Test Case
 */
class CargosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CargosTable
     */
    public $Cargos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cargos',
        'app.areas',
        'app.empresas',
        'app.ficha_personales',
        'app.users',
        'app.asignaciones',
        'app.tipo_productos',
        'app.subtipo_productos',
        'app.detalle_asignaciones',
        'app.tickets',
        'app.sistemas',
        'app.user_asignados',
        'app.tipo_movimientos',
        'app.paises',
        'app.ciudades',
        'app.comunas',
        'app.tipo_cuentas',
        'app.bancos',
        'app.afps',
        'app.isapres',
        'app.jefe_areas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cargos') ? [] : ['className' => 'App\Model\Table\CargosTable'];
        $this->Cargos = TableRegistry::get('Cargos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cargos);

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
