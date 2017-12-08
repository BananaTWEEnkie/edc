<?php
	require_once("connect2database.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Set browser tab-->
		<title>Code of the Day</title>
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<!-- Set meta. Specifies the character encoding for the HTML document
			  The more widely a character encoding is used, the better
			  chance the browser will understand it.
			  UTF = Unicode transformation format -->
		<meta charset="utf-8" />
		<!-- Configure viewport to better display web content on all browsers -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Code of the Day by Evans Data Corp">
		<!-- Import bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!-- Import custom css AFTER you import bootstrap -->
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<!-- Import google font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	</head>
	<body>
			<h2>code of the day</h2>
			<div id="code-of-the-day" class="container">
				<div class="row justify-content-md-center">
					<div class="col-sm">
						<form action="#" onsubmit="submit-answer">
							<b>Question:</b> What does this code do?
							<textarea name="answer" placeholder="answer..." rows="4" cols="50"></textarea>
							<p><b>Submit to rate answer</b></p>
							<!-- Once user submits an answer, they can view, comment and rate other people's answers  -->
							
						</form>
					</div>
					<div class="col-sm">
						<h3>Yesterday's Winners</h3>
						<p> <b>Question: What this this code do? </b> </p>
						<ul class="past-winners">
							<li>
							<li><?php ?>
						
					</div>
				</div>
				<div class="row justify-content-md-center">
					<div class="col-sm">
					</div>
					<div class="col-sm">
						<form action="#" onsubmit="submit-answer">
							<h3>Submit question</h3>
							<textarea name="submit-question" placeholder="submit new question" rows="4" cols="50"></textarea>
							<b>Submit to rate questions</b>
							<!-- Once user submits a question, they can rate other submission -->
						</form>
					</div>
			</div>
		</form>
		<script>
			
		</script>
	</body>
</html>