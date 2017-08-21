<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AfpsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AfpsTable Test Case
 */
class AfpsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AfpsTable
     */
    public $Afps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.afps',
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
        $config = TableRegistry::exists('Afps') ? [] : ['className' => 'App\Model\Table\AfpsTable'];
        $this->Afps = TableRegistry::get('Afps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Afps);

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
