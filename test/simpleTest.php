<?php
$logger_path = "/var/www/_includes/logger.php";
include_once($logger_path);

class simpleTest extends PHPUnit_Framework_TestCase
{
	public static function setUpBeforeClass() {
		$testlog->trace('Setting up simpleTest class');
	}
	
	public static function tearDownAfterClass() {
		$testlog->trace('Tearing down simpleTest class');
	}
	
	protected function setUp() {
		$testlog->trace('Setting up function');
	}
	
	protected function tearDown() {
		$testlog->trace('Tearing down function');
	}
	
    public function testStringComparison()
    {
        $testStr = "test123";
        $testlog->trace('Checking string with assertEquals');
        $this->assertEquals("test123", $testStr);
 
        $testlog->trace('Checking string with assertFalse');
        $this->assertFalse($testStr == "test");
        
        $testlog->trace('Checking string with assertNotEquals');
        $this->assertNotEquals("test", $testStr);
        
        $testlog->trace('Checking string with assertTrue');
        $this->assertTrue($testStr == "test123");
    }
    
    public function testMath() {
    	$testlog->trace('Check 2+2=4');
    	$this->assertEquals(4, 2+2);
    }
}
?>
