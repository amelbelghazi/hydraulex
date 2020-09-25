<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DettesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DettesController Test Case
 */
class DettesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dettes',
        'app.achats',
        'app.departements',
        'app.societes',
        'app.bons_commandes',
        'app.fournisseurs',
        'app.depenses',
        'app.type_depenses',
        'app.fournitures',
        'app.positions_administratives',
        'app.mode_reglements',
        'app.achats_details',
        'app.stocks',
        'app.bons_reception',
        'app.versements'
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
