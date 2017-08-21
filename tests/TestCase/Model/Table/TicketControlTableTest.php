<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketControlTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketControlTable Test Case
 */
class TicketControlTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketControlTable
     */
    public $TicketControl;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ticket_control'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TicketControl') ? [] : ['className' => 'App\Model\Table\TicketControlTable'];
        $this->TicketControl = TableRegistry::get('TicketControl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TicketControl);

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
