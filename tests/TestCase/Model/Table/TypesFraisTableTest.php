<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesFraisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesFraisTable Test Case
 */
class TypesFraisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesFraisTable
     */
    public $TypesFrais;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_frais'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesFrais') ? [] : ['className' => TypesFraisTable::class];
        $this->TypesFrais = TableRegistry::get('TypesFrais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesFrais);

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
