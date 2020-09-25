<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaiesTable Test Case
 */
class PaiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaiesTable
     */
    public $Paies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.paies',
        'app.salaires'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Paies') ? [] : ['className' => PaiesTable::class];
        $this->Paies = TableRegistry::get('Paies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Paies);

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
