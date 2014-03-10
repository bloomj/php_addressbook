<?php
	/**
	 * This a basic class for a Person object.
	 * 
	 * @author jim
	 * @version 1.0
	 * @package php_addressbook.entities
	 *
	 */
	class Person implements Serializable {
		/**
		 * ID of Person
		 *
		 * @var string
		 */
		private $id;
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
		 * @var array
		 */
		private $address;
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
			$this->id = uniqid();
		}
		
		/**
		 * Constructor
		 * 
		 * @param string $_firstName
		 * @param string $_lastName
		 * @param array $_address
		 * @param string $_phone
		 */
		public static function person(/*String*/ $_firstName, /*String*/ $_lastName, 
							/*array*/ $_address, /*String*/ $_phone, /*String*/ $_id = NULL) {
			$obj = new Person();

			$obj->id = $_id;
			// Give address a unique ID if none passed in
			if($obj->id == NULL) {
				$obj->id = uniqid();
			}
			$obj->firstName = $_firstName;
			$obj->lastName = $_lastName;
			$obj->address = $_address;
			$obj->phone = $_phone;
			
			return $obj;
		}
		
		/**
		 * Gets Person's ID
		 *
		 * @return string
		 */
		public function getID() {
			return $this->id;
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
		 * Gets Person's addresses
		 * 
		 * @return array
		 */
		public function getAddress() {
			return $this->address;
		}
		
		/**
		 * Sets Person's addresses
		 * 
		 * @param string array
		 */
		public function setAddress($_address) {
			$this->address = $_address;
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
		
		/**
		 * Serialize the Person object
		 *
		 * (non-PHPdoc)
		 * @see Serializable::serialize()
		 */
		public function serialize() {
			return serialize(
				array(
					'id' => $this->id,
					'firstName' => $this->firstName,
					'lastName' => $this->lastName,
					'address' => $this->address,
					'phone' => $this->phone
				)
			);
		}
		
		/**
		 * Unserialize the Person object
		 *
		 * (non-PHPdoc)
		 * @see Serializable::unserialize()
		 */
		public function unserialize($data) {
			$data = unserialize($data);
		
			$this->id = $data['id'];
			$this->firstName = $data['firstName'];
			$this->lastName = $data['lastName'];
			$this->address = $data['address'];
			$this->phone = $data['phone'];
		}
	}
?>