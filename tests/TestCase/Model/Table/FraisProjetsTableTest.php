<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FraisProjetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FraisProjetsTable Test Case
 */
class FraisProjetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FraisProjetsTable
     */
    public $FraisProjets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.frais_projets',
        'app.types_frais',
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
        'app.frais_projet',
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
        $config = TableRegistry::exists('FraisProjets') ? [] : ['className' => FraisProjetsTable::class];
        $this->FraisProjets = TableRegistry::get('FraisProjets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FraisProjets);

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
