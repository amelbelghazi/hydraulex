<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CommissionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CommissionsController Test Case
 */
class CommissionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.commissions',
        'app.affaires',
        'app.categories_affaires',
        'app.maitre_ouvrages',
        'app.frais_projet',
        'app.marches',
        'app.soumissions',
        'app.etats_commision'
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
