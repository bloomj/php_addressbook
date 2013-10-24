<?php
// Insert the path where you unpacked log4php
include_once('log4php/Logger.php');

// Tell log4php to use our configuration file.
$root_path = "/var/www";
if($_SERVER['DOCUMENT_ROOT'] != "") {
	$root_path = $_SERVER['DOCUMENT_ROOT'];
}
$log4php_config_path = $root_path."/resources/log4php_config.xml";
Logger::configure($log4php_config_path);

// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('default');
$testlog = Logger::getLogger('unittest');
?>