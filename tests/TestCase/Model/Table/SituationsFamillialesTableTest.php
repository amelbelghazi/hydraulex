<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SituationsFamillialesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SituationsFamillialesTable Test Case
 */
class SituationsFamillialesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SituationsFamillialesTable
     */
    public $SituationsFamilliales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.situations_familliales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SituationsFamilliales') ? [] : ['className' => SituationsFamillialesTable::class];
        $this->SituationsFamilliales = TableRegistry::get('SituationsFamilliales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SituationsFamilliales);

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
