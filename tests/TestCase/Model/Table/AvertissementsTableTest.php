<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvertissementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvertissementsTable Test Case
 */
class AvertissementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AvertissementsTable
     */
    public $Avertissements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.avertissements',
        'app.personnels',
        'app.type_avertissements',
        'app.punitions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Avertissements') ? [] : ['className' => AvertissementsTable::class];
        $this->Avertissements = TableRegistry::get('Avertissements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Avertissements);

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
