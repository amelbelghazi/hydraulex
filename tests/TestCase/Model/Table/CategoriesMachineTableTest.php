<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesMachineTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesMachineTable Test Case
 */
class CategoriesMachineTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriesMachineTable
     */
    public $CategoriesMachine;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories_machine'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CategoriesMachine') ? [] : ['className' => CategoriesMachineTable::class];
        $this->CategoriesMachine = TableRegistry::get('CategoriesMachine', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoriesMachine);

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
