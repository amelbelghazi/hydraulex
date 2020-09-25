<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailsFraisProjetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailsFraisProjetsTable Test Case
 */
class DetailsFraisProjetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailsFraisProjetsTable
     */
    public $DetailsFraisProjets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.details_frais_projets',
        'app.types_frais',
        'app.frais_projets',
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
        'app.o_d_ss',
        'app.types_o_d_ss',
        'app.soumissions',
        'app.soumissionnaires',
        'app.attributions',
        'app.etats_affaires',
        'app.marches',
        'app.maitres_oeuvres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetailsFraisProjets') ? [] : ['className' => DetailsFraisProjetsTable::class];
        $this->DetailsFraisProjets = TableRegistry::get('DetailsFraisProjets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetailsFraisProjets);

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
