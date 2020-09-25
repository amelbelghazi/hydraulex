<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesPvsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesPvsTable Test Case
 */
class TypesPvsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesPvsTable
     */
    public $TypesPvs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_pvs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesPvs') ? [] : ['className' => TypesPvsTable::class];
        $this->TypesPvs = TableRegistry::get('TypesPvs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesPvs);

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
