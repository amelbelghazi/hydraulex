<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesAffairesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesAffairesTable Test Case
 */
class TypesAffairesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesAffairesTable
     */
    public $TypesAffaires;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_affaires',
        'app.affaires',
        'app.categories_affaires',
        'app.maitres_ouvrages',
        'app.wilayas',
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
        'app.etats_ressource',
        'app.type_etat_ressources',
        'app.types_etats_ressource',
        'app.frais_projet',
        'app.frais',
        'app.types_frais',
        'app.marches',
        'app.maitres_oeuvres',
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
        $config = TableRegistry::exists('TypesAffaires') ? [] : ['className' => TypesAffairesTable::class];
        $this->TypesAffaires = TableRegistry::get('TypesAffaires', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesAffaires);

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
}
