<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MembresEquipeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MembresEquipeTable Test Case
 */
class MembresEquipeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MembresEquipeTable
     */
    public $MembresEquipe;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.membres_equipe',
        'app.membres',
        'app.personnes',
        'app.equipes',
        'app.equipes_personnel',
        'app.personnels',
        'app.equipes_soustraitant',
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
        $config = TableRegistry::exists('MembresEquipe') ? [] : ['className' => MembresEquipeTable::class];
        $this->MembresEquipe = TableRegistry::get('MembresEquipe', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MembresEquipe);

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
