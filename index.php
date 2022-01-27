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

		// a better var_dump()
		formatInput($_POST);

		$userMessage = $errorMessage = "";
		$pizzaPies = $_POST["pizza"] ?? null;
		$guests = $_POST["guests"] ?? null;

		// check if form is submitted
		if($_SERVER["REQUEST_METHOD"] === "POST") {

			// check array for empty values
			if ( in_array("", $_POST) ) {
				$themeColor = "error-theme";
				$errorTheme = "failed-field";
				$errorMessage = "error, required";
				$errorField = "failed-field";
				$userMessage = "try again";
			} else {
				$themeColor = "success-theme";
				$errorTheme = "passed";
			}
		}
		?>

		<main class="exercise-main">
			<section class="welcome">
				<inner-column>
					<header>
						<h1>pizza party form</h1>

						<h2>do you love <em>authentic neopolitan pizza?</em></h2>

						<p>well, <em>we do too</em>. we have a party, and there <strong>will be pizza</strong>. To ensure there are enough pizzas for everyone to eat, fill out this form</p>

						<p><mark>due to prank calls, orders of 50 or more pizza pies require a phone number</mark></p>
					</header>

					<form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
						<label>pizza pies
							<input type="number" name="pizza" min="1" value="<?=$pizzaPies?>"><span class="<?=$errorTheme?>"> <?=$errorMessage?></span>
						</label>

						<label>amount of people
							<input type="number" name="guests" min="1" value="<?=$guests?>"> <span class="<?=$errorTheme?>"><?=$errorMessage?></span>
						</label>

						<?php if ($pizzaPies >= 50): ?>
							<label>phone number
							<input type="telephone" name="guests" min="1" value=""> <span class="<?=$errorTheme?>"><?=$userMessage?><?=$errorMessage?></span>
						</label>
						<?php endif; ?>

						<input type="submit" name="submit">

					</form>

					<!-- if ($pizzaPies >= 50) {
						//output phone number field
					} -->
				</inner-column>
			</section>

			<section class="results">
				<inner-column class="<?=$themeColor?>">
					<p><?=$userMessage?></p>
				</inner-column>
			</section>
		</main>
	</body>
</html>