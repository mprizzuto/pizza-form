<?php 
function formatInput(mixed $input) {
	echo "<pre>";
	var_dump($input);
	echo "</pre>";
}

function sanitizeInput($input) {
	$input = trim($input);
	$input = htmlspecialchars($input);
	$input = stripslashes($input);
	return $input;
}
?>