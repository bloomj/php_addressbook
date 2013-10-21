<?php
	include '_includes/db.inc.php';
	try {
		$result = $db_handle->query("SELECT * FROM person ORDER BY last_name DESC;");
	}
	catch (Exception $e) {
		echo 'Caught exception: '.$e->getMessage()."<br/>";
	}
?>
<table>
	<tr>
		<th>First Name</th>
        <th>Last Name</th>
    </tr>
    <?php
    	while ($row = $result->fetch_assoc()) {
        	echo "<tr>\n";
       	 	echo "<td>${row['first_name']}</td>\n";
        	echo "<td>${row['last_name']}</td>\n";
        	echo "</tr>\n";
    	}
    mysql_free_result($result);
	?>
</table>