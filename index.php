<?php

	// Connect to database
	$conn = mysqli_connect('localhost', 'root', 'Ma_access1', 'restaurant_page');

	// check connection
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

	// explode(',', $pizzas[0]['ingredients']);

?>

<!DOCTYPE html>
<html>

	<!-- Injection of header content -->
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Pizza</h4>

	<div class="container">
		<div class="row">

			<?php foreach($pizzas as $pizza){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']) ?></h6>
							<ul>
								<?php foreach(explode(',', $pizza['ingredients']) as $ing) { ?>
									<li><?php echo  htmlspecialchars($ing)?></li>
								<?php } ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a href="#" class="brand-text">More Information</a>
						</div>
					</div>
				</div>

			<?php } ?>



		</div>
	</div>

	<!-- Injection of footer content -->
	<?php include('templates/footer.php'); ?>


</html>