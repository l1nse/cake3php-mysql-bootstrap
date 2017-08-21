<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoCuentasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoCuentasTable Test Case
 */
class TipoCuentasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoCuentasTable
     */
    public $TipoCuentas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_cuentas',
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
        'app.tipo_movimientos',
        'app.nacionalidads',
        'app.comunas',
        'app.ciudades',
        'app.paises',
        'app.ciudads',
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
        $config = TableRegistry::exists('TipoCuentas') ? [] : ['className' => 'App\Model\Table\TipoCuentasTable'];
        $this->TipoCuentas = TableRegistry::get('TipoCuentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoCuentas);

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
