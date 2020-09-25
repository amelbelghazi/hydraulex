<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtatsCommissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtatsCommissionsTable Test Case
 */
class EtatsCommissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EtatsCommissionsTable
     */
    public $EtatsCommissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.etats_commissions',
        'app.commissions',
        'app.affaires',
        'app.categories_affaires',
        'app.maitres_ouvrages',
        'app.wilayas',
        'app.types_affaires',
        'app.frais_projet',
        'app.frais',
        'app.types_frais',
        'app.marches',
        'app.maitres_oeuvres',
        'app.soumissions',
        'app.soumissionnaires',
        'app.etats',
        'app.etats_commision',
        'app.etats_marche',
        'app.o_d_ss',
        'app.types_o_d_ss',
        'app.etats_ressource',
        'app.type_etat_ressources',
        'app.types_etats_ressource',
        'app.attributions',
        'app.etats_affaires'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EtatsCommissions') ? [] : ['className' => EtatsCommissionsTable::class];
        $this->EtatsCommissions = TableRegistry::get('EtatsCommissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EtatsCommissions);

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
