<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExampleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExampleTable Test Case
 */
class ExampleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExampleTable
     */
    public $Example;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.example'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Example') ? [] : ['className' => ExampleTable::class];
        $this->Example = TableRegistry::get('Example', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Example);

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
