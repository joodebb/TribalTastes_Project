<?php
// Include database connection
include("./includes/utils/dbh.inc.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user deletion form is submitted
    if (isset($_POST['user_id'])) {
        $userId = $_POST['user_id'];
        try {
            // Prepare and execute the SQL statement to delete the user
            $statement = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $statement->execute([$userId]);
            // Redirect back to the admin dashboard or any desired page after deletion
            header("Location: delete_confirmation.php");
            exit();
        } catch (PDOException $e) {
            echo "Error deleting user: " . $e->getMessage();
        }
    }

    // Check if recipe deletion form is submitted
    if (isset($_POST['recipe_id'])) {
        $recipeId = $_POST['recipe_id'];
        try {
            // Prepare and execute the SQL statement to delete the recipe
            $statement = $pdo->prepare("DELETE FROM recipe WHERE recipe_id = ?");
            $statement->execute([$recipeId]);
            // Redirect back to the admin dashboard or any desired page after deletion
            header("Location:dashboard.php");
            exit();
        } catch (PDOException $e) {
            echo "Error deleting recipe: " . $e->getMessage();
        }
    }
} else {
    // If the form is not submitted via POST method, redirect back to the admin dashboard
    header("Location: dashboard.php");
    exit();
}
?>