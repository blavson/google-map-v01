<?php
	$server = 'localhost';
	$database =  'googlemap';
	$username = 'google';
	$password = 'map';		

function parseToXML($htmlStr)
{
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}


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

if($_POST) {
		$query = "select * from marker_type"; 
		$result = mysql_query($query);

	$retval =[]; 

while($row = mysql_fetch_array($result))
{
	$id = $row['id'];
	$name = $row['name'];

	$retval [] = [
					'name' => $name,
					'id' => $id,
			];

}  
		echo json_encode($retval);
}
else
{

	$query = "select * from markers 
				left join marker_type  mt on id = mt.type";
	$result = mysql_query($query);

	$retval =[]; 

while($row = mysql_fetch_array($result))
{
	$name = $row['name'];
	$address = $row['address'];
	$type = $row['type'];
	$lat = $row['lat'];
	$lng = $row['lng'];
	$rating = $row['rating'];
	$id = $row['id'];

	$retval [] = [
					'id' => $id,
					'name' => $name,
					'address' => $address,
					'type' => $type,
					'latitude' => $lat,
					'longtitude' => $lng,
					'rating' => $rating,
			];

}  
echo json_encode($retval);
}

?>
