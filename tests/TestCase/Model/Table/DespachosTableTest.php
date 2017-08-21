<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DespachosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DespachosTable Test Case
 */
class DespachosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DespachosTable
     */
    public $Despachos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.despachos',
        'app.tickets',
        'app.sistemas',
        'app.sub_sistemas',
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
        'app.user_asignados',
        'app.gestiones',
        'app.gestione_archives',
        'app.archives',
        'app.ticket_archives',
        'app.entidades',
        'app.tipo_documentos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Despachos') ? [] : ['className' => 'App\Model\Table\DespachosTable'];
        $this->Despachos = TableRegistry::get('Despachos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Despachos);

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
