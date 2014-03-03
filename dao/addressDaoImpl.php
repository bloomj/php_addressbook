<?php
include_once('iAddressDao.php');
include_once('log4php/Logger.php');

$log4php_config_path = "./resources/log4php_config.xml";
Logger::configure($log4php_config_path);

/**
 * This a basic class for a AddressImpl object.
 *
 * @author jim
 * @version 1.0
 * @package php_addressbook.dao
 *
 */
class AddressImpl implements IAddressDAO {
	protected static $log;
	
	public function __construct() {
		$this->log = Logger::getLogger('unittest');
	}
	
	/**
	 * Create or update an Address object.
	 * 
	 * @param Address $address
	 */
	public function store($address) {
		$this->log->info("Storing address: ".$address->getID());
		
	}
	
	/**
	 * Read an Address object.
	 * 
	 * @param String $id
	 */
	public function read($id) {
		$this->log->info("Reading address: ".$id);
	}
	
	/**
	 * Delete an Address object.
	 * 
	 * @param String $id
	 */
	public function delete($id) {
		$this->log->info("Deleting address: ".$id);
	}
}
?>