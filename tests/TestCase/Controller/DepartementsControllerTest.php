<?php
namespace App\Test\TestCase\Controller;

use App\Controller\DepartementsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\DepartementsController Test Case
 */
class DepartementsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.departements',
        'app.societes',
        'app.achats',
        'app.fournisseurs',
        'app.mode_reglements',
        'app.achats_details',
        'app.stocks',
        'app.bons_reception',
        'app.dettes',
        'app.bons_commandes',
        'app.depenses',
        'app.fournitures',
        'app.positions_administratives'
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
