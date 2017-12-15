<?php
	include 'answer_controller.php';
	include 'question_controller.php';
	include 'past_winners.php';
	include 'question_of_the_day.php';
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
		<!-- Import jquery UI -->
		<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
		<script src="https://use.fontawesome.com/68d0806e1b.js"></script>
	</head>
	<body>
			<div id="contest" class="container">
				<div class="row justify-content-md-center">
					<div class="col-sm">
						<h2>code of the day contest</h2>
					</div>
					<div class="col-sm center">
						<?php
							if ($user == "") {
								echo '<a href="#">register to enter</a>';
							}
						?>
					</div>
					<div class="col-sm center">
						<a href="#">prizes!</a>
					</div>
				</div>
				<div class="row">
					<div class="col-sm">
						<form method="post" action="">
							<!-- <input type="hidden" name="user_id" value=""> -->
							<b>Question:</b> What does this code do?
							<div id="code-of-the-day">
								<?php 
									echo $displayQuestionOfTheDay;
								?>
							</div>
							<center>
							<textarea name="submit-answer" id="submit-answer" placeholder="answer..." rows="4" cols="50"></textarea>
							<p><b>Submit to rate answer</b></p>
							<input type="submit" value="Submit Answer" name="answerSubmission" id="answerSubmission" disabled>
							<p> </p>
							</center>
							<!-- Once user submits an answer, they can view, comment and rate other people's answers  -->
							<?php echo $displayAnswer;	?>
						</form>
					</div>
					<div class="col-sm">
						<div class="row">
							<div class="col-sm">
								<h3>Yesterday's Winners</h3>
								<p> <b>Question: What this this code do? </b> </p>
								<?php echo $displayPastWinner; ?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm">
								<form method="post" action="">
								<!-- <input type="hidden" name="user_id" value=""> -->
									<center>
									<h3>Submit question</h3>
									<textarea name="submit-question" id="submit-question" placeholder="submit new question" rows="4" cols="50"></textarea>
									<p><b>Submit to rate questions</b></p>
									<input type="submit" value="Submit Questions" name="questionSubmission" id="questionSubmission" disabled>
									<p></p>
									</center>
									<!-- Once user submits a question, they can rate other submissions -->
									<div class="containers">
										<?php echo $displayQuestion; ?>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>