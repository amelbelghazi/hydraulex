<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PunitionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PunitionsTable Test Case
 */
class PunitionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PunitionsTable
     */
    public $Punitions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.punitions',
        'app.avertissements',
        'app.personnels',
        'app.personnes',
        'app.gerants',
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
        'app.fonction_administratives',
        'app.mode_reglements',
        'app.achats_details',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
        'app.locataires',
        'app.locations_machine',
        'app.machines',
        'app.proprietaires',
        'app.ressources',
        'app.marques',
        'app.entretiens_machine',
        'app.pieces',
        'app.pieces_machine',
        'app.pannes',
        'app.reparations_machine',
        'app.maitres_oeuvres',
        'app.maitres_ouvrages',
        'app.reparateurs',
        'app.soumissionnaires',
        'app.soustraitants',
        'app.membres',
        'app.membres_equipe',
        'app.equipes',
        'app.equipes_personnel',
        'app.equipes_soustraitant',
        'app.projet_soustraitants',
        'app.affectations_ressource',
        'app.assurances_personnel',
        'app.assurances',
        'app.assurrance_types',
        'app.etats_personnel',
        'app.formations_personnel',
        'app.formations',
        'app.paies',
        'app.salaires',
        'app.personnels_administatifs',
        'app.personnels_chantier',
        'app.positions_chantier',
        'app.fonctions',
        'app.fonctions_administratives',
        'app.fonctions_chantier',
        'app.chantiers',
        'app.marches',
        'app.affaires',
        'app.categories_affaires',
        'app.maitre_ouvrages',
        'app.commissions',
        'app.etats_commision',
        'app.etats',
        'app.etats_marche',
        'app.o_d_ss',
        'app.soumissions',
        'app.etats_ressource',
        'app.type_etat_ressources',
        'app.types_etats_ressource',
        'app.frais_projet',
        'app.frais',
        'app.types_frais',
        'app.maitre_oeuvres',
        'app.responsables',
        'app.frais_chantier',
        'app.users',
        'app.type_avertissements',
        'app.type_punitions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Punitions') ? [] : ['className' => PunitionsTable::class];
        $this->Punitions = TableRegistry::get('Punitions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Punitions);

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
