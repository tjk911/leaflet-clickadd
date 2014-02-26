<?php

include("dbConnect.php");

if (!$dbselected)
 {
 die('Could not connect to db: ' . mysql_error());
 }
 
 
 foreach(array_keys($_POST) as $key)
{
  $clean[$key] = mysql_real_escape_string($_POST[$key]);
}
 
if ($clean['lat']!='') {
$sql="INSERT INTO potholes VALUES ('','".$clean['name']."','".$clean['email']."','".$clean['description']."','".$clean['lat']."','".$clean['lng']."',1,now())";
$result = mysql_query($sql);		
}

?>