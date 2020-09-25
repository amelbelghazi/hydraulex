<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesPunitionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesPunitionTable Test Case
 */
class TypesPunitionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesPunitionTable
     */
    public $TypesPunition;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_punition'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesPunition') ? [] : ['className' => TypesPunitionTable::class];
        $this->TypesPunition = TableRegistry::get('TypesPunition', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesPunition);

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
