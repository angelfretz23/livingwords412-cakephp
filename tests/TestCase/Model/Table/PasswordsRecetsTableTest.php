<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PasswordsRecetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PasswordsRecetsTable Test Case
 */
class PasswordsRecetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PasswordsRecetsTable
     */
    public $PasswordsRecets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.passwords_recets',
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
        $config = TableRegistry::exists('PasswordsRecets') ? [] : ['className' => 'App\Model\Table\PasswordsRecetsTable'];
        $this->PasswordsRecets = TableRegistry::get('PasswordsRecets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PasswordsRecets);

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
