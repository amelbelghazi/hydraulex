<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesStocksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesStocksTable Test Case
 */
class TypesStocksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesStocksTable
     */
    public $TypesStocks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_stocks',
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
        $config = TableRegistry::exists('TypesStocks') ? [] : ['className' => TypesStocksTable::class];
        $this->TypesStocks = TableRegistry::get('TypesStocks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesStocks);

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
