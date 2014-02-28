<?php
	//sql.php
	include("temp.php");
	// $server = "#server";
	// $user = "#user";
	// $pass = "#pw";

	$con = mysql_connect($server, $user, $pass); 
	$dbselected = mysql_select_db("$db", $con);

	if (!$con)
	{
	 	die('Could not connect: ' . mysql_error());
	}

?>
