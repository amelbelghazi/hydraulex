<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvenantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvenantsTable Test Case
 */
class AvenantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AvenantsTable
     */
    public $Avenants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.avenants',
        'app.marches',
        'app.details_marche',
        'app.lots_avenant'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Avenants') ? [] : ['className' => AvenantsTable::class];
        $this->Avenants = TableRegistry::get('Avenants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Avenants);

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
