<?php

include 'connect.php';

//Order by recency
$sql = "SELECT * FROM questions ORDER BY rating DESC, timestamp DESC";
$result = $conn->query($sql);

//Grab from database and display other submissions (if any)
if ($result->num_rows > 0) {
	//output data of each row
	while($row = $result->fetch_assoc()) {
		$displayQuestion .= "<div class='content'>
													<b><a href='viewuser.php?u=".$row["userId"]."'>".$row["userId"]."</a> posted question on ".$row["timestamp"].":</b>"
												 ."<p class='margin'><i>".$row["question"]."</i></p>"
												 ."<b>Rated: </b>".$row["rating"]."/5<br>"
												 ."<input type='checkbox' id='postQuestion[]' value='".$row['questionId']."'>
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
			$queryPosted = "UPDATE answers SET posted=1 WHERE questionId=$questionId"; 
			
			if(mysqli_query($conn, $queryWinner)) {
				echo "Question posted";
			} else {
				echo "There was an error submitting your winners";
			}
		}
	}
}

mysqli_close($conn);

?>