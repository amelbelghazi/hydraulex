<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VersementsLocationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VersementsLocationsTable Test Case
 */
class VersementsLocationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VersementsLocationsTable
     */
    public $VersementsLocations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.versements_locations',
        'app.dettes_locations',
        'app.locations',
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
        'app.depots',
        'app.achats_details',
        'app.achats',
        'app.fournisseurs',
        'app.bons_commandes',
        'app.details_bon_commande',
        'app.produits',
        'app.unites',
        'app.contraintes_soumission',
        'app.details_article',
        'app.articles',
        'app.parties',
        'app.lots',
        'app.devis',
        'app.marches',
        'app.affaires',
        'app.categories_affaires',
        'app.maitres_ouvrages',
        'app.wilayas',
        'app.types_affaires',
        'app.commissions',
        'app.documents',
        'app.pieces_identites',
        'app.type_pieceentites',
        'app.odss',
        'app.types_o_d_ss',
        'app.etats_marches',
        'app.o_d_ss',
        'app.etats',
        'app.etats_commision',
        'app.soumissions',
        'app.soumissionnaires',
        'app.qualifications',
        'app.attributions',
        'app.etats_affaires',
        'app.frais_projets',
        'app.details_frais_projets',
        'app.types_frais',
        'app.avenants',
        'app.details_marches',
        'app.lots_avenants',
        'app.parties_avenants',
        'app.articles_avenants',
        'app.details_articles_avenants',
        'app.soustraitants',
        'app.details_articles_avenant',
        'app.projets_soustraitant',
        'app.attachements_travaux_avenants',
        'app.pvs',
        'app.types_p_vs',
        'app.tags',
        'app.documents_tags',
        'app.etats_commissions',
        'app.maitres_oeuvres',
        'app.avances',
        'app.types_avances',
        'app.remboursements_avance',
        'app.situations',
        'app.attachements_travaux',
        'app.details_attachements',
        'app.situations_details',
        'app.cautions',
        'app.types_cautions',
        'app.remboursements_caution',
        'app.chantiers',
        'app.etats_chantiers',
        'app.types_etats_chantiers',
        'app.responsables',
        'app.frais_chantiers',
        'app.positions_chantier',
        'app.fonctions',
        'app.fonctions_administratives',
        'app.fonctions_chantier',
        'app.correspondances',
        'app.visas_cf',
        'app.types_produits',
        'app.details_bon_reception',
        'app.bons_receptions',
        'app.modes_reglements',
        'app.cheques',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
        'app.fournitures',
        'app.types_ressources',
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
        'app.users',
        'app.roles',
        'app.depenses',
        'app.types_depenses',
        'app.locations_details',
        'app.stocks_locations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VersementsLocations') ? [] : ['className' => VersementsLocationsTable::class];
        $this->VersementsLocations = TableRegistry::get('VersementsLocations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VersementsLocations);

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
