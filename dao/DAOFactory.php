<?php
// include all DAO php files
include_once('addressDaoImpl.php');
include_once('personDaoImpl.php');
include_once('log4php/Logger.php');

/**
 * This is a basic Factory Singleton for DAO implementations.
 * 
 * @author jim
 * @version 1.0
 * @package php_addressbook.dao
 *
 */
class DAOFactory {
	/**
	 * Logger
	 * 
	 * @var Logger
	 */
	protected static $log;
	
	/**
	 * Array of DAO configuration properties
	 * 
	 * @var Array
	 */
	protected static $daoProperties;
	
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @staticvar Singleton $instance The *Singleton* instances of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     * *Singleton* via the 'new' operator from outside of this class.
     */
    protected function __construct() {
    	self::$log = Logger::getLogger('unittest');
    	
    	// initialize dao_config
    	$prop_file_path = getcwd()."/resources/dao_config.ini";
    	$ini_array = parse_ini_file($prop_file_path, true);
    	if(is_array($ini_array["dao_config"])) {
    		foreach($ini_array["dao_config"] as $key => $value) {
    			self::$log->trace('Found key: '.$key.' | value: '.$value);
    			self::$daoProperties[$key] = $value;
    		}
    	}
    }
    
    /**
     * Get a DAO Implementation from configuration
     * 
     * @param String $iName
     * @return IDAO
     */
    public function getDAO($iName) {
    	self::$log->trace('Returning class: '.self::$daoProperties[$iName].' for interface: '.$iName);
    	return new self::$daoProperties[$iName];
    }
    
    /**
     * Get Address DAO Implementation
     * 
     * @return IAddressDAO
     */
    public function getAddressDAO() {
    	return new AddressDaoImpl();
    }
    
    /**
     * Get Person DAO Implementation
     * 
     * @return IPersonDAO
     */
    public function getPersonDAO() {
    	return new PersonDaoImpl();
    }
}