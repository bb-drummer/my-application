<?php
namespace ApplicationTest\Model;

use \Application\Model\DbStructUpdater;

/**
 * @coversDefaultClass \Application\Model\DbStructUpdater
 */
class DbStructUpdaterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::init
     */
    public function testInit() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::setConfig
     */
    public function testSetConfig() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::getUpdates
     */
    public function testGetUpdates() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::filterDiffs
     */
    public function testFilterDiffs() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::getDiffInfo
     */
    public function testGetDiffInfo() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::compare
     */
    public function testCompareSQLs() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::getTablelist
     */
    public function testGetTablelist() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::getTabSql
     */
    public function testGetTableSQL() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::splitTabSql
     */
    public function testSplitTabSql() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::compareSql
     */
    public function testFoobar() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::processLine
     */
    public function testProcessLine() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::getDiffSql
     */
    public function testGetDiffSQL() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::getActionSql
     */
    public function testgetActionSql() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::getDelimPos
     */
    public function testGetDelimPosFromLeft() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * @covers ::getDelimRPos
     */
    public function testGetDelimPosFromRight() 
    {
        $this->assertTrue(true);
    }
    
    
    
    
    //
    // basic test setup
    //
    
    /**
     * @var DbStructUpdater
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
        
        //$this->markTestSkipped('external library');
        $this->object = new DbStructUpdater;
    }

}
