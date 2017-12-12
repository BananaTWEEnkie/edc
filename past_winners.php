<?php

include 'connect.php';

$sql = "SELECT * FROM answers WHERE winner = 1"; //replace the values
$result = $conn->query($sql);

//Grab from database and display other submissions (if any)
if ($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		$displayPastWinner .= "<div class='content'>
														<b><a href='viewuser.php?u=".$row["userId"]."'>".$row["userId"]."</a> posted answer on ".$row["timestamp"].":</b>"
													 ."<p class='margin'><i>".$row["answer"]."</i></p>"
													 ."<b>Rated: </b>".$row["rating"]."/5<br>
														 </div>";
	}
} else {
	$displayPastWinner = "No one won!";
}

mysqli_close($conn);

?>