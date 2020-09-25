<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContraintesSoumissionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContraintesSoumissionTable Test Case
 */
class ContraintesSoumissionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContraintesSoumissionTable
     */
    public $ContraintesSoumission;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contraintes_soumission',
        'app.unites'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ContraintesSoumission') ? [] : ['className' => ContraintesSoumissionTable::class];
        $this->ContraintesSoumission = TableRegistry::get('ContraintesSoumission', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContraintesSoumission);

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
