<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhasesTable Test Case
 */
class PhasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhasesTable
     */
    public $Phases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Phases') ? [] : ['className' => PhasesTable::class];
        $this->Phases = TableRegistry::get('Phases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Phases);

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
