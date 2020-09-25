<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesProduitTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesProduitTable Test Case
 */
class TypesProduitTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesProduitTable
     */
    public $TypesProduit;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_produit',
        'app.type_produits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesProduit') ? [] : ['className' => TypesProduitTable::class];
        $this->TypesProduit = TableRegistry::get('TypesProduit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesProduit);

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
