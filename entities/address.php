<?php
/**
 * This a basic class for a Adddress object.
 *
 * @author jim
 * @version 1.0
 * @package php_addressbook.entities
 *
 */
class Address {
	/**
	 * Address of Address
	 *
	 * @var string
	 */
	private $address;
	/**
	 * City of Address
	 *
	 * @var string
	 */
	private $city;
	/**
	 * State of Address
	 *
	 * @var string
	 */
	private $state;
	/**
	 * Zip of Address
	 *
	 * @var string
	 */
	private $zip;

	/**
	 * Constructor
	 */
	public function __construct() {
			
	}

	/**
	 * Constructor
	 *
	 * @param string $_address
	 * @param string $_city
	 * @param string $_state
	 * @param string $_zip
	 */
	public static function address(/*String*/ $_address, /*String*/ $_city,
			/*String*/ $_state, /*String*/ $_zip) {
			$obj = new Address();
				
			$obj->address = $_address;
			$obj->city = $_city;
			$obj->state = $_state;
			$obj->zip = $_zip;
				
			return $obj;
	}

	/**
	 * Gets Person's address
	 *
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets Person's address
	 *
	 * @param string $_address
	 */
	public function setAddress($_address) {
		$this->address = $_address;
	}

	/**
	 * Gets Person's city
	 *
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets Person's city
	 *
	 * @param string $_city
	 */
	public function setCity($_city) {
		$this->city = $_city;
	}

	/**
	 * Gets Person's state
	 *
	 * @return string
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Sets Person's state
	 *
	 * @param string $_state
	 */
	public function setState($_state) {
		$this->state = $_state;
	}

	/**
	 * Gets Person's zip code
	 *
	 * @return string
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets Person's zip code
	 *
	 * @param string $_zip
	 */
	public function setZip($_zip) {
		$this->zip = $_zip;
	}
}
?>