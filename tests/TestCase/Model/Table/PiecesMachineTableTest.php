<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PiecesMachineTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PiecesMachineTable Test Case
 */
class PiecesMachineTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PiecesMachineTable
     */
    public $PiecesMachine;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pieces_machine',
        'app.machines',
        'app.proprietaires',
        'app.ressources',
        'app.marques',
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
        'app.membres',
        'app.membres_equipe',
        'app.equipes',
        'app.equipes_personnel',
        'app.personnels',
        'app.affectations_ressource',
        'app.assurances_personnel',
        'app.assurances',
        'app.assurrance_types',
        'app.avertissements',
        'app.type_avertissements',
        'app.punitions',
        'app.etats_personnel',
        'app.formations_personnel',
        'app.formations',
        'app.paies',
        'app.salaires',
        'app.personnels_administatifs',
        'app.personnels_chantier',
        'app.positions_chantier',
        'app.responsables',
        'app.users',
        'app.equipes_soustraitant',
        'app.projet_soustraitants',
        'app.locataires',
        'app.locations_machine',
        'app.maitres_oeuvres',
        'app.maitres_ouvrages',
        'app.reparateurs',
        'app.soumissionnaires',
        'app.soustraitants',
        'app.entretiens_machine',
        'app.pieces',
        'app.pannes',
        'app.reparations_machine'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PiecesMachine') ? [] : ['className' => PiecesMachineTable::class];
        $this->PiecesMachine = TableRegistry::get('PiecesMachine', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PiecesMachine);

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
