<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BibleTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BibleTypeTable Test Case
 */
class BibleTypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BibleTypeTable
     */
    public $BibleType;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bible_type',
        'app.books_of_bible'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BibleType') ? [] : ['className' => 'App\Model\Table\BibleTypeTable'];
        $this->BibleType = TableRegistry::get('BibleType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BibleType);

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
