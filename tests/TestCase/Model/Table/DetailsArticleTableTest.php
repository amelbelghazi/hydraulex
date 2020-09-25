<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailsArticleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailsArticleTable Test Case
 */
class DetailsArticleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailsArticleTable
     */
    public $DetailsArticle;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.details_article',
        'app.articles',
        'app.parties',
        'app.unites',
        'app.soustraitants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetailsArticle') ? [] : ['className' => DetailsArticleTable::class];
        $this->DetailsArticle = TableRegistry::get('DetailsArticle', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetailsArticle);

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
