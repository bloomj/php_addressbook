<?php 

extract(parse_ini_file("./resources/properties.ini"));

$db_handle = mysql_connect($db_ip,$db_user,$db_pass);
if($db_handle===false) {
	echo 'ERROR: Could not connect to mysql database at "'.$db_ip.'".<br/>';
    if($CONF['debug']) { 
    	mysql_error(); 
    }
}
echo 'Connected successfully to mysql database: "'.$db_ip.'".<br/>'
?>