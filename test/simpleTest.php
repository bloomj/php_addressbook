<?php
include_once('baseTestCase.php');

class simpleTest extends baseTestCase
{
    public function testStringComparison()
    {
        $testStr = "test123";
        $this->testlog->trace('Checking string with assertEquals');
        $this->assertEquals("test123", $testStr);
 
        $this->testlog->trace('Checking string with assertFalse');
        $this->assertFalse($testStr != "test");
        
        $this->testlog->trace('Checking string with assertNotEquals');
        $this->assertNotEquals("test", $testStr);
        
        $this->testlog->trace('Checking string with assertTrue');
        $this->assertTrue($testStr == "test123");
    }
    
    public function testMath() {
    	$this->testlog->trace('Check 2+2=4');
    	$this->assertEquals(4, 2+2);
    }
}
?>
