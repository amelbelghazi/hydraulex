<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PiecesIdentitesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PiecesIdentitesTable Test Case
 */
class PiecesIdentitesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PiecesIdentitesTable
     */
    public $PiecesIdentites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pieces_identites',
        'app.type_pieceentites',
        'app.documents',
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
        $config = TableRegistry::exists('PiecesIdentites') ? [] : ['className' => PiecesIdentitesTable::class];
        $this->PiecesIdentites = TableRegistry::get('PiecesIdentites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PiecesIdentites);

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
