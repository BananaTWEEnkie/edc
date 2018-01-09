<?php

include 'connect.php';

$averageRating = 0;

$sql = "SELECT a.*, ar.user_rating, u.username FROM answers a LEFT JOIN answers_ratings ar ON (a.answer_id=ar.answer_id) LEFT JOIN users u ON (a.user_id=u.user_id) WHERE winner=1"; //replace the values
$result = $conn->query($sql);

//Grab from database and display other submissions (if any)
if ($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		$displayPastWinner .= "<div class='content'>
														<b><a href='viewuser.php?u=".$row["user_id"]."'>".$row["username"]."</a> posted answer on ".$row["timestamp"].":</b>"
													 ."<p class='margin'><i>".$row["answer"]."</i></p>"
													 ."<b>Rated: </b>".$averageRating."/5<br>
														 </div>";
	}
} else {
	$displayPastWinner = "No one won!";
}

mysqli_close($conn);

?>