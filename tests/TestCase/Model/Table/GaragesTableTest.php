<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GaragesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GaragesTable Test Case
 */
class GaragesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GaragesTable
     */
    public $Garages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.garages',
        'app.reparations_machine'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Garages') ? [] : ['className' => GaragesTable::class];
        $this->Garages = TableRegistry::get('Garages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Garages);

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
