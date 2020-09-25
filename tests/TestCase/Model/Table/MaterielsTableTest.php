<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterielsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterielsTable Test Case
 */
class MaterielsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterielsTable
     */
    public $Materiels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.materiels',
        'app.ressources',
        'app.reparations_materiel'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Materiels') ? [] : ['className' => MaterielsTable::class];
        $this->Materiels = TableRegistry::get('Materiels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Materiels);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
