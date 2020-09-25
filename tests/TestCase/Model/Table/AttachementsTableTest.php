<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AttachementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AttachementsTable Test Case
 */
class AttachementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AttachementsTable
     */
    public $Attachements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.attachements',
        'app.emails',
        'app.documents',
        'app.pieces_identites',
        'app.type_pieceentites',
        'app.tags',
        'app.documents_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Attachements') ? [] : ['className' => AttachementsTable::class];
        $this->Attachements = TableRegistry::get('Attachements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Attachements);

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
