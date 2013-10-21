<?php 

$ini_array = parse_ini_file("/resources/properties.ini", false);

$db_ip = $ini_array["db_config"]["db_ip"];
$db_user = $ini_array["db_config"]["db_user"];
$db_pass = $ini_array["db_config"]["db_pass"];

echo 'Got IP: "'.$db_ip.'".<br/>';
echo 'Got user: "'.$db_user.'".<br/>';
echo 'Got pass: "'.$db_pass.'".<br/>';

$db_handle = mysql_connect($db_ip,$db_user,$db_pass);
if($db_handle===false) {
	echo 'ERROR: Could not connect to mysql database at "'.$db_ip.'".<br/>';
    if($CONF['debug']) { 
    	mysql_error(); 
    }
}
echo 'Connected successfully to mysql database: "'.$db_ip.'".<br/>'
?>