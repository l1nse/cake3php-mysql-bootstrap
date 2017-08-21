<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoDocumentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoDocumentosTable Test Case
 */
class TipoDocumentosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoDocumentosTable
     */
    public $TipoDocumentos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tipo_documentos',
        'app.despachos',
        'app.tickets',
        'app.sistemas',
        'app.sub_sistemas',
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
        'app.ciudades',
        'app.comunas',
        'app.tipo_cuentas',
        'app.bancos',
        'app.afps',
        'app.isapres',
        'app.user_asignados',
        'app.gestiones',
        'app.gestione_archives',
        'app.archives',
        'app.ticket_archives',
        'app.entidades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TipoDocumentos') ? [] : ['className' => 'App\Model\Table\TipoDocumentosTable'];
        $this->TipoDocumentos = TableRegistry::get('TipoDocumentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TipoDocumentos);

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
