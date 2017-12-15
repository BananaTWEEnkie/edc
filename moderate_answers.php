<?php

include 'connect.php';

//order by recentcy
$sql = "SELECT a.*, ar.user_rating, u.username FROM answers a LEFT JOIN answers_ratings ar ON (a.answer_id=ar.answer_id) LEFT JOIN users u ON (a.user_id=u.user_id) ORDER BY user_rating DESC, timestamp DESC";
$result = $conn->query($sql);

//Grab from database and display other submissions (if any)
if ($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		//check to see if an answer is already declared winner. If it hasn't, moderater can view it
		if($row['winner']== false) {
			$displayAnswer .= "<div class='content'>
														<b><a href='viewuser.php?u=".$row["user_id"]."'>".$row["username"]."</a> posted answer on ".$row["timestamp"].":</b>"
													 ."<p class='margin'><i>".$row["answer"]."</i></p>"
													 ."<b>Rated: </b>".$row["rating"]."/5<br>"
													 ."<input type='checkbox' name='declareWinner[]' value='".$row['answer_id']."'>
														 <label for='declareWinner[]'>Declare winner</label>
														 </div>";
		}
	}
} else {
	$displayAnswer = "There are currently no submissions. Check back later!";
}

if (isset($_POST['winner-selection'])) {
	if(!empty($_POST['declareWinner'])) {
		//Loop to store and display values of individual checked checkbox
		foreach($_POST['declareWinner'] as $winner){
			$queryWinner = "UPDATE answers SET winner=1 WHERE answer_id=".$winner; 
			
			if(mysqli_query($conn, $queryWinner)) {
				echo "Declared winner(s)";
			} else {
				echo "There was an error submitting your winners";
			}
		}
	}
}

mysqli_close($conn);

?>