<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalendariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalendariosTable Test Case
 */
class CalendariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CalendariosTable
     */
    public $Calendarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calendarios',
        'app.calendarios_asistentes',
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
        'app.paises',
        'app.entidades',
        'app.ciudades',
        'app.regiones',
        'app.despachos',
        'app.tickets',
        'app.sistemas',
        'app.sub_sistemas',
        'app.user_asignados',
        'app.gestiones',
        'app.gestione_archives',
        'app.archives',
        'app.ticket_archives',
        'app.comunas',
        'app.tipo_documentos',
        'app.tipo_cuentas',
        'app.bancos',
        'app.afps',
        'app.isapres',
        'app.roles',
        'app.permisos',
        'app.roles_permisos',
        'app.contactos',
        'app.calendarios_contactos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Calendarios') ? [] : ['className' => 'App\Model\Table\CalendariosTable'];
        $this->Calendarios = TableRegistry::get('Calendarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Calendarios);

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
