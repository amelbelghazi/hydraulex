<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FonctionsChantierTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FonctionsChantierTable Test Case
 */
class FonctionsChantierTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FonctionsChantierTable
     */
    public $FonctionsChantier;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fonctions_chantier',
        'app.fonctions',
        'app.fonctions_administratives',
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
        $config = TableRegistry::exists('FonctionsChantier') ? [] : ['className' => FonctionsChantierTable::class];
        $this->FonctionsChantier = TableRegistry::get('FonctionsChantier', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FonctionsChantier);

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
