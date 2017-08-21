<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ContactosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ContactosController Test Case
 */
class ContactosControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contactos',
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
        'app.isapres'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
