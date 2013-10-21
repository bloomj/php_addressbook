<?php
	include '_includes/db.inc.php';
	$query = "SELECT * FROM person ORDER BY last_name DESC;";
	$result = $db_handle->query($query) or die ("<b>Query failed:</b> ".mysql_error());
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
	?>
</table>