<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FichasPersonalesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FichasPersonalesTable Test Case
 */
class FichasPersonalesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FichasPersonalesTable
     */
    public $FichasPersonales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fichas_personales',
        'app.users',
        'app.empresas',
        'app.areas',
        'app.cargos',
        'app.jefes_areas',
        'app.tipo_movimientos',
        'app.nacionalidads',
        'app.comunas',
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
        $config = TableRegistry::exists('FichasPersonales') ? [] : ['className' => 'App\Model\Table\FichasPersonalesTable'];
        $this->FichasPersonales = TableRegistry::get('FichasPersonales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FichasPersonales);

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
