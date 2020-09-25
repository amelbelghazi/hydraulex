<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LocatairesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\LocatairesController Test Case
 */
class LocatairesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.gerants',
        'app.personnes',
        'app.membres',
        'app.membres_equipe',
        'app.equipes',
        'app.equipes_personnel',
        'app.personnels',
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
        'app.personnels_administatifs',
        'app.personnels_chantier',
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
        'app.equipes_soustraitant',
        'app.projet_soustraitants',
        'app.bons_commandes',
        'app.depenses',
        'app.types_depenses',
        'app.modes_reglements',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
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
        'app.projets_soustraitant'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
