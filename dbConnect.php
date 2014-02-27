<?php
	//sql.php
	$server = "sctkaitest.db.11227043.hostedresource.com";
	$user = "sctkaitest";
	$pass = "sRDa@Qs5!OFp3F";

	$con = mysql_connect($server, $user, $pass); 
	$dbselected = mysql_select_db("sctkaitest", $con);

	if (!$con)
	{
	 	die('Could not connect: ' . mysql_error());
	}

?>
