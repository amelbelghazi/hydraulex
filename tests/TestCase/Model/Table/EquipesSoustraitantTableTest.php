<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquipesSoustraitantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquipesSoustraitantTable Test Case
 */
class EquipesSoustraitantTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EquipesSoustraitantTable
     */
    public $EquipesSoustraitant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.equipes_soustraitant',
        'app.equipes',
        'app.equipes_personnel',
        'app.personnels',
        'app.membres_equipe',
        'app.projet_soustraitants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EquipesSoustraitant') ? [] : ['className' => EquipesSoustraitantTable::class];
        $this->EquipesSoustraitant = TableRegistry::get('EquipesSoustraitant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EquipesSoustraitant);

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
