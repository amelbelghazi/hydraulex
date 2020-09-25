<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RemboursementsCautionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RemboursementsCautionTable Test Case
 */
class RemboursementsCautionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RemboursementsCautionTable
     */
    public $RemboursementsCaution;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.remboursements_caution',
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
        'app.soumissions',
        'app.etats_ressource',
        'app.type_etat_ressources',
        'app.types_etats_ressource',
        'app.frais_projet',
        'app.frais',
        'app.types_frais',
        'app.maitre_oeuvres',
        'app.type_cautions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RemboursementsCaution') ? [] : ['className' => RemboursementsCautionTable::class];
        $this->RemboursementsCaution = TableRegistry::get('RemboursementsCaution', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RemboursementsCaution);

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
