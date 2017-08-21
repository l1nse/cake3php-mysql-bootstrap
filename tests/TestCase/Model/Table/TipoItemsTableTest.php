<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoItemsTable Test Case
 */
class TipoItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoItemsTable
     */
    public $TipoItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_items',
        'app.item_cotizaciones',
        'app.cotizaciones',
        'app.entidades',
        'app.ciudades',
        'app.regiones',
        'app.paises',
        'app.ficha_personales',
        'app.users',
        'app.asignaciones',
        'app.tipo_productos',
        'app.subtipo_productos',
        'app.detalle_asignaciones',
        'app.tickets',
        'app.sistemas',
        'app.sub_sistemas',
        'app.user_asignados',
        'app.despachos',
        'app.empresas',
        'app.areas',
        'app.cargos',
        'app.jefe_areas',
        'app.comunas',
        'app.tipo_documentos',
        'app.gestiones',
        'app.gestione_archives',
        'app.archives',
        'app.ticket_archives',
        'app.tipo_movimientos',
        'app.tipo_cuentas',
        'app.bancos',
        'app.afps',
        'app.isapres',
        'app.canal_ventas',
        'app.tipo_cambios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TipoItems') ? [] : ['className' => 'App\Model\Table\TipoItemsTable'];
        $this->TipoItems = TableRegistry::get('TipoItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoItems);

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
