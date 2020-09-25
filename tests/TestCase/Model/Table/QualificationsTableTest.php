<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QualificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QualificationsTable Test Case
 */
class QualificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QualificationsTable
     */
    public $Qualifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.qualifications',
        'app.soumissionnaires',
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
        $config = TableRegistry::exists('Qualifications') ? [] : ['className' => QualificationsTable::class];
        $this->Qualifications = TableRegistry::get('Qualifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Qualifications);

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
