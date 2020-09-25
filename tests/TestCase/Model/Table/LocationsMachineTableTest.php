<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LocationsMachineTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LocationsMachineTable Test Case
 */
class LocationsMachineTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LocationsMachineTable
     */
    public $LocationsMachine;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.locations_machine',
        'app.machines',
        'app.locataires',
        'app.entreprises',
        'app.destinataires',
        'app.correspondances_sortantes',
        'app.expediteurs',
        'app.correspondances_entrantes',
        'app.fournisseurs',
        'app.achats',
        'app.departements',
        'app.societes',
        'app.bons_commandes',
        'app.depenses',
        'app.type_depenses',
        'app.fournitures',
        'app.stocks',
        'app.positions_administratives',
        'app.mode_reglements',
        'app.achats_details',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
        'app.gerants',
        'app.personnes',
        'app.maitres_oeuvres',
        'app.maitres_ouvrages',
        'app.marques',
        'app.proprietaires',
        'app.reparateurs',
        'app.soumissionnaires',
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
        $config = TableRegistry::exists('LocationsMachine') ? [] : ['className' => LocationsMachineTable::class];
        $this->LocationsMachine = TableRegistry::get('LocationsMachine', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LocationsMachine);

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
