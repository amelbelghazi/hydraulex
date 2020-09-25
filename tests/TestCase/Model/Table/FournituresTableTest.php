<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FournituresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FournituresTable Test Case
 */
class FournituresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FournituresTable
     */
    public $Fournitures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fournitures',
        'app.departements',
        'app.societes',
        'app.achats',
        'app.fournisseurs',
        'app.entreprises',
        'app.destinataires',
        'app.correspondances_sortantes',
        'app.expediteurs',
        'app.correspondances_entrantes',
        'app.gerants',
        'app.locataires',
        'app.maitres_oeuvres',
        'app.maitres_ouvrages',
        'app.marques',
        'app.proprietaires',
        'app.reparateurs',
        'app.soumissionnaires',
        'app.soustraitants',
        'app.bons_commandes',
        'app.mode_reglements',
        'app.achats_details',
        'app.stocks',
        'app.bons_reception',
        'app.dettes',
        'app.versements',
        'app.depenses',
        'app.type_depenses',
        'app.positions_administratives'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fournitures') ? [] : ['className' => FournituresTable::class];
        $this->Fournitures = TableRegistry::get('Fournitures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fournitures);

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
