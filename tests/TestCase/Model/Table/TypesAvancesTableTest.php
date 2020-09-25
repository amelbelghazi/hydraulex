<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesAvancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesAvancesTable Test Case
 */
class TypesAvancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesAvancesTable
     */
    public $TypesAvances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_avances',
        'app.avances',
        'app.marches',
        'app.affaires',
        'app.categories_affaires',
        'app.maitres_ouvrages',
        'app.wilayas',
        'app.types_affaires',
        'app.commissions',
        'app.etats_commissions',
        'app.etats',
        'app.etats_commision',
        'app.etats_marche',
        'app.soumissions',
        'app.soumissionnaires',
        'app.qualifications',
        'app.attributions',
        'app.etats_affaires',
        'app.frais_projets',
        'app.details_frais_projets',
        'app.types_frais',
        'app.maitres_oeuvres',
        'app.avenants',
        'app.details_marche',
        'app.lots_avenant',
        'app.cautions',
        'app.types_cautions',
        'app.remboursements_caution',
        'app.chantiers',
        'app.responsables',
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
        'app.achats',
        'app.departements',
        'app.societes',
        'app.gerants',
        'app.bons_commandes',
        'app.fournisseurs',
        'app.depenses',
        'app.types_depenses',
        'app.fournitures',
        'app.positions_administratives',
        'app.fonction_administratives',
        'app.modes_reglements',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
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
        'app.positions_chantier',
        'app.fonctions',
        'app.fonctions_administratives',
        'app.fonctions_chantier',
        'app.users',
        'app.roles',
        'app.frais_chantiers',
        'app.correspondances',
        'app.details_marches',
        'app.etats_marches',
        'app.o_d_ss',
        'app.types_o_d_ss',
        'app.devis',
        'app.lots',
        'app.parties',
        'app.articles',
        'app.details_article',
        'app.unites',
        'app.contraintes_soumission',
        'app.details_articles_avenant',
        'app.article_avenants',
        'app.soustraitants',
        'app.projets_soustraitant',
        'app.details_bon_commande',
        'app.bon_commandes',
        'app.produits',
        'app.type_produits',
        'app.details_bon_reception',
        'app.bon_receptions',
        'app.pvs',
        'app.types_p_vs',
        'app.visas_cf',
        'app.remboursements_avance'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesAvances') ? [] : ['className' => TypesAvancesTable::class];
        $this->TypesAvances = TableRegistry::get('TypesAvances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesAvances);

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
}
