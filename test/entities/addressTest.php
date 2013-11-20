<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/entities/address.php');

/**
 * This is a unit test class for the Address class
 * 
 * @author jim
 * @version 1.0
 * @package php_addressbook.test.entities
 *
 */
class addressTest extends baseTestCase
{
	/**
	 * Address object
	 * 
	 * @var Address
	 */
	private $address;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();	
		$this->address = new Address();
	}
	
	/**
	 * Tests Address overloaded constructor
	 */
	public function testPersonConstructor() {
		$this->address = Address::address("1600 Penn Ave", "Pittsburgh", "PA", "123456");
		
		$this->assertEquals("1600 Penn Ave",$this->address->getAddress());
		$this->assertEquals("Pittsburgh",$this->address->getCity());
		$this->assertEquals("PA",$this->address->getState());
		$this->assertEquals("123456",$this->address->getZip());
	}
	
	/**
	 * Tests Address setAddress function
	 */
	public function testSetAddress() {
		$this->address->setAddress("1600 Penn Ave");
		$this->assertEquals("1600 Penn Ave",$this->address->getAddress());
		$this->address->setAddress("123 2nd St");
		$this->assertNotEquals("1600 Penn Ave",$this->address->getAddress());
	}
	
	/**
	 * Tests Address getAddress function
	 */
	public function testGetAddress() {
		$this->address->setAddress("1600 Penn Ave");
		$this->assertEquals("1600 Penn Ave",$this->address->getAddress());
	}
	
	/**
	 * Tests Address setCity function
	 */
	public function testSetCity() {
		$this->address->setCity("Pittsburgh");
		$this->assertEquals("Pittsburgh",$this->address->getCity());
		$this->address->setCity("Prague");
		$this->assertNotEquals("Pittsburgh",$this->address->getCity());
	}
	
	/**
	 * Tests Address getCity function
	 */
	public function testGetCity() {
		$this->address->setCity("Pittsburgh");
		$this->assertEquals("Pittsburgh",$this->address->getCity());
	}
	
	/**
	 * Tests Address setState function
	 */
	public function testSetState() {
		$this->address->setState("Pennsylvania");
		$this->assertEquals("Pennsylvania",$this->address->getState());
		$this->address->setState("Colorado");
		$this->assertNotEquals("Pennsylvania",$this->address->getState());
	}
	
	/**
	 * Tests Address getState function
	 */
	public function testGetState() {
		$this->address->setState("Pennsylvania");
		$this->assertEquals("Pennsylvania",$this->address->getState());
	}
	
	/**
	 * Tests Address setZip function
	 */
	public function testSetZip() {
		$this->address->setZip("123456");
		$this->assertEquals("123456",$this->address->getZip());
		$this->address->setZip("789456");
		$this->assertNotEquals("123456",$this->address->getZip());
	}
	
	/**
	 * Tests Address getZip function
	 */
	public function testGetZip() {
		$this->address->setZip("123456");
		$this->assertEquals("123456",$this->address->getZip());
	}
}
?>