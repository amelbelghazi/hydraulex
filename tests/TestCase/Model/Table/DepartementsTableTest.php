<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartementsTable Test Case
 */
class DepartementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartementsTable
     */
    public $Departements;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Departements') ? [] : ['className' => DepartementsTable::class];
        $this->Departements = TableRegistry::get('Departements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Departements);

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
