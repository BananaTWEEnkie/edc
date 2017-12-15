<?php

include 'connect.php';

/*check to see if user already submitted
if($user) {
	//display answers and questions
} else {
*/

if(isset($_POST['questionSubmission'])) { //check if form was submitted
	$input = $_POST['submit-question'];
	$input = mysqli_real_escape_string($conn, $input);
	//create SQL statement to insert acquired question submitted by user into the database
	$query = "INSERT INTO questions (question, user_id) VALUES ('".$input."', '54323')";
	if(mysqli_query($conn, $query)) {
		$sql = "SELECT q.*, qr.user_rating, qc.comment, u.username FROM questions q LEFT JOIN questions_ratings qr ON (q.question_id=qr.question_id) LEFT JOIN questions_comments qc ON (q.question_id=qc.question_id) LEFT JOIN users u ON (q.user_id=u.user_id) WHERE q.question_id < (SELECT MAX(question_id) FROM questions) AND q.posted=0";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			//output data of each row
			while($row = $result->fetch_assoc()) {
				$displayQuestion .= "<div class='content'>
															<b><a href='viewuser.php?u=".$row["user_id"]."'>".$row["username"]."</a> posted question on ".$row["timestamp"].":</b>"
														 ."<p class='margin'><i>".$row["question"]."</i></p>"
														 ."<b>Rated: </b>".$row["rating"]."/5<br>"
														 ."<p align='right'><a href='#' class='comment-box'>Comment</a></p>
															</div>";
															
				if($row["comment"] != NULL) {
					$result2 = mysqli_query($conn, "SELECT qc.comment, u.username, u.user_id FROM questions_comments qc LEFT JOIN users u ON (qc.user_id=u.user_id)");
					
					while ($row2 = $result2->fetch_assoc()) {
						$displayQuestion .="<p align='right'><b>commented by <a href='viewuser.php?u=".$row2["user_id"]."'>".$row2["username"]."</a>: </b> <br> <i>".$row2["comment"]."</i></p>"; 
					}
				}
			}
		} else {
			echo "You are the first to add a question! Come back later when there are other submissions.";
		}
	} else {
		$displayQuestion = "There was an error submitting your question";
	}
}

mysqli_close($conn);

?>