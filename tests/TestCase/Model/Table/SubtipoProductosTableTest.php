<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubtipoProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubtipoProductosTable Test Case
 */
class SubtipoProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubtipoProductosTable
     */
    public $SubtipoProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subtipo_productos',
        'app.tipo_productos',
        'app.detalle_asignaciones',
        'app.asignaciones',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SubtipoProductos') ? [] : ['className' => 'App\Model\Table\SubtipoProductosTable'];
        $this->SubtipoProductos = TableRegistry::get('SubtipoProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubtipoProductos);

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
