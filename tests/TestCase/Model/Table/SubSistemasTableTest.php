<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubSistemasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubSistemasTable Test Case
 */
class SubSistemasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubSistemasTable
     */
    public $SubSistemas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sub_sistemas',
        'app.sistemas',
        'app.tickets',
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
        'app.comunas',
        'app.tipo_cuentas',
        'app.bancos',
        'app.afps',
        'app.isapres',
        'app.despachos',
        'app.gestiones',
        'app.gestione_archives',
        'app.archives',
        'app.ticket_archives'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SubSistemas') ? [] : ['className' => 'App\Model\Table\SubSistemasTable'];
        $this->SubSistemas = TableRegistry::get('SubSistemas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubSistemas);

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
