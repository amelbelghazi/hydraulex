<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesAvertissementTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesAvertissementTable Test Case
 */
class TypesAvertissementTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesAvertissementTable
     */
    public $TypesAvertissement;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_avertissement'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesAvertissement') ? [] : ['className' => TypesAvertissementTable::class];
        $this->TypesAvertissement = TableRegistry::get('TypesAvertissement', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesAvertissement);

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
