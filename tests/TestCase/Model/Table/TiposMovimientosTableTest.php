<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposMovimientosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposMovimientosTable Test Case
 */
class TiposMovimientosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposMovimientosTable
     */
    public $TiposMovimientos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipos_movimientos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TiposMovimientos') ? [] : ['className' => 'App\Model\Table\TiposMovimientosTable'];
        $this->TiposMovimientos = TableRegistry::get('TiposMovimientos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TiposMovimientos);

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
