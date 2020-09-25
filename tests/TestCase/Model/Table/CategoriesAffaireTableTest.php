<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesAffaireTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesAffaireTable Test Case
 */
class CategoriesAffaireTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriesAffaireTable
     */
    public $CategoriesAffaire;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories_affaire',
        'app.affaires',
        'app.categories_affaires',
        'app.maitre_ouvrages',
        'app.commissions',
        'app.frais_projet',
        'app.marches',
        'app.soumissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CategoriesAffaire') ? [] : ['className' => CategoriesAffaireTable::class];
        $this->CategoriesAffaire = TableRegistry::get('CategoriesAffaire', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoriesAffaire);

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
