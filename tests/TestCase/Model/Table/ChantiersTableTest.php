<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChantiersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChantiersTable Test Case
 */
class ChantiersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChantiersTable
     */
    public $Chantiers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chantiers',
        'app.marches',
        'app.responsables',
        'app.frais_chantier',
        'app.positions_chantier'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Chantiers') ? [] : ['className' => ChantiersTable::class];
        $this->Chantiers = TableRegistry::get('Chantiers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Chantiers);

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
