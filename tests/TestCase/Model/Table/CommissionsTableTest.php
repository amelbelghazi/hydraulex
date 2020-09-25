<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommissionsTable Test Case
 */
class CommissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommissionsTable
     */
    public $Commissions;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Commissions') ? [] : ['className' => CommissionsTable::class];
        $this->Commissions = TableRegistry::get('Commissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Commissions);

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
