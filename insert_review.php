<?php
	$server = 'localhost';
	$database =  'googlemap';
	$username = 'google';
	$password = 'map';		


$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

mysql_set_charset("utf8");
// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

  $reviewtext = $_POST['reviewtext'];
  $marker_id = $_POST['marker_id'];
  $rating = $_POST['rating'];

$query = sprintf("INSERT INTO review " .
         " (id, marker_id, text, rating, user_id ) " .
         " VALUES (NULL, '%d', '%s', '%d', '%d');",
         mysql_real_escape_string($marker_id),
         $reviewtext,
         mysql_real_escape_string($rating),
         5);

$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>
