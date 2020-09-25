<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AchatsDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AchatsDetailsTable Test Case
 */
class AchatsDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AchatsDetailsTable
     */
    public $AchatsDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.achats_details',
        'app.achats',
        'app.departements',
        'app.fournisseurs',
        'app.mode_reglements',
        'app.bons_reception',
        'app.dettes',
        'app.stocks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AchatsDetails') ? [] : ['className' => AchatsDetailsTable::class];
        $this->AchatsDetails = TableRegistry::get('AchatsDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AchatsDetails);

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
