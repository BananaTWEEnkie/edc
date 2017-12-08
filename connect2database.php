<?php
	$server = ""; // serverName\instanceName
	$username = "";
	$password = "";
	$link = mssql_connect($server, $username, $password); // Connect to MSSQL with 3 parameters: servername, username & password
	
	if(!$link) {
		die('Something went wrong while connecting to MSSQL');
	} else {
		console.log("it works");
	}
?>