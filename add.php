<?php

    if(isset($_POST['submit'])){
        // check mail
        if(empty($_POST['email'])) {
            echo 'An email is required <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo 'email must be a valid e-mail address';
            }
        }
        // check title
        if(empty($_POST['title'])) {
            echo 'A title is required <br />';
        } else {
            echo htmlspecialchars($_POST['title']);
        }
        // check ingredients
        if(empty($_POST['ingredients'])) {
            echo 'At least one ingredient is required <br />';
        } else {
            echo htmlspecialchars($_POST['ingredients']);
        }
    } // end of POST check

?>

<!DOCTYPE html>
<html>

	<!-- Injection of header content -->
	<?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class = "center">Add a Pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label>Your E-mail:</label>
            <input type="text" name="email">
            <label>Pizza Title:</label>
            <input type="text" name="title">
            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients">
                <div class="center">
                    <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
                </div>
        </form>
    </section>

	<!-- Injection of footer content -->
	<?php include('templates/footer.php'); ?>


</html>