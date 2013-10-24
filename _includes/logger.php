<?php
// Insert the path where you unpacked log4php
include_once('log4php/Logger.php');

// Tell log4php to use our configuration file.
$log4php_config_path = $_SERVER['DOCUMENT_ROOT']."/resources/log4php_config.xml";
Logger::configure($log4php_config_path);

// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('default');
$testlog = Logger::getLogger('unittest');
?>