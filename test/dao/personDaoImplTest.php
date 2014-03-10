<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/entities/person.php');
include_once(getcwd().'/dao/personDaoImpl.php');

/**
 * This is a unit test class for the Person DAO class
 * 
 * @author jim
 * @version 1.0
 * @package php_addressbook.test.dao
 *
 */
class personDaoImplTest extends baseTestCase
{
	/**
	 * Person object
	 * 
	 * @var Person
	 */
	private $person;
	
	/**
	 * IPersonDAO object
	 *
	 * @var IPersonDAO
	 */
	private $personDAO;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();	
		$this->personDAO = new PersonDaoImpl();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see baseTestCase::setUp()
	 */
	protected function setUp() {
		parent::setUp();
		$this->testlog->trace('Re-initializing Person object');
		$this->personDAO = new PersonDaoImpl();
		$this->person = Person::person("jim", "smith", $this->getAddresses(), "555-123-4567");
	}
	
	/**
	 * Tests PersonDAOImpl store function
	 */
	public function testStore() {
		// store person
		$this->personDAO->store($this->person);
		$person_id = $this->person->getID();
		
		// read back in person and verify contents
		$this->person = $this->personDAO->read($this->person->getID());
		
		$this->assertEquals($person_id, $this->person->getID());
		$this->assertEquals("jim",$this->person->getFirstName());
		$this->assertEquals("smith",$this->person->getLastName());

		$addArray = $this->person->getAddress();
		$this->assertNotEmpty($addArray);
		$this->assertEquals("1600 Penn Ave",$addArray[1]->getAddress());
		$this->assertEquals("Pittsburgh",$addArray[1]->getCity());
		$this->assertEquals("PA",$addArray[1]->getState());
		$this->assertEquals("123456",$addArray[1]->getZip());
		
		$this->assertEquals("555-123-4567",$this->person->getPhone());
		
		// now update the person, store, and re-read to verify contents
		$this->person->setFirstName("james");
		$this->person->setPhone("555-777-6123");
		
		$this->personDAO->store($this->person);
		
		$this->person = $this->personDAO->read($this->person->getID());
		
		$this->assertEquals($person_id, $this->person->getID());
		$this->assertEquals("james",$this->person->getFirstName());
		$this->assertEquals("555-777-6123",$this->person->getPhone());
		
		// delete our test person
		$this->personDAO->delete($this->person->getID());
	}
	
	/**
	 * Tests PersonDAOImpl function read for file not found exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage File: person_1 does not exist
	 */
	public function testReadFileDNEException()
	{
		// test non-existent person
		$this->personDAO->read("1");
	}
	
	/**
	 * Tests PersonDAOImpl read exception
	 */
	public function testReadException() {
		// store person
		$this->personDAO->store($this->person);
		$person_id = $this->person->getID();
		
		// get file resource to force error
		$file_name = 'person_'.$person_id;
		$handle = fopen($file_name, 'w');
		
		try {
			// try to read person
			$this->person = $this->personDAO->read($this->person->getID());
		}
		catch(Exception $e) {
			$this->assertEquals("fread(): Length parameter must be greater than 0",$e->getMessage());
		}
		
		fclose($handle);
		
		// delete our test person
		$this->personDAO->delete($this->person->getID());
	}
	
	/**
	 * Tests PersonDAOImpl delete exception
	 * 
	 * @expectedException Exception
	 * @expectedExceptionMessage No such file or directory
	 */
	public function testDeleteException() {
		// try to delete person
		$this->personDAO->delete("DoesNotExist");
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