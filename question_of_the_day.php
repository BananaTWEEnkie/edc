<?php

include 'connect.php';

$questionOfTheDay = "1";
$sql = "SELECT question FROM questions WHERE question_id=".$questionOfTheDay; //replace the values

$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
	$displayQuestionOfTheDay = $row['question'];
}

mysqli_close($conn);

?>