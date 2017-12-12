<?php
	include 'moderate_answers.php';
	include 'moderate_questions.php';
	
	//create your own question display. Later replaced to pull from database question by Id
	$questionOfTheDay;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- set browser tab-->
		<title>Moderator</title>
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
		<div id="contest" class="container">
			<div class="row justify-content-md-center">
				<div class="col-sm">
					<h2>code of the day</h2>
				</div>
				<div class="col-sm center">
					<b>moderator page</b>
				</div>
				<div class="col-sm center">
					<a href="#">prizes!</a>
				</div>
			</div>
			<div class="row justify-content-md-center">
				<center>
					<?php $questionOfTheDay; ?>
				</center>
			</div>
			<div class="row justify-content-md-center">
				<div class="col-sm">
					<h3>Moderate answers</h3>
					<form method="post"action="">
						<?php echo $displayAnswer; ?>
						<p> <input type="submit" value="Submit" name="winner-selection"> </p>
					</form>
				</div>
				<div class="col-sm">
					<h3>Moderate questions</h3>
					<form method="post" action="">
						<?php echo $displayQuestion; ?>
						<p> <input type="submit" value="Submit" name="question-selection"> </p>
					</form>
				</div>
			</div>
		</div>
		</div>
		<script>
			
		</script>
	</body>
</html>