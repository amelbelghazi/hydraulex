<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorrespondancesEntrantesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorrespondancesEntrantesTable Test Case
 */
class CorrespondancesEntrantesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CorrespondancesEntrantesTable
     */
    public $CorrespondancesEntrantes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.correspondances_entrantes',
        'app.expediteurs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CorrespondancesEntrantes') ? [] : ['className' => CorrespondancesEntrantesTable::class];
        $this->CorrespondancesEntrantes = TableRegistry::get('CorrespondancesEntrantes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CorrespondancesEntrantes);

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
