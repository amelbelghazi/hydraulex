<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtatsPersonnelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtatsPersonnelTable Test Case
 */
class EtatsPersonnelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EtatsPersonnelTable
     */
    public $EtatsPersonnel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.etats_personnel',
        'app.personnels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EtatsPersonnel') ? [] : ['className' => EtatsPersonnelTable::class];
        $this->EtatsPersonnel = TableRegistry::get('EtatsPersonnel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EtatsPersonnel);

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
