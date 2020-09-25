<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EntreprisesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EntreprisesController Test Case
 */
class EntreprisesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entreprises',
        'app.destinataires',
        'app.correspondances_sortantes',
        'app.expediteurs',
        'app.fournisseurs',
        'app.gerants',
        'app.locataires',
        'app.maitres_oeuvres',
        'app.maitres_ouvrages',
        'app.marques',
        'app.proprietaires',
        'app.reparateurs',
        'app.societes',
        'app.soumissionnaires',
        'app.soustraitants'
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
