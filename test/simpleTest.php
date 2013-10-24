<?php
class simpleTest extends PHPUnit_Framework_TestCase
{
    public function testStringComparison()
    {
        $testStr = "test123";
        echo 'Checking string with assertEquals';
        $this->assertEquals("test123", $testStr);
 
        echo 'Checking string with assertNotEquals';
        $this->assertNotEquals("test", $testStr);
        
        echo 'Checking string with assertTrue';
        $this->assertTrue($testStr == "test123");
        
        echo 'Checking string with assertFalse';
        $this->assertFalse($testStr != "test");
    }
}
?>
