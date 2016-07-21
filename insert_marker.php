<?php
	$server = 'localhost';
	$database =  'googlemap';
	$username = 'google';
	$password = 'map';		

mysql_set_charset("utf8");

$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

  $name = $_POST['name'];
  $address = $_POST['address'];
  $type = $_POST['type'];
  $lat = $_POST['lat'];
  $lng = $_POST['lng'];
  $rating = $_POST['rating'];

$query = sprintf("INSERT INTO markers " .
         " (id, name, address, lat, lng, type, rating ) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s', '%s','%s');",
         mysql_real_escape_string($name),
         mysql_real_escape_string($address),
         mysql_real_escape_string($lat),
         mysql_real_escape_string($lng),
         mysql_real_escape_string($type),
         mysql_real_escape_string($rating));

$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>
