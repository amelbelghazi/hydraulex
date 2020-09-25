<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FournisseursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FournisseursTable Test Case
 */
class FournisseursTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FournisseursTable
     */
    public $Fournisseurs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fournisseurs',
        'app.achats',
        'app.departements',
        'app.societes',
        'app.gerants',
        'app.personnels',
        'app.personnes',
        'app.situations_familiales',
        'app.sexes',
        'app.cadeaux',
        'app.membres',
        'app.membres_equipe',
        'app.equipes',
        'app.equipes_personnel',
        'app.equipes_soustraitant',
        'app.projet_soustraitants',
        'app.types_personnels',
        'app.affectations_ressource',
        'app.ressources',
        'app.stocks',
        'app.types_stocks',
        'app.depots',
        'app.achats_details',
        'app.fournitures',
        'app.machines',
        'app.proprietaires',
        'app.marques',
        'app.entretiens_machine',
        'app.pieces',
        'app.pieces_machine',
        'app.locations_machine',
        'app.locataires',
        'app.pannes',
        'app.reparations_machine',
        'app.garages',
        'app.materiels',
        'app.reparations_materiel',
        'app.reparateurs',
        'app.assurances_personnel',
        'app.assurances',
        'app.assurrance_types',
        'app.avertissements',
        'app.type_avertissements',
        'app.punitions',
        'app.type_punitions',
        'app.etats_personnel',
        'app.formations_personnel',
        'app.formations',
        'app.paies',
        'app.salaires',
        'app.positions_administratives',
        'app.fonction_administratives',
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
        'app.types_o_d_ss',
        'app.soumissions',
        'app.soumissionnaires',
        'app.attributions',
        'app.etats_ressource',
        'app.type_etat_ressources',
        'app.types_etats_ressource',
        'app.frais_projet',
        'app.frais',
        'app.types_frais',
        'app.maitres_oeuvres',
        'app.responsables',
        'app.frais_chantier',
        'app.users',
        'app.roles',
        'app.bons_commandes',
        'app.depenses',
        'app.types_depenses',
        'app.modes_reglements',
        'app.bons_reception',
        'app.dettes',
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
        $config = TableRegistry::exists('Fournisseurs') ? [] : ['className' => FournisseursTable::class];
        $this->Fournisseurs = TableRegistry::get('Fournisseurs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fournisseurs);

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
