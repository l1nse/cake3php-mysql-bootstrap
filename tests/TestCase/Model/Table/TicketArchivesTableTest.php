<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketArchivesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketArchivesTable Test Case
 */
class TicketArchivesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketArchivesTable
     */
    public $TicketArchives;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ticket_archives',
        'app.tickets',
        'app.sistemas',
        'app.users',
        'app.asignaciones',
        'app.tipo_productos',
        'app.subtipo_productos',
        'app.detalle_asignaciones',
        'app.ficha_personales',
        'app.empresas',
        'app.areas',
        'app.cargos',
        'app.jefe_areas',
        'app.tipo_movimientos',
        'app.nacionalidads',
        'app.comunas',
        'app.ciudads',
        'app.bancos',
        'app.afps',
        'app.isapres',
        'app.user_asignados',
        'app.archives',
        'app.gestione_archives'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TicketArchives') ? [] : ['className' => 'App\Model\Table\TicketArchivesTable'];
        $this->TicketArchives = TableRegistry::get('TicketArchives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TicketArchives);

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
