<?php
include_once(getcwd().'/test/baseTestCase.php');
include_once(getcwd().'/dao/DAOFactory.php');

/**
 * This is a unit test class for the DAO Factory class
 * 
 * @author jim
 * @version 1.0
 * @package php_addressbook.test.dao
 *
 */
class daoFactoryTest extends baseTestCase
{
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
		
		// get our DAO implementation from our Factory
		$this->DAO = DAOFactory::getInstance();
		$this->assertNotNull($this->DAO);
	}
	
	/**
	 * Tests DAOFactory getDAO function
	 */
	public function testGetDAO() {
		$dao = $this->DAO->getDAO('iAddressDAO');
		$this->assertNotNull($dao);
		$this->assertInstanceOf('IDAO',$dao);
		$this->assertInstanceOf('iAddressDao',$dao);
		
		$dao = $this->DAO->getDAO('iPersonDAO');
		$this->assertNotNull($dao);
		$this->assertInstanceOf('IDAO',$dao);
		$this->assertInstanceOf('iPersonDao',$dao);
	}
	
	/**
	 * Tests DAOFactory getAddressDAO function
	 */
	public function testGetAddressDAO() {
		$dao = $this->DAO->getAddressDAO();
		$this->assertNotNull($dao);
		$this->assertInstanceOf('IDAO',$dao);
		$this->assertInstanceOf('iAddressDao',$dao);
	}
	
	/**
	 * Tests DAOFactory getPersonDAO function
	 */
	public function testGetPersonDAO() {
		$dao = $this->DAO->getPersonDAO();
		$this->assertNotNull($dao);
		$this->assertInstanceOf('IDAO',$dao);
		$this->assertInstanceOf('iPersonDao',$dao);
	}
}
?>