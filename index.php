<?php
	include('config/db_connect.php');
	// Connect to database
	$conn = mysqli_connect('localhost', 'root', 'Ma_access1', 'restaurant_page');

	// Check connection
	if(!$conn) {
		echo 'Connection error: ' . mysqli_connect_error();
	}

	// Write query for all pizzas
	$sql = 'SELECT title, ingredients, id FROM pizzas';

	// Make query and get result
	$result = mysqli_query($conn, $sql);

	// Fetch the resulting rows as an array:
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// Free result from memory
	mysqli_free_result($result);

	// Close connection
	mysqli_close($conn);

	// This line of code will print on the front-end an array [that is connected to our current phpMyAdmin DB], that will allow us to cycle through
	// print_r(explode(',', $pizzas[0]['ingredients']));

	// print_r($pizzas);

?>

<!DOCTYPE html>
<html>

	<!-- Injection of header content -->
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Pizzas</h4>

	<div class="container">
		<div class="row">
			<!-- For code lines 44 -> 63 add a colon and end with the tag ```endforeach;``` -->
			<?php foreach($pizzas as $pizza): ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
					<img src="img/pizza.svg" class="pizza">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']) ?></h6>
							<ul>
								<!-- This line of code provides the array that we are cycling through -->
								<?php foreach(explode(',', $pizza['ingredients']) as $ing) { ?>
									<li><?php echo  htmlspecialchars($ing)?></li>
								<?php } ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a href="details.php?id=<?php echo $pizza['id']?>" class="brand-text">More Information</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

			<?php if(count($pizzas) >= 3):  ?>
				<!-- Test configuration: <p>	There are two or more pizzas </p> -->
			<?php  else:  ?>
				<!-- Test configuration: <p> There are less than 3 pizzas </p> -->
			<?php endif; ?>

		</div>
	</div>

	<!-- Injection of footer content -->
	<?php include('templates/footer.php'); ?>

</html>