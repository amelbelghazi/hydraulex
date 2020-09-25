<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FonctionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FonctionsTable Test Case
 */
class FonctionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FonctionsTable
     */
    public $Fonctions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fonctions',
        'app.fonctions_administratives',
        'app.fonctions_chantier',
        'app.positions_chantier'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fonctions') ? [] : ['className' => FonctionsTable::class];
        $this->Fonctions = TableRegistry::get('Fonctions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fonctions);

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
