<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesOdssTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesOdssTable Test Case
 */
class TypesOdssTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesOdssTable
     */
    public $TypesOdss;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_odss'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesOdss') ? [] : ['className' => TypesOdssTable::class];
        $this->TypesOdss = TableRegistry::get('TypesOdss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesOdss);

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
