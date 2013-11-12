<?php
	/**
	 * This a basic class for a Person object.
	 * 
	 * @author jim
	 * @version 1.0
	 * @package php_addressbook.entities
	 *
	 */
	class Person {
		/**
		 * First Name of Person
		 * 
		 * @var string
		 */
		private $firstName;
		/**
		 * Last Name of Person
		 * 
		 * @var string
		 */
		private $lastName;
		/**
		 * Address of Person's residence
		 * 
		 * @var string
		 */
		private $address;
		/**
		 * City of Person's residence
		 * 
		 * @var string
		 */
		private $city;
		/**
		 * State of Person's residence
		 * 
		 * @var string
		 */
		private $state;
		/**
		 * Zip of Person's residence
		 * 
		 * @var string
		 */
		private $zip;
		/**
		 * Phone Number of Person
		 * 
		 * @var string
		 */
		private $phone;
		
		/**
		 * Constructor
		 */
		public function __construct() {
			
		}
		
		/**
		 * Constructor
		 * 
		 * @param string $_firstName
		 * @param string $_lastName
		 * @param string $_address
		 * @param string $_city
		 * @param string $_state
		 * @param string $_zip
		 * @param string $_phone
		 */
		public static function person(/*String*/ $_firstName, /*String*/ $_lastName, 
							/*String*/ $_address, /*String*/ $_city, 
							/*String*/ $_state, /*String*/ $_zip, 
							/*String*/ $_phone) {
			$obj = new Person();
							
			$obj->firstName = $_firstName;
			$obj->lastName = $_lastName;
			$obj->address = $_address;
			$obj->city = $_city;
			$obj->state = $_state;
			$obj->zip = $_zip;
			$obj->phone = $_phone;
			
			return $obj;
		}
		
		/**
		 * Gets Person's first name
		 * 
		 * @return string
		 */
		public function getFirstName() {
			return $this->firstName;
		}
		
		/**
		 * Sets Person's first name
		 * 
		 * @param string $_firstName
		 */
		public function setFirstName($_firstName) {
			$this->firstName = $_firstName;
		}
		
		/**
		 * Gets Person's last name
		 * 
		 * @return string
		 */
		public function getLastName() {
			return $this->lastName;
		}
		
		/**
		 * Sets Person's last name
		 * 
		 * @param string $_lastName
		 */
		public function setLastName($_lastName) {
			$this->lastName = $_lastName;
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
		
		/**
		 * Gets Person's phone number
		 * 
		 * @return string
		 */
		public function getPhone() {
			return $this->phone;
		}
		
		/**
		 * Sets Person's phone number
		 * 
		 * @param String $_phone
		 */
		public function setPhone($_phone) {
			$this->phone = $_phone;
		}
	}
?>