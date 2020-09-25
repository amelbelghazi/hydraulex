<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesPieceIdentiteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesPieceIdentiteTable Test Case
 */
class TypesPieceIdentiteTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesPieceIdentiteTable
     */
    public $TypesPieceIdentite;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_piece_identite'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesPieceIdentite') ? [] : ['className' => TypesPieceIdentiteTable::class];
        $this->TypesPieceIdentite = TableRegistry::get('TypesPieceIdentite', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesPieceIdentite);

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
