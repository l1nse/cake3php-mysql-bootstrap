<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EntidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntidadesTable Test Case
 */
class EntidadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EntidadesTable
     */
    public $Entidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entidades',
        'app.ciudades',
        'app.regiones',
        'app.paises',
        'app.ficha_personales',
        'app.users',
        'app.asignaciones',
        'app.tipo_productos',
        'app.subtipo_productos',
        'app.detalle_asignaciones',
        'app.tickets',
        'app.sistemas',
        'app.sub_sistemas',
        'app.user_asignados',
        'app.despachos',
        'app.empresas',
        'app.areas',
        'app.cargos',
        'app.jefe_areas',
        'app.comunas',
        'app.tipo_documentos',
        'app.gestiones',
        'app.gestione_archives',
        'app.archives',
        'app.ticket_archives',
        'app.tipo_movimientos',
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
        $config = TableRegistry::exists('Entidades') ? [] : ['className' => 'App\Model\Table\EntidadesTable'];
        $this->Entidades = TableRegistry::get('Entidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Entidades);

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
