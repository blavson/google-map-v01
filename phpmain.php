<?php
	$server = 'localhost';
	$database =  'googlemap';
	$username = 'google';
	$password = 'map';		

$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "select * from markers 
				left join marker_type on type = marker_type.id";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
 while ($row = mysql_fetch_array($result)){
	echo $row['name'];
 	}

?>
