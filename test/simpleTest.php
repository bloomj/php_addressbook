<?php
class simpleTest extends PHPUnit_Framework_TestCase
{
	public static function setUpBeforeClass() {
		echo 'Setting up simpleTest class'.PHP_EOL;
	}
	
	public static function tearDownAfterClass() {
		echo 'Tearing down simpleTest class'.PHP_EOL;
	}
	
	protected function setUp() {
		echo 'Setting up function'.PHP_EOL;
	}
	
	protected function tearDown() {
		echo 'Tearing down function'.PHP_EOL;
	}
	
    public function testStringComparison()
    {
        $testStr = "test123";
        echo 'Checking string with assertEquals'.PHP_EOL;
        $this->assertEquals("test123", $testStr);
 
        echo 'Checking string with assertFalse'.PHP_EOL;
        $this->assertFalse($testStr == "test");
        
        echo 'Checking string with assertNotEquals'.PHP_EOL;
        $this->assertNotEquals("test", $testStr);
        
        echo 'Checking string with assertTrue'.PHP_EOL;
        $this->assertTrue($testStr == "test123");
    }
    
    public function testMath() {
    	echo 'Check 2+2=4'.PHP_EOL;
    	$this->assertEquals(4, 2+2);
    }
}
?>
