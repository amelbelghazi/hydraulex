<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MachinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MachinesTable Test Case
 */
class MachinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MachinesTable
     */
    public $Machines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.machines',
        'app.proprietaires',
        'app.ressources',
        'app.marques',
        'app.entretiens_machine',
        'app.pieces',
        'app.locations_machine',
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
        'app.reparateurs',
        'app.soumissionnaires',
        'app.soustraitants',
        'app.pannes',
        'app.pieces_machine'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Machines') ? [] : ['className' => MachinesTable::class];
        $this->Machines = TableRegistry::get('Machines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Machines);

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
