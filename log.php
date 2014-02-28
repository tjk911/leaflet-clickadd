<?php
	// include("dbConnect.php"); //Connect to SQL
	include("temp.php");
	session_start();
	$username = $_POST['username']; //Username
	$password = $_POST['password']; //Password
	//$server = "#server"; //Server


	$con = mysql_connect($server, $username, $password); 
	$dbselected = mysql_select_db("$db", $con);

	if (!$con)
	{
	 	die('Could not connect: ' . mysql_error());
	} else {
		$_SESSION['admin'] = "yes";
		header("location:login.php?view=admin"); //Redirect
	}
?>
