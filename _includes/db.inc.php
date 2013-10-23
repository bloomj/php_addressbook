<?php 
$logger_path = $_SERVER['DOCUMENT_ROOT']."/_includes/logger.php";
include_once($logger_path);

$prop_file_path = $_SERVER['DOCUMENT_ROOT']."/resources/properties.ini";

if(!file_exists($prop_file_path)) {
	$log->warn('Cannot find '.$prop_file_path);
}
else {
	$log->trace('Found '.$prop_file_path);
}

$ini_array = parse_ini_file($prop_file_path, true);

$db_ip = $ini_array["db_config"]["db_ip"];
$db_user = $ini_array["db_config"]["db_user"];
$db_pass = $ini_array["db_config"]["db_pass"];
$db_default = $ini_array["db_config"]["db_default"];

$log->trace('Got IP: '.$db_ip);
//$log->trace('Got user: '.$db_user);
//$log->trace('Got pass: '.$db_pass);
$log->trace('Got Database: '.$db_default);

$db_handle = new mysqli($db_ip,$db_user,$db_pass,$db_default);
if($db_handle===null) {
	$log->error('Could not connect to mysql database at "'.$db_ip);
}
$log->trace('Connected successfully to mysql database: '.$db_ip);									
?>