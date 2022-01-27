<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>intro to forms</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
		<?php 
		include "functions.php";
		formatInput($_POST);

		$userMessage = "";

		if ( in_array("", $_POST) ) {
			$userMessage = "error-message";
		} else {
			$userMessage = "success-message";

		}
		?>

		<main class="exercise-main">
			<section class="welcome">
				<inner-column>
					<header>
						<h1>pizza party form</h1>

						<h2>do you love <mark>authentic neopolitan pizza?</mark></h2>

						<p>well, <em>we do too</em>. we have a party, and there <strong>will be pizza</strong>. To ensure there are enough pizzas for everyone to eat, fill out this form</p>
					</header>

					<form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
						<label>pizza pies
							<input type="text" name="pizza" min="0">
						</label>

						<label>amount of people
							<input type="text" name="people" min="0">
						</label>

						<input type="submit" name="submit">

					</form>
				</inner-column>
			</section>

			<section class="results">
				<inner-column class ="<?=$userMessage?>">
					hshs
				</inner-column>
			</section>
		</main>
	</body>
</html>