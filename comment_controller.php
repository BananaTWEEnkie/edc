<?php

include 'connect.php';

//This will check comments for answer
if(isset($_POST['answerCommentSubmission'])) { //check if form was submitted
	$input = $_POST['comment-text'];
	$answer_id = 1;
    $input = mysqli_real_escape_string($conn, $input);

	//create SQL statement to insert acquired answer submitted by user into the database
	$query = "INSERT INTO answers_comments (user_id, answer_id, comment) VALUES ('54323', '".$answer_id."', '".$input."')";
	//check to see if insert statement worked
	if(mysqli_query($conn, $query)) {
	    echo "Comment has been saved";
	} else {
        echo "Your comment submission was not unsuccessful";
	}
}

//This will check comments for question
if(isset($_POST['questionCommentSubmission'])) { //check if form was submitted
    $input = $_POST['comment-text'];
    $question_id = $_POST['question-id'];
    $input = mysqli_real_escape_string($conn, $input);
    //create SQL statement to insert acquired answer submitted by user into the database
    $query = "INSERT INTO questions_comments (user_id, question_id, comment) VALUES ('54323', '".$question_id."', '".$input."')";
    //check to see if insert statement worked
    if(mysqli_query($conn, $query)) {
        echo "Comment has been saved";
    } else {
        echo "Your comment submission was not unsuccessful";
    }
}

mysqli_close($conn);

?>