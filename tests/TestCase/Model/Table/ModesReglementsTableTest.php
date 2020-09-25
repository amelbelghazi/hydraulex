<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModesReglementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModesReglementsTable Test Case
 */
class ModesReglementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModesReglementsTable
     */
    public $ModesReglements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.modes_reglements',
        'app.achats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ModesReglements') ? [] : ['className' => ModesReglementsTable::class];
        $this->ModesReglements = TableRegistry::get('ModesReglements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModesReglements);

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
