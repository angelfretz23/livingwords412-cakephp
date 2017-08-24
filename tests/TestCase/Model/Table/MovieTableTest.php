<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieTable Test Case
 */
class MovieTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieTable
     */
    public $Movie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.movie',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Movie') ? [] : ['className' => 'App\Model\Table\MovieTable'];
        $this->Movie = TableRegistry::get('Movie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Movie);

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
