<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormationsPersonnelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormationsPersonnelTable Test Case
 */
class FormationsPersonnelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormationsPersonnelTable
     */
    public $FormationsPersonnel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formations_personnel',
        'app.formations',
        'app.personnels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FormationsPersonnel') ? [] : ['className' => FormationsPersonnelTable::class];
        $this->FormationsPersonnel = TableRegistry::get('FormationsPersonnel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FormationsPersonnel);

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
