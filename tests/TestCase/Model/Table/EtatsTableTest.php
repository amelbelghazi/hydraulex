<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EtatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EtatsTable Test Case
 */
class EtatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EtatsTable
     */
    public $Etats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.etats',
        'app.etats_commision',
        'app.etats_marche',
        'app.soumissions',
        'app.etats_ressource',
        'app.types_etats_ressource'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Etats') ? [] : ['className' => EtatsTable::class];
        $this->Etats = TableRegistry::get('Etats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Etats);

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
