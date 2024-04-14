<?php
// Include database connection and session start
include("../utils/dbh.inc.php");
include("../utils/start_session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['recipe_id']) && isset($_POST['name']) && isset($_POST['ingredient']) && isset($_POST['description']) && isset($_POST['location']) && isset($_POST['dietary'])) {
        // Sanitize inputs
        $recipe_id = $_POST['recipe_id'];
        $name = $_POST['name'];
        $ingredient = $_POST['ingredient'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $dietary = $_POST['dietary'];

        // Check if photo is uploaded
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $photo_name = $_FILES['photo']['name'];
            $photo_tmp_name = $_FILES['photo']['tmp_name'];
            // Move uploaded file to desired location
            move_uploaded_file($photo_tmp_name, "../../uploads/$photo_name");
            // Update recipe details in the database with the new photo
            $statement = $pdo->prepare("UPDATE recipe SET name=?, ingredient=?, description=?, location=?, dietary=?, photo=? WHERE recipe_id=?");
            $statement->execute([$name, $ingredient, $description, $location, $dietary, $photo_name, $recipe_id]);
        } else {
            // Update recipe details in the database without changing the photo
            $statement = $pdo->prepare("UPDATE recipe SET name=?, ingredient=?, description=?, location=?, dietary=? WHERE recipe_id=?");
            $statement->execute([$name, $ingredient, $description, $location, $dietary, $recipe_id]);
        }

        // Redirect back to the manage recipe page
        header("Location:/chef.php");
        exit();
    } else {
        // Handle case where required fields are missing
        echo "Error: All required fields are not filled.";
    }
} else {
    // Handle case where request method is not POST
    echo "Error: Invalid request method.";
}
?>
