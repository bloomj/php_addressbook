<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/entities/person.php');

/**
 * This is a unit test class for the Person class
 * 
 * @author jim
 * @version 1.0
 * @package php_addressbook.test.entities
 *
 */
class personTest extends baseTestCase
{
	/**
	 * Person object
	 * 
	 * @var Person
	 */
	private $person;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();	
		$this->person = new Person();
	}
	
	/**
	 * Tests Person overloaded constructor
	 */
	public function testPersonConstructor() {
		$this->person = Person::person("jim", "smith", "1600 Penn Ave", "Pittsburgh", "PA", "123456", "555-123-4567");
		
		$this->assertEquals("jim",$this->person->getFirstName());
		$this->assertEquals("smith",$this->person->getLastName());
		$this->assertEquals("1600 Penn Ave",$this->person->getAddress());
		$this->assertEquals("Pittsburgh",$this->person->getCity());
		$this->assertEquals("PA",$this->person->getState());
		$this->assertEquals("123456",$this->person->getZip());
		$this->assertEquals("555-123-4567",$this->person->getPhone());
	}
	
	/**
	 * Tests Person setFirstName function
	 */
	public function testSetFirstName() {
		$this->person->setFirstName("jim");
		$this->assertEquals("jim",$this->person->getFirstName());
		$this->person->setFirstName("bob");
		$this->assertNotEquals("jim",$this->person->getFirstName());
	}
	
	/**
	 * Tests Person getFirstName function
	 */
	public function testGetFirstName() {
		$this->person->setFirstName("jim");
		$this->assertEquals("jim",$this->person->getFirstName());
	}
	
	/**
	 * Tests Person setLastName function
	 */
	public function testSetLastName() {
		$this->person->setLastName("smith");
		$this->assertEquals("smith",$this->person->getLastName());
		$this->person->setLastName("white");
		$this->assertNotEquals("smith",$this->person->getLastName());
	}
	
	/**
	 * Tests Person getLastName function
	 */
	public function testGetLastName() {
		$this->person->setLastName("smith");
		$this->assertEquals("smith",$this->person->getLastName());
	}
	
	/**
	 * Tests Person setAddress function
	 */
	public function testSetAddress() {
		$this->person->setAddress("1600 Penn Ave");
		$this->assertEquals("1600 Penn Ave",$this->person->getAddress());
		$this->person->setAddress("123 2nd St");
		$this->assertNotEquals("1600 Penn Ave",$this->person->getAddress());
	}
	
	/**
	 * Tests Person getAddress function
	 */
	public function testGetAddress() {
		$this->person->setAddress("1600 Penn Ave");
		$this->assertEquals("1600 Penn Ave",$this->person->getAddress());
	}
	
	/**
	 * Tests Person setCity function
	 */
	public function testSetCity() {
		$this->person->setCity("Pittsburgh");
		$this->assertEquals("Pittsburgh",$this->person->getCity());
		$this->person->setCity("Prague");
		$this->assertNotEquals("Pittsburgh",$this->person->getCity());
	}
	
	/**
	 * Tests Person getCity function
	 */
	public function testGetCity() {
		$this->person->setCity("Pittsburgh");
		$this->assertEquals("Pittsburgh",$this->person->getCity());
	}
	
	/**
	 * Tests Person setState function
	 */
	public function testSetState() {
		$this->person->setState("Pennsylvania");
		$this->assertEquals("Pennsylvania",$this->person->getState());
		$this->person->setState("Colorado");
		$this->assertNotEquals("Pennsylvania",$this->person->getState());
	}
	
	/**
	 * Tests Person getState function
	 */
	public function testGetState() {
		$this->person->setState("Pennsylvania");
		$this->assertEquals("Pennsylvania",$this->person->getState());
	}
	
	/**
	 * Tests Person setZip function
	 */
	public function testSetZip() {
		$this->person->setZip("123456");
		$this->assertEquals("123456",$this->person->getZip());
		$this->person->setZip("789456");
		$this->assertNotEquals("123456",$this->person->getZip());
	}
	
	/**
	 * Tests Person getZip function
	 */
	public function testGetZip() {
		$this->person->setZip("123456");
		$this->assertEquals("123456",$this->person->getZip());
	}
	
	/**
	 * Tests Person setPhone function
	 */
	public function testSetPhone() {
		$this->person->setPhone("555-123-4567");
		$this->assertEquals("555-123-4567",$this->person->getPhone());
		$this->person->setPhone("555-789-1234");
		$this->assertNotEquals("555-123-4567",$this->person->getPhone());
	}
	
	/**
	 * Tests Person getPhone function
	 */
	public function testGetPhone() {
		$this->person->setPhone("555-123-4567");
		$this->assertEquals("555-123-4567",$this->person->getPhone());
	}
}
?>