<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContratsSoustraitantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContratsSoustraitantTable Test Case
 */
class ContratsSoustraitantTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContratsSoustraitantTable
     */
    public $ContratsSoustraitant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contrats_soustraitant',
        'app.contrats',
        'app.projet_soustraitants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ContratsSoustraitant') ? [] : ['className' => ContratsSoustraitantTable::class];
        $this->ContratsSoustraitant = TableRegistry::get('ContratsSoustraitant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContratsSoustraitant);

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
