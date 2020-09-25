<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WilayasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WilayasTable Test Case
 */
class WilayasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WilayasTable
     */
    public $Wilayas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wilayas',
        'app.affaires'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Wilayas') ? [] : ['className' => WilayasTable::class];
        $this->Wilayas = TableRegistry::get('Wilayas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wilayas);

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
