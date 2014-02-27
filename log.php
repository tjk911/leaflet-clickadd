<?php
	// include("dbConnect.php"); //Connect to SQL

	$username = $_POST['username']; //Username
	$password = $_POST['password']; //Password
	$server = "sctkaitest.db.11227043.hostedresource.com"; //Server


	$con = mysql_connect($server, $username, $password); 
	$dbselected = mysql_select_db("sctkaitest", $con);

	if (!$con)
	{
	 	die('Could not connect: ' . mysql_error());
	} else {
		header("location: index.php"); //Redirect
	}

	//Create SELECT query
	//$qry = "SELECT * FROM `users` WHERE `Username` = '$username' AND `Password` = '" . md5($password) . "'";
	//$result = mysql_query($qry);
	
	//Check whether the query was successful or not
	//if(mysql_num_rows($result) == 1) {
	//	while($row = mysql_fetch_assoc($result)) {
	//		$_SESSION['UID'] = $row['UID']; //Retrieve the UID from the database and put it into a session
	//		$_SESSION['USERNAME'] = $username; //Set the username as a session
	//		session_write_close(); //Close the session
	//		header("location: index.php"); //Redirect
	//	}
	//} else {
	//	$errmsg[] = 'Invalid username or password';
	//	$_SESSION['ERRMSG'] = $errmsg;
	//	session_write_close();
	//	header("location: login.php");
	//	exit();
	//}
?>
