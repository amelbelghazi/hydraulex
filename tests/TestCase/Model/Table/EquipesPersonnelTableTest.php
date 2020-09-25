<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquipesPersonnelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquipesPersonnelTable Test Case
 */
class EquipesPersonnelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EquipesPersonnelTable
     */
    public $EquipesPersonnel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.equipes_personnel',
        'app.personnels',
        'app.equipes',
        'app.equipes_soustraitant',
        'app.membres_equipe'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EquipesPersonnel') ? [] : ['className' => EquipesPersonnelTable::class];
        $this->EquipesPersonnel = TableRegistry::get('EquipesPersonnel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EquipesPersonnel);

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
