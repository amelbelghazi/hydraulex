<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentsTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentsTagsTable Test Case
 */
class DocumentsTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentsTagsTable
     */
    public $DocumentsTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.documents_tags',
        'app.documents',
        'app.pieces_identites',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DocumentsTags') ? [] : ['className' => DocumentsTagsTable::class];
        $this->DocumentsTags = TableRegistry::get('DocumentsTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentsTags);

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
