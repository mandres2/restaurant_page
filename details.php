<?php

include('config/db_connect.php');

//POST Method:
if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        // If the connection is a success: redirect the user.
        header('Location: index.php');
    } {
        // If this is a failure:
        echo 'query error: ' . mysqli_error($conn);
    }

}

// Check GET Requests id Parameter
    if(isset($_GET['id'])){

        // This line of code provides "escaping" from any sensitive SQL characters thus protecting our database.
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // Make SQL
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        // Get the query result
        $result = mysqli_query($conn, $sql);

        // Fetch the result in an array format:
        // Note: mysqli_fetch_assoc() method is used to fetch one particular row from the SQL Database and this will be set in an 'associative array.'
        // To establish the following method, you must create a variable first and let it equal to the method

        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        // Test to see if the PHP code works with interacting with the database:

            // print_r($pizza);

        // If you see the following code displayed on the front-end then the relation with the MySQL Database works.

        /*
        Array
        (
            [id] => 1
            [title] => Vegetarian Pizza Supreme
            [ingredients] => tomato, cheese, tofu
            [email] => test@gmail.com
            [created_at] => 2020-03-10 20:53:47
        )
        */
    }

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<div class="container center grey-text">
    <?php if($pizza): ?>

        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
        <p><?php echo date($pizza['created_at']); ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

        <!--DELETE FORM-->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>

    <?php else: ?>

        <h5>Error. No such pizza exists.</h5>

    <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>

</html>
