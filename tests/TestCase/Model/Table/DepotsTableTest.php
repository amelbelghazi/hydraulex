<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepotsTable Test Case
 */
class DepotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepotsTable
     */
    public $Depots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.depots',
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
        $config = TableRegistry::exists('Depots') ? [] : ['className' => DepotsTable::class];
        $this->Depots = TableRegistry::get('Depots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Depots);

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
}
