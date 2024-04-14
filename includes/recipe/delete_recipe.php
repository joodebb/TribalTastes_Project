<?php
// Include database connection and session start
include("../utils/dbh.inc.php");
include("../utils/start_session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if recipe_id is provided
    if (isset($_POST['recipe_id'])) {
        // Sanitize the input
        $recipe_id = $_POST['recipe_id'];

        // Delete the recipe from the database
        $statement = $pdo->prepare("DELETE FROM recipe WHERE recipe_id = ?");
        $statement->execute([$recipe_id]);

        // Redirect back to the manage recipe page
        header("Location:/chef.php");
        exit();
    } else {
        // Handle case where recipe_id is not provided
        echo "Error: Recipe ID is missing.";
    }
} else {
    // Handle case where request method is not POST
    echo "Error: Invalid request method.";
}
?>
