<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SoustraitantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SoustraitantsTable Test Case
 */
class SoustraitantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SoustraitantsTable
     */
    public $Soustraitants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.soustraitants',
        'app.details_article',
        'app.articles',
        'app.parties',
        'app.lots',
        'app.devis',
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
        'app.projets_soustraitant'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Soustraitants') ? [] : ['className' => SoustraitantsTable::class];
        $this->Soustraitants = TableRegistry::get('Soustraitants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Soustraitants);

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
