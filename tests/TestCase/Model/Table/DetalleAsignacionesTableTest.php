<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetalleAsignacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetalleAsignacionesTable Test Case
 */
class DetalleAsignacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetalleAsignacionesTable
     */
    public $DetalleAsignaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalle_asignaciones',
        'app.subtipo_productos',
        'app.asignaciones',
        'app.users',
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
        $config = TableRegistry::exists('DetalleAsignaciones') ? [] : ['className' => 'App\Model\Table\DetalleAsignacionesTable'];
        $this->DetalleAsignaciones = TableRegistry::get('DetalleAsignaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetalleAsignaciones);

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
