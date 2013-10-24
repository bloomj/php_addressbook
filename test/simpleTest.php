<?php
class simpleTest extends PHPUnit_Framework_TestCase
{
    public function testStringComparison()
    {
        $testStr = "test123";
        echo 'Checking string with assertEquals'.PHP_EOL;
        $this->assertEquals("test123", $testStr);
 
        echo 'Checking string with assertFalse'.PHP_EOL;
        $this->assertFalse($testStr != "test");
        
        echo 'Checking string with assertNotEquals'.PHP_EOL;
        $this->assertNotEquals("test", $testStr);
        
        echo 'Checking string with assertTrue'.PHP_EOL;
        $this->assertTrue($testStr == "test123");
    }
}
?>
