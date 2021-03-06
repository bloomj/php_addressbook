<?php
include_once('iAddressDao.php');
include_once('log4php/Logger.php');

$log4php_config_path = "./resources/log4php_config.xml";
Logger::configure($log4php_config_path);

/**
 * This a basic class for a AddressDaoImpl object.
 *
 * @author jim
 * @version 1.0
 * @package php_addressbook.dao
 *
 */
class AddressDaoImpl implements IAddressDAO {
	/**
	 * Logger
	 * @var Logger
	 */
	protected static $log;
	
	/**
	 * Data directory for Address data files
	 * @var String
	 */
	private static $dataDir = "";
	
	public function __construct() {
		$this->log = Logger::getLogger('unittest');
	}
	
	/**
	 * Create or update an Address object.
	 * 
	 * @param Address $address
	 * @throws Exception
	 * @return boolean
	 */
	public function store($address) {
		$this->log->info("Storing address: ".$address->getID());
		
		$success = false;
		$file_name = 'address_'.$address->getID();
		
		$handle = fopen($file_name, 'w') or die('Cannot open file:  '.$file_name);
		$success = fwrite($handle, $address->serialize());
		fclose($handle);
		
		return $success;
	}
	
	/**
	 * Read an Address object.
	 * 
	 * @param String $id
	 * @throws Exception
	 * @return Address
	 * 
	 */
	public function read($id) {
		$this->log->info("Reading address: ".$id);
		
		$file_name = 'address_'.$id;
		
		if(!file_exists($file_name)) {
			throw new Exception("File: ".$file_name." does not exist");
		}
		
		$address = new Address();
		try {
			clearstatcache();
			$handle = fopen($file_name, 'r');
			$address->unserialize(fread($handle,filesize($file_name)));
		}
		catch(Exception $e) {
			$this->log->error("Exception reading file: ".$file_name, $e);
			throw $e;
		}
		
		return $address;
	}
	
	/**
	 * Delete an Address object.
	 * 
	 * @param String $id
	 * @throws Exception
	 * @return boolean
	 */
	public function delete($id) {
		$this->log->info("Deleting address: ".$id);
		
		$success = false;
		$file_name = 'address_'.$id;
		try {
			unlink($file_name);
			$success = true;
		}
		catch(Exception $e) {
			$this->log->error("Exception deleting file: ".$file_name, $e);
			throw $e;
		}
		
		return $success;
	}
}
?>