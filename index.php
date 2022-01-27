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
		// formatInput($_POST);

		$userMessage = $errorMessage = "";
		$pizzaPies = $_POST["pizza"] ?? null;
		$guests = $_POST["guests"] ?? null;
		// $slicesPerPerson = $pizzaPies / $guests;

		// check if form is submitted
		if($_SERVER["REQUEST_METHOD"] === "POST") {

			// check array for empty values
			if ( in_array("", $_POST) ) {
				// css strings
				$themeColor = "error-theme";
				$errorTheme = "failed-field";

				// user message for form field
				$errorMessage = "error, required";

				// user message for results section
				$userMessage = "you entered nothing, try again";
			} else {
				// css strings
				$themeColor = "success-theme";
				$errorTheme = "passed";

				$userMessage = "your results are";
				$slicesPerPerson = $pizzaPies / $guests;

				// calculate guest amount. singlar VS plural case
				if ((int) $guests === 1 ) {
					// $userMessage = "there's {$guests} person coming, they ordered {$pizzaPies} pizza pies. they get {$slicesPerPerson} slices each";
					$userMessage = "there's {$guests} person coming, they ordered {$pizzaPies} pizza pies. they get all the pizza";
				} else {
					// $userMessage = "there's {$guests} people coming, they ordered {$pizzaPies} pizza pies. They get {$slicesPerPerson} slices each";
					$userMessage = "there's {$guests} people coming, they ordered {$pizzaPies} pizza pies. they get" . ceil($slicesPerPerson) . "slices each";
				}
			}
		}
		?>

		<main class="exercise-main">
			<section class="welcome">
				<inner-column>
					<header>
						<h1 class="main-title">pizza party form</h1>

						<h2 class="customer-cta">do you love <em>authentic neopolitan pizza?</em></h2>

						<p>well, <em>we do too</em>. we have a party, and there <strong>will be pizza</strong>. To ensure there are enough pizzas for everyone to eat, fill out this form</p>

					</header>

					<form method="post" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">
						<label>pizza pies
							<input type="number" name="pizza" min="1" max="100" value="<?=$pizzaPies?>"><span class="<?=$errorTheme?>"> <?=$errorMessage?></span>
						</label>

						<label>amount of people
							<input type="number" name="guests" min="1" max="100" value="<?=$guests?>"> <span class="<?=$errorTheme?>"><?=$errorMessage?></span>
						</label>

						<input type="submit" name="submit">

					</form>

					<!-- if ($pizzaPies >= 50) {
						//output phone number field
					} -->
				</inner-column>
			</section>

			<?php if(in_array("Submit", $_POST)): ?>
				<section class="results">
					<inner-column class="<?=$themeColor?>">
						<h2>pizza party info</h2>
						<p><?=$userMessage?></p>
					</inner-column>
				</section>
			<?php endif; ?>
		</main>
	</body>
</html>