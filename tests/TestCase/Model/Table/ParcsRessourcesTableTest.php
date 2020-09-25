<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParcsRessourcesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParcsRessourcesTable Test Case
 */
class ParcsRessourcesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParcsRessourcesTable
     */
    public $ParcsRessources;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parcs_ressources',
        'app.parcs',
        'app.wilayas',
        'app.affaires',
        'app.categories_affaires',
        'app.maitres_ouvrages',
        'app.types_affaires',
        'app.commissions',
        'app.documents',
        'app.pieces_identites',
        'app.type_pieceentites',
        'app.marches',
        'app.maitres_oeuvres',
        'app.avances',
        'app.types_avances',
        'app.remboursements_avance',
        'app.situations',
        'app.attachements_travaux',
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
        'app.soustraitants',
        'app.details_articles_avenant',
        'app.projets_soustraitant',
        'app.details_bon_commande',
        'app.bons_commandes',
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
        'app.modes_reglements',
        'app.cheques',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
        'app.produits',
        'app.types_produits',
        'app.details_bon_reception',
        'app.bons_receptions',
        'app.fournitures',
        'app.locations',
        'app.proprietaires',
        'app.machines',
        'app.marques',
        'app.entretiens_machine',
        'app.pieces',
        'app.pieces_machine',
        'app.locations_machine',
        'app.locataires',
        'app.pannes',
        'app.reparations_machine',
        'app.garages',
        'app.locations_details',
        'app.dettes_locations',
        'app.versements_locations',
        'app.types_ressources',
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
        'app.positions_chantier',
        'app.fonctions',
        'app.fonctions_administratives',
        'app.fonctions_chantier',
        'app.chantiers',
        'app.etats_chantiers',
        'app.types_etats_chantiers',
        'app.responsables',
        'app.responsables_parcs',
        'app.frais_chantiers',
        'app.types_frais',
        'app.users',
        'app.roles',
        'app.gardiens',
        'app.gardiens_parcs',
        'app.depenses',
        'app.types_depenses',
        'app.attachements_travaux_avenants',
        'app.situations_details',
        'app.cautions',
        'app.types_cautions',
        'app.remboursements_caution',
        'app.correspondances',
        'app.etats_marches',
        'app.o_d_ss',
        'app.types_o_d_ss',
        'app.etats',
        'app.etats_commision',
        'app.soumissions',
        'app.soumissionnaires',
        'app.qualifications',
        'app.attributions',
        'app.etats_affaires',
        'app.pvs',
        'app.types_p_vs',
        'app.visas_cf',
        'app.odss',
        'app.frais_projets',
        'app.details_frais_projets',
        'app.tags',
        'app.documents_tags',
        'app.etats_commissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ParcsRessources') ? [] : ['className' => ParcsRessourcesTable::class];
        $this->ParcsRessources = TableRegistry::get('ParcsRessources', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ParcsRessources);

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
