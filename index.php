<?php

	// Connect to database
	$conn = mysqli_connect('localhost', 'micah', 'Ma_access1', 'restaurant_page');

	// check connetion
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

	// Write query for all pizzas
	$sql = 'SELECT title, ingredients, id FROM pizzas';

	// Make query and get result:
	$result = mysqli_query($conn, $sql);

	// Fetch the resulting rows as an array:
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// Free result from memory:
	mysqli_free_result($result);

	// Close connection:
	mysqli_close($conn);

	print_r($pizzas);

?>

<!DOCTYPE html>
<html>

	<!-- Injection of header content -->
	<?php include('templates/header.php'); ?>

	<!-- Injection of footer content -->
	<?php include('templates/footer.php'); ?>


</html>