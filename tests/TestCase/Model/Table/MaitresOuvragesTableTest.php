<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaitresOuvragesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaitresOuvragesTable Test Case
 */
class MaitresOuvragesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaitresOuvragesTable
     */
    public $MaitresOuvrages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.maitres_ouvrages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MaitresOuvrages') ? [] : ['className' => MaitresOuvragesTable::class];
        $this->MaitresOuvrages = TableRegistry::get('MaitresOuvrages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MaitresOuvrages);

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
