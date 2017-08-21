<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubtiposProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubtiposProductosTable Test Case
 */
class SubtiposProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubtiposProductosTable
     */
    public $SubtiposProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subtipos_productos',
        'app.tipo_productos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SubtiposProductos') ? [] : ['className' => 'App\Model\Table\SubtiposProductosTable'];
        $this->SubtiposProductos = TableRegistry::get('SubtiposProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubtiposProductos);

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
