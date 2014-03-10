<?php
include_once('iPersonDao.php');
include_once('log4php/Logger.php');

$log4php_config_path = "./resources/log4php_config.xml";
Logger::configure($log4php_config_path);

/**
 * This a basic class for a PersonDaoImpl object.
 *
 * @author jim
 * @version 1.0
 * @package php_addressbook.dao
 *
 */
class PersonDaoImpl implements IPersonDAO {
	/**
	 * Logger
	 * @var Logger
	 */
	protected static $log;
	
	/**
	 * Data directory for Person data files
	 * @var String
	 */
	private static $dataDir = "";
	
	public function __construct() {
		$this->log = Logger::getLogger('unittest');
	}
	
	/**
	 * Create or update an Person object.
	 * 
	 * @param Person $address
	 * @throws Exception
	 * @return boolean
	 */
	public function store($person) {
		$this->log->info("Storing person: ".$person->getID());
		
		$success = false;
		$file_name = 'person_'.$person->getID();
		
		$handle = fopen($file_name, 'w') or die('Cannot open file:  '.$file_name);
		$success = fwrite($handle, $person->serialize());
		fclose($handle);
		
		return $success;
	}
	
	/**
	 * Read an Person object.
	 * 
	 * @param String $id
	 * @throws Exception
	 * @return Person
	 * 
	 */
	public function read($id) {
		$this->log->info("Reading person: ".$id);
		
		$file_name = 'person_'.$id;
		
		if(!file_exists($file_name)) {
			throw new Exception("File: ".$file_name." does not exist");
		}
		
		$person = new Person();
		try {
			clearstatcache();
			$handle = fopen($file_name, 'r');
			$person->unserialize(fread($handle,filesize($file_name)));
		}
		catch(Exception $e) {
			$this->log->error("Exception reading file: ".$file_name, $e);
			throw $e;
		}
		
		return $person;
	}
	
	/**
	 * Delete an Person object.
	 * 
	 * @param String $id
	 * @throws Exception
	 * @return boolean
	 */
	public function delete($id) {
		$this->log->info("Deleting person: ".$id);
		
		$success = false;
		$file_name = 'person_'.$id;
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