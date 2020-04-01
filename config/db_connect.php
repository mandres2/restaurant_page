<?php

	// Connect to database
	$conn = mysqli_connect('localhost', 'root', 'password', 'restaurant_page');

	// Check connection
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

?>
