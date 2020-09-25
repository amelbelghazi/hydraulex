<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorrespondancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorrespondancesTable Test Case
 */
class CorrespondancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CorrespondancesTable
     */
    public $Correspondances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.correspondances',
        'app.marches'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Correspondances') ? [] : ['className' => CorrespondancesTable::class];
        $this->Correspondances = TableRegistry::get('Correspondances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Correspondances);

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
