<?php

include("dbConnect.php");

if (!$dbselected)
 {
 die('Could not connect to db: ' . mysql_error());
 }
 
$sql="select * from potholes where active=1";
$result = mysql_query($sql);
$count = mysql_num_rows($result);

if($count > 0) {
echo "var myItems = [";
while($row = mysql_fetch_array($result)) {
	echo "[".$row['lat'].", ".$row['lng'].", '".$row['name']."', '".$row['description']."'],";
}
echo "]";
}

?>