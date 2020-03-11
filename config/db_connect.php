<?php

	// Connect to database
	$conn = mysqli_connect('localhost', 'root', 'Ma_access1', 'restaurant_page');

	// Check connection
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

?>