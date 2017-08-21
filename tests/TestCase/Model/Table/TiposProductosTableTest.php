<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TiposProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TiposProductosTable Test Case
 */
class TiposProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TiposProductosTable
     */
    public $TiposProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipos_productos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TiposProductos') ? [] : ['className' => 'App\Model\Table\TiposProductosTable'];
        $this->TiposProductos = TableRegistry::get('TiposProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TiposProductos);

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
