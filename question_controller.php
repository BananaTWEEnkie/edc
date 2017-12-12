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
	$query = "INSERT INTO questions (question, userId) VALUES ('$input', '54321')";
	if(mysqli_query($conn, $query)) {
		$sql = "SELECT * FROM questions WHERE questionId < (SELECT MAX(questionId) FROM questions)";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			//output data of each row
			while($row = $result->fetch_assoc()) {
				$displayQuestion .= "<div class='content'>
															<b><a href='viewuser.php?u=".$row["userId"]."'>".$row["userId"]."</a> posted question on ".$row["timestamp"].":</b>"
														 ."<p class='margin'><i>".$row["question"]."</i></p>"
														 ."<b>Rated: </b>".$row["rating"]."/5<br>
															</div>";
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