<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StocksRessourcesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StocksRessourcesTable Test Case
 */
class StocksRessourcesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StocksRessourcesTable
     */
    public $StocksRessources;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stocks_ressources',
        'app.stocks',
        'app.depots',
        'app.achats_details',
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
        'app.avertissements',
        'app.type_avertissements',
        'app.punitions',
        'app.type_punitions',
        'app.etats_personnel',
        'app.formations_personnel',
        'app.formations',
        'app.salaires',
        'app.paies',
        'app.positions',
        'app.positions_administratives',
        'app.fonctions',
        'app.fonctions_administratives',
        'app.fonctions_chantier',
        'app.positions_chantiers',
        'app.chantiers',
        'app.marches',
        'app.affaires',
        'app.categories_affaires',
        'app.maitres_ouvrages',
        'app.wilayas',
        'app.soumissionnaires',
        'app.qualifications',
        'app.soumissions',
        'app.attributions',
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
        'app.etats_affaires',
        'app.devis',
        'app.avenants',
        'app.details_marches',
        'app.lots_avenants',
        'app.parties_avenants',
        'app.articles_avenants',
        'app.details_articles_avenants',
        'app.unites',
        'app.contraintes_soumission',
        'app.details_article',
        'app.articles',
        'app.parties',
        'app.lots',
        'app.details_attachements',
        'app.attachements_travaux',
        'app.soustraitants',
        'app.details_articles_avenant',
        'app.projets_soustraitant',
        'app.details_bon_commande',
        'app.bons_commandes',
        'app.fournisseurs',
        'app.produits',
        'app.types_produits',
        'app.details_bon_reception',
        'app.bons_receptions',
        'app.attachements_travaux_avenants',
        'app.frais_projets',
        'app.details_frais_projets',
        'app.types_frais',
        'app.pvs',
        'app.types_p_vs',
        'app.tags',
        'app.documents_tags',
        'app.contrats',
        'app.etats_contrats',
        'app.types_etats_contrats',
        'app.contrats_soustraitant',
        'app.contrats_personnels',
        'app.etats_commissions',
        'app.maitres_oeuvres',
        'app.avances',
        'app.types_avances',
        'app.remboursements_avance',
        'app.situations',
        'app.situations_details',
        'app.cautions',
        'app.types_cautions',
        'app.remboursements_caution',
        'app.correspondances',
        'app.visas_cf',
        'app.etats_chantiers',
        'app.types_etats_chantiers',
        'app.responsables',
        'app.responsables_parcs',
        'app.parcs',
        'app.gardiens_parcs',
        'app.gardiens',
        'app.parcs_ressources',
        'app.ressources',
        'app.locations',
        'app.proprietaires',
        'app.machines',
        'app.marques',
        'app.entretiens_machine',
        'app.pieces',
        'app.pieces_machine',
        'app.pieces_ressources',
        'app.locations_machine',
        'app.locataires',
        'app.pannes',
        'app.reparations_machine',
        'app.garages',
        'app.modes_reglements',
        'app.locations_details',
        'app.dettes_locations',
        'app.versements_locations',
        'app.cheques_locations',
        'app.details_locations',
        'app.types_ressources',
        'app.affectations',
        'app.affectations_administration',
        'app.affectations_chantier',
        'app.materiels',
        'app.reparations_materiel',
        'app.reparateurs',
        'app.etats_ressources',
        'app.types_etats_ressource',
        'app.frais_chantiers',
        'app.users',
        'app.roles',
        'app.depenses',
        'app.types_depenses',
        'app.fournitures',
        'app.cheques',
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
        $config = TableRegistry::exists('StocksRessources') ? [] : ['className' => StocksRessourcesTable::class];
        $this->StocksRessources = TableRegistry::get('StocksRessources', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StocksRessources);

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
