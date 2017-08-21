<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GestionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GestionesTable Test Case
 */
class GestionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GestionesTable
     */
    public $Gestiones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gestiones',
        'app.tickets',
        'app.sistemas',
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
        'app.nacionalidads',
        'app.comunas',
        'app.ciudads',
        'app.bancos',
        'app.afps',
        'app.isapres',
        'app.user_asignados',
        'app.gestione_archives'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Gestiones') ? [] : ['className' => 'App\Model\Table\GestionesTable'];
        $this->Gestiones = TableRegistry::get('Gestiones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gestiones);

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
