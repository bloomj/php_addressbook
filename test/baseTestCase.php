<?php
include_once('log4php/Logger.php');

$log4php_config_path = "/var/www/resources/log4php_config.xml";
Logger::configure($log4php_config_path);

class baseTestCase extends PHPUnit_Framework_TestCase
{
	protected static $testlog;

	public function __construct() {
		$this->testlog = Logger::getLogger('unittest');
	}
	
	public static function setUpBeforeClass() {
		$testlog = Logger::getLogger('unittest');
		$testlog->trace('Setting up simpleTest class');
	}

	public static function tearDownAfterClass() {
		$testlog = Logger::getLogger('unittest');
		$testlog->trace('Tearing down simpleTest class');
	}

	protected function setUp() {
		$this->testlog->trace('Setting up function');
	}

	protected function tearDown() {
		$this->testlog->trace('Tearing down function');
	}
}
?>