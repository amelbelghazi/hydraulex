<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CautionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CautionsTable Test Case
 */
class CautionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CautionsTable
     */
    public $Cautions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cautions',
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
        'app.type_stocks',
        'app.depots',
        'app.achats_details',
        'app.ressources',
        'app.affectations_ressource',
        'app.personnels',
        'app.personnes',
        'app.gerants',
        'app.membres',
        'app.membres_equipe',
        'app.equipes',
        'app.equipes_personnel',
        'app.equipes_soustraitant',
        'app.projet_soustraitants',
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
        'app.personnels_administatifs',
        'app.personnels_chantier',
        'app.positions_administratives',
        'app.fonction_administratives',
        'app.positions_chantier',
        'app.fonctions',
        'app.fonctions_administratives',
        'app.fonctions_chantier',
        'app.chantiers',
        'app.responsables',
        'app.frais_chantier',
        'app.frais',
        'app.types_frais',
        'app.users',
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
        'app.mode_reglements',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
        'app.maitres_oeuvres',
        'app.maitres_ouvrages',
        'app.soustraitants',
        'app.details_article',
        'app.articles',
        'app.parties',
        'app.lots',
        'app.devis',
        'app.unites',
        'app.contraintes_soumission',
        'app.details_articles_avenant',
        'app.article_avenants',
        'app.details_bon_commande',
        'app.bon_commandes',
        'app.produits',
        'app.type_produits',
        'app.details_bon_reception',
        'app.bon_receptions',
        'app.projets_soustraitant',
        'app.attributions',
        'app.etats_ressource',
        'app.type_etat_ressources',
        'app.types_etats_ressource',
        'app.frais_projet',
        'app.types_cautions',
        'app.remboursements_caution'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cautions') ? [] : ['className' => CautionsTable::class];
        $this->Cautions = TableRegistry::get('Cautions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cautions);

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
