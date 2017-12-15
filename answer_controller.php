<?php

include 'connect.php';

/*check to see if user already submitted
if($user) {
	//display answers and questions
} else {
*/
$questionID = 1; // change value of question id to our liking

if(isset($_POST['answerSubmission'])) { //check if form was submitted
	$input = $_POST['submit-answer'];
	$input = mysqli_real_escape_string($conn, $input);
	//create SQL statement to insert acquired answer submitted by user into the database
	$query = "INSERT INTO answers (answer, user_id, question_id) VALUES ('".$input."', '54323', '".$questionID."')"; //replace the values for actual names from database
	//check to see if insert statement worked
	if(mysqli_query($conn, $query)) {
		$sql = "SELECT a.*, ar.user_rating, u.username FROM answers a LEFT JOIN answers_ratings ar ON (a.answer_id=ar.answer_id) LEFT JOIN users u ON (a.user_id=u.user_id) WHERE a.answer_id < (SELECT MAX(answer_id) FROM answers)"; //replace the values
		$result = $conn->query($sql);
		
		//Grab from database and display other submissions (if any)
		if ($result->num_rows > 0) {
			//output data of each row
			while($row = $result->fetch_assoc()) {
				$displayAnswer .= "<div class='content'>
														<b><a href='viewuser.php?u=".$row["user_id"]."'>".$row["username"]."</a> posted answer on ".$row["timestamp"].":</b>"
													 ."<p class='margin'><i>".$row["answer"]."</i></p>"
													 ."<b>Rated: </b>".$row["rating"]."/5"
													 ."<p align='right'><a href='#'>Comment</a></p>
														 </div>";
			}
		} else {
			echo "You are the first to answer! Come back later when there are other submissions.";
		}
	} else {
		$displayAnswer = "There was an error submitting your answer.";
	}
}
//}

mysqli_close($conn);
	
?>