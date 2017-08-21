<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoProductosTable Test Case
 */
class TipoProductosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoProductosTable
     */
    public $TipoProductos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_productos',
        'app.asignaciones',
        'app.users',
        'app.detalle_asignaciones',
        'app.subtipo_productos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TipoProductos') ? [] : ['className' => 'App\Model\Table\TipoProductosTable'];
        $this->TipoProductos = TableRegistry::get('TipoProductos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoProductos);

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
