<?php

$server = "localhost"; // serverName\instanceName
$username = "root";
$password = "root";
$database = "evans_data_corp";

$conn = mysqli_connect($server, $username, $password, $database);

// Check connection

if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
}

?>