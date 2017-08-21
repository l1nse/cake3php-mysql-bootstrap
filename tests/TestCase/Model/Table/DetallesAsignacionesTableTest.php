<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallesAsignacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallesAsignacionesTable Test Case
 */
class DetallesAsignacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallesAsignacionesTable
     */
    public $DetallesAsignaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detalles_asignaciones',
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
        $config = TableRegistry::exists('DetallesAsignaciones') ? [] : ['className' => 'App\Model\Table\DetallesAsignacionesTable'];
        $this->DetallesAsignaciones = TableRegistry::get('DetallesAsignaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetallesAsignaciones);

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
