<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JefeAreasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JefeAreasTable Test Case
 */
class JefeAreasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JefeAreasTable
     */
    public $JefeAreas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.jefe_areas',
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
        'app.cargos',
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
        $config = TableRegistry::exists('JefeAreas') ? [] : ['className' => 'App\Model\Table\JefeAreasTable'];
        $this->JefeAreas = TableRegistry::get('JefeAreas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JefeAreas);

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
