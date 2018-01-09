<?php

include 'connect.php';
//include 'average_rating.php';

/*check to see if user already submitted
if($user) {
	//display answers and questions
} else {
*/
$questionID = 1; // change value of question id to our liking
$averageRating = 0;

if(isset($_POST['answerSubmission'])) { //check if form was submitted
	$input = $_POST['submit-answer'];
	$input = mysqli_real_escape_string($conn, $input);
	//create SQL statement to insert acquired answer submitted by user into the database
	$query = "INSERT INTO answers (answer, user_id, question_id) VALUES ('".$input."', '54323', '".$questionID."')"; //replace the values for actual names from database
	//check to see if insert statement worked
	if(mysqli_query($conn, $query)) {
		$sql = "SELECT a.*, ar.user_rating, ac.comment, u.username FROM answers a LEFT JOIN answers_ratings ar ON (a.answer_id=ar.answer_id) LEFT JOIN answers_comments ac ON (a.answer_id=ac.answer_id) LEFT JOIN users u ON (a.user_id=u.user_id)"; //replace the values
		$result = $conn->query($sql);
		$answers = array();

		//Grab from database and display other submissions (if any)
		if ($result->num_rows > 0) {
                //output data of each row
			while($row = $result->fetch_assoc()) {
			    if($row["user_rating"] !=NULL) {
			        $ratingResult = mysqli_query($conn, "SELECT a.answer_id, ar.user_rating FROM answers a LEFT JOIN answers_ratings ar ON (a.answer_id=ar.answer_id) WHERE a.answer_id = 1");
							$num_rows = mysqli_num_rows($ratingResult);

			        while ($ratingRow = $ratingResult->fetch_assoc()) {
			            $totalRating += $ratingRow["user_rating"];
			        }
							$averageRating = $totalRating/$num_rows;
					} else {
						$averageRating = 0;
					}
                $displayAnswer .=
                    "<div class='content'> <b><a href='viewuser.php?u=".$row["user_id"]."'>".$row["username"]."</a> posted answer on ".$row["timestamp"].":</b>"
                    ."<p class='margin'><i>".$row["answer"]."</i></p>"
                    ."<b>Rated: </b>".$averageRating."/5"
                    ."<div class='rating'><span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span></div>"
                    ."<p align='right'><a href='#' class='answer-comment-box' data-pass='".$row["answer_id"]."'>Comment</a></p>
                    </div>";
                if($row["comment"] != NULL) {
                    $commentResult = mysqli_query($conn, "SELECT ac.comment, u.username, u.user_id FROM answers_comments ac LEFT JOIN users u ON (ac.user_id=u.user_id)");

                    while ($commentRow = $commentResult->fetch_assoc()) {
                        $displayAnswer .="<p align='right'><b>commented by <a href='viewuser.php?u=".$commentRow["user_id"]."'>".$commentRow["username"]."</a>: </b> <br> <i>".$commentRow["comment"]."</i></p>";
                    }
                }
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
