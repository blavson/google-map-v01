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
header('Content-Type: application/json');
// Select all the rows in the markers table
	$query = "select * from markers, review where markers.id = review.marker_id " .
				"and markers.id = " . $_GET['markerid'] .
				" order by review.rating desc";
	$result = mysql_query($query);

	$retval =[]; 

while($row = mysql_fetch_array($result))
{
	$review_text = $row['text'];
	$rating= $row['rating'];
	$marker_name = $row['name'];
	$marker_address = $row['address'];
    
	$retval [] = 
				[
					'marker_name' => $marker_name,
					'marker_address' => $marker_address,
					'review_text' => $review_text,
					'rating' => $rating,
			];
}
echo json_encode($retval);

?>
