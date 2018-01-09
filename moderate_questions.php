<?php

include 'connect.php';

//Order by recenccy
$sql = "SELECT q.*, qr.user_rating, u.username FROM questions q LEFT JOIN questions_ratings qr ON (q.question_id=qr.question_id) LEFT JOIN users u ON (q.user_id=u.user_id) WHERE posted = 0 ORDER BY user_rating DESC, timestamp DESC";
$result = $conn->query($sql);

//Grab from database and display other submissions (if any)
if ($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		$displayQuestion .= "<div class='content'>
													<b><a href='viewuser.php?u=".$row["user_id"]."'>".$row["username"]."</a> posted question on ".$row["timestamp"].":</b>"
												 ."<p class='margin'><i>".$row["question"]."</i></p>"
												 ."<b>Rated: </b>".$row["rating"]."/5<br>"
												 ."<input type='checkbox' class='radio' name='postQuestion[]' value='".$row['question_id']."'>
													 <label for='postQuestion[]'>Post this question</label>
													 </div>";
	}
} else {
	$displayQuestion = "There are currently no submissions. Check back later!";
}

if (isset($_POST['question-selection'])) {
	if(!empty($_POST['postQuestion'])) {
		//Loop to store and display values of individual checked checkbox
		foreach($_POST['postQuestion'] as $questionId){
			//Set all posted to 0 value 
			$queryPosted = "UPDATE questions SET posted = 0; UPDATE questions SET posted = 1 WHERE question_id=".$questionId.";";  //the question for code of the day changes to selected by moderator

			if(mysqli_multi_query($conn, $queryPosted)) {
				echo "<p class='center'>Question posted</p>";
			} else {
				echo "There was an error submitting questions";
			}
		}
	}
}

mysqli_close($conn);

?>