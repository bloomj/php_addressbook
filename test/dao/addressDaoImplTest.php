<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/entities/address.php');
include_once(getcwd().'/dao/DAOFactory.php');

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
	 * DAOFactory object
	 *
	 * @var DAOFactory
	 */
	private $DAO;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();	
	}
	
	/**
	 * (non-PHPdoc)
	 * @see baseTestCase::setUp()
	 */
	protected function setUp() {
		parent::setUp();
		$this->testlog->trace('Re-initializing Address object');
		
		// get our DAO implementation from our Factory
		$this->DAO = DAOFactory::getInstance();
		$this->assertNotNull($this->DAO);
		$this->addressDAO = $this->DAO->getDAO('iAddressDAO');
		$this->assertNotNull($this->addressDAO);
		
		$this->address = Address::address("1600 Penn Ave", "Pittsburgh", "PA", "123456");
	}
	
	/**
	 * Tests AddressDAO store function
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
	}
	
	/**
	 * Tests AddressDAO function read for file not found exception
	 *
	 * @expectedException Exception
	 * @expectedExceptionMessage File: address_1 does not exist
	 */
	public function testReadFileDNEException()
	{
		// test non-existent Address
		$this->addressDAO->read("1");
	}
	
	/**
	 * Tests AddressDAO read exception
	 */
	public function testReadException() {
		// store address
		$this->addressDAO->store($this->address);
		$address_id = $this->address->getID();
		
		// get file resource to force error
		$file_name = 'address_'.$address_id;
		$handle = fopen($file_name, 'w');
		
		try {
			// try to read address
			$this->address = $this->addressDAO->read($this->address->getID());
		}
		catch(Exception $e) {
			$this->assertEquals("fread(): Length parameter must be greater than 0",$e->getMessage());
		}
		
		fclose($handle);
		
		// delete our test Address
		$this->addressDAO->delete($this->address->getID());
	}
	
	/**
	 * Tests AddressDAO delete exception
	 * 
	 * @expectedException Exception
	 * @expectedExceptionMessage No such file or directory
	 */
	public function testDeleteException() {
		// try to delete Address
		$this->addressDAO->delete("DoesNotExist");
	}
}
?>