<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorrespondancesSortantesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorrespondancesSortantesTable Test Case
 */
class CorrespondancesSortantesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CorrespondancesSortantesTable
     */
    public $CorrespondancesSortantes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.correspondances_sortantes',
        'app.destinataires'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CorrespondancesSortantes') ? [] : ['className' => CorrespondancesSortantesTable::class];
        $this->CorrespondancesSortantes = TableRegistry::get('CorrespondancesSortantes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CorrespondancesSortantes);

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
