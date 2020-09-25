<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaitresOeuvresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaitresOeuvresTable Test Case
 */
class MaitresOeuvresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaitresOeuvresTable
     */
    public $MaitresOeuvres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.maitres_oeuvres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MaitresOeuvres') ? [] : ['className' => MaitresOeuvresTable::class];
        $this->MaitresOeuvres = TableRegistry::get('MaitresOeuvres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MaitresOeuvres);

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
