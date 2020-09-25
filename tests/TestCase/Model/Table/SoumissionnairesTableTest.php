<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SoumissionnairesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SoumissionnairesTable Test Case
 */
class SoumissionnairesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SoumissionnairesTable
     */
    public $Soumissionnaires;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.soumissionnaires',
        'app.qualifications',
        'app.soumissions',
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
        'app.etats_affaires',
        'app.frais_projets',
        'app.details_frais_projets',
        'app.types_frais',
        'app.marches',
        'app.maitres_oeuvres',
        'app.attributions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Soumissionnaires') ? [] : ['className' => SoumissionnairesTable::class];
        $this->Soumissionnaires = TableRegistry::get('Soumissionnaires', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Soumissionnaires);

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
