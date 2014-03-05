<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/entities/address.php');
include_once(getcwd().'/dao/addressDaoImpl.php');

/**
 * This is a unit test class for the Address DAO class
 * 
 * @author jim
 * @version 1.0
 * @package php_addressbook.test.dao
 *
 */
class addressDaoImplTest extends baseTestCase
{
	/**
	 * Address object
	 * 
	 * @var Address
	 */
	private $address;
	
	/**
	 * IAddressDAO object
	 *
	 * @var IAddressDAO
	 */
	private $addressDAO;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();	
		$this->addressDAO = new AddressImpl();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see baseTestCase::setUp()
	 */
	protected function setUp() {
		parent::setUp();
		$this->testlog->trace('Re-initializing Address object');
		$this->address = Address::address("1600 Penn Ave", "Pittsburgh", "PA", "123456");
	}
	
	/**
	 * Tests AddressDAOImpl store function
	 */
	public function testStore() {
		// store address
		$this->addressDAO->store($this->address);
		$address_id = $this->address->getID();
		
		// read back in address and verify contents
		$this->address = $this->addressDAO->read($this->address->getID());
		
		$this->assertEquals($address_id, $this->address->getID());
		$this->assertEquals("1600 Penn Ave",$this->address->getAddress());
		$this->assertEquals("Pittsburgh",$this->address->getCity());
		$this->assertEquals("PA",$this->address->getState());
		$this->assertEquals("123456",$this->address->getZip());
		
		// now update the address, store, and re-read to verify contents
		$this->address->setAddress("123 2nd St");
		$this->address->setZip("777");
		
		$this->addressDAO->store($this->address);
		
		$this->address = $this->addressDAO->read($this->address->getID());
		
		$this->assertEquals($address_id, $this->address->getID());
		$this->assertEquals("123 2nd St",$this->address->getAddress());
		$this->assertEquals("777",$this->address->getZip());
		
		// delete our test Address
		$this->addressDAO->delete($this->address->getID());
		
		// test non-existent Address
		$this->addressDAO->read("1");
	}
	
	/**
	 * Tests AddressDAOImpl read function
	 */
	public function testRead() {
		//$this->addressDAO->read("1");
	}
	
	/**
	 * Tests AddressDAOImpl delete function
	 */
	public function testDelete() {
		//$this->addressDAO->delete("1");
	}
}
?>