<?php

include 'connect.php';

$sql = "SELECT question FROM questions WHERE posted = 1";
$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
	$displayQuestionOfTheDay = $row['question'];
}

mysqli_close($conn);

?>