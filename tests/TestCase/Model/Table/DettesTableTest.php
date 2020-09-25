<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DettesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DettesTable Test Case
 */
class DettesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DettesTable
     */
    public $Dettes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dettes',
        'app.achats',
        'app.departements',
        'app.societes',
        'app.bons_commandes',
        'app.fournisseurs',
        'app.depenses',
        'app.type_depenses',
        'app.fournitures',
        'app.positions_administratives',
        'app.mode_reglements',
        'app.achats_details',
        'app.stocks',
        'app.bons_reception',
        'app.versements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dettes') ? [] : ['className' => DettesTable::class];
        $this->Dettes = TableRegistry::get('Dettes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dettes);

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
