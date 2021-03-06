<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ContratsPersonnelsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ContratsPersonnelsController Test Case
 */
class ContratsPersonnelsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contrats_personnels',
        'app.contrats',
        'app.etats_contrats',
        'app.types_etats_contrats',
        'app.etats',
        'app.etats_commision',
        'app.etats_marches',
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
        'app.bons_receptions',
        'app.details_bon_reception',
        'app.produits',
        'app.types_produits',
        'app.cheques',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
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
        'app.cheques_locations',
        'app.details_locations',
        'app.types_ressources',
        'app.materiels',
        'app.reparations_materiel',
        'app.reparateurs',
        'app.parcs_ressources',
        'app.parcs',
        'app.responsables_parcs',
        'app.responsables',
        'app.gardiens_parcs',
        'app.gardiens',
        'app.chantiers',
        'app.etats_chantiers',
        'app.types_etats_chantiers',
        'app.frais_chantiers',
        'app.types_frais',
        'app.positions_chantiers',
        'app.fonctions',
        'app.fonctions_administratives',
        'app.fonctions_chantier',
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
        'app.users',
        'app.roles',
        'app.depenses',
        'app.types_depenses',
        'app.attachements_travaux_avenants',
        'app.frais_projets',
        'app.details_frais_projets',
        'app.pvs',
        'app.types_p_vs',
        'app.tags',
        'app.documents_tags',
        'app.etats_commissions',
        'app.soumissions',
        'app.soumissionnaires',
        'app.qualifications',
        'app.attributions',
        'app.etats_affaires',
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
        'app.o_d_ss',
        'app.contrats_soustraitant'
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
