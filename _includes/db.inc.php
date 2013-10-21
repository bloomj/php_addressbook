<?php 

$prop_file_path = $_SERVER['DOCUMENT_ROOT']."/resources/properties.ini";

if(!file_exists($prop_file_path)) {
	echo 'Cannot find '.$prop_file_path.'<br/>';
}
else {
	echo 'Found '.$prop_file_path.'<br/>';
}

$ini_array = parse_ini_file($prop_file_path, true);

$db_ip = $ini_array["db_config"]["db_ip"];
$db_user = $ini_array["db_config"]["db_user"];
$db_pass = $ini_array["db_config"]["db_pass"];
$db_default = $ini_array["db_config"]["db_default"];

echo 'Got IP: "'.$db_ip.'".<br/>';
//echo 'Got user: "'.$db_user.'".<br/>';
//echo 'Got pass: "'.$db_pass.'".<br/>';
echo 'Got Database: "'.$db_default.'".<br/>';

$db_handle = mysql_connect($db_ip,$db_user,$db_pass,$db_default);
if($db_handle===false) {
	echo 'ERROR: Could not connect to mysql database at "'.$db_ip.'".<br/>';
    if($CONF['debug']) { 
    	mysql_error(); 
    }
}
echo 'Connected successfully to mysql database: "'.$db_ip.'".<br/>'
?>