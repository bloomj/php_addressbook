<?php
class simpleTest extends PHPUnit_Framework_TestCase
{
    public function testStringComparison()
    {
        $testStr = "test123";
        echo 'Checking string with assertEquals\n';
        $this->assertEquals("test123", $testStr);
 
        echo '\nChecking string with assertNotEquals\n';
        $this->assertNotEquals("test", $testStr);
        
        echo '\nChecking string with assertTrue\n';
        $this->assertTrue($testStr == "test123");
        
        echo '\nChecking string with assertFalse\n';
        $this->assertFalse($testStr != "test");
    }
}
?>
