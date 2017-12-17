<?php

include 'connect.php';

if(isset($_POST['commentSubmission'])) { //check if form was submitted
	$input = $_POST['comment-text'];
	//create SQL statement to insert acquired answer submitted by user into the database
	$query = "INSERT INTO question_comments (answer, user_id, question_id) VALUES ('".$input."', '54323', '".$questionID."')";
	//check to see if insert statement worked
	if(mysqli_query($conn, $query)) {
	} else {
		$displayQuestion = "There was an error submitting your question";
	}

}

mysqli_close($conn);

?>