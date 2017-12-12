<?php

include 'connect.php';

$questionOfTheDay = "62";
$sql = "SELECT question FROM questions WHERE questionId=$questionOfTheDay"; //replace the values

$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
	$displayQuestionOfTheDay = $row['question'];
}

mysqli_close($conn);

?>