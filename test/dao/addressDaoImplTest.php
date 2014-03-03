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
		$this->address = new Address();
		$this->addressDAO = new AddressImpl();
	}
	
	/**
	 * Tests AddressDAOImpl store function
	 */
	public function testStore() {
		$this->addressDAO->store($this->address);
	}
	
	/**
	 * Tests AddressDAOImpl read function
	 */
	public function testRead() {
		$this->addressDAO->read("1");
	}
	
	/**
	 * Tests AddressDAOImpl delete function
	 */
	public function testDelete() {
		$this->addressDAO->delete("1");
	}
}
?>