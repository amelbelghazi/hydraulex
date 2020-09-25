<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesEtatsRessourceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesEtatsRessourceTable Test Case
 */
class TypesEtatsRessourceTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesEtatsRessourceTable
     */
    public $TypesEtatsRessource;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_etats_ressource'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesEtatsRessource') ? [] : ['className' => TypesEtatsRessourceTable::class];
        $this->TypesEtatsRessource = TableRegistry::get('TypesEtatsRessource', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesEtatsRessource);

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
