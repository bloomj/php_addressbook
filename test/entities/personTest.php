<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/entities/person.php');
include_once(getcwd().'/entities/address.php');

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
		$this->person = Person::person("jim", "smith", $this->getAddresses(), "555-123-4567");
		
		$this->assertEquals("jim",$this->person->getFirstName());
		$this->assertEquals("smith",$this->person->getLastName());
		
		$addArray = $this->person->getAddress();
		$this->assertEquals("1600 Penn Ave",$addArray[1]->getAddress());
		$this->assertEquals("Pittsburgh",$addArray[1]->getCity());
		$this->assertEquals("PA",$addArray[1]->getState());
		$this->assertEquals("123456",$addArray[1]->getZip());
		
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
		$this->person->setAddress($this->getAddresses());
		
		$addArray = $this->person->getAddress();
		$this->assertEquals("1600 Penn Ave",$addArray[1]->getAddress());
		$addArray[1]->setAddress("123 2nd St");
		$this->assertNotEquals("1600 Penn Ave",$addArray[1]->getAddress());
	}
	
	/**
	 * Tests Person getAddress function
	 */
	public function testGetAddress() {
		$this->person->setAddress($this->getAddresses());
		
		$addArray = $this->person->getAddress();
		$this->assertEquals("1600 Penn Ave",$addArray[1]->getAddress());
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
	
	/**
	 * Generate some addresses
	 * 
	 * @return multitype:array Address
	 */
	private function getAddresses() {
		$address1 = Address::address("1600 Penn Ave", "Pittsburgh", "PA", "123456");
		$address2 = Address::address("456 Main Ave", "Munich", "OK", "567123");
		$address3 = Address::address("123 2nd St", "Kona", "HI", "933326");
		
		$addressArray = array(
			1 => $address1,
			2 => $address2,
			3 => $address3
		);
		
		return $addressArray;
	}
}
?>