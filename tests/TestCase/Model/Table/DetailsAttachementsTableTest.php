<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailsAttachementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailsAttachementsTable Test Case
 */
class DetailsAttachementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailsAttachementsTable
     */
    public $DetailsAttachements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.details_attachements',
        'app.attachements_travails',
        'app.details_articles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetailsAttachements') ? [] : ['className' => DetailsAttachementsTable::class];
        $this->DetailsAttachements = TableRegistry::get('DetailsAttachements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetailsAttachements);

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
