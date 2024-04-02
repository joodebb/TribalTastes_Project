<?php
// Include the database connection
include "../utils/databaseConfig.php";

// Verify that user_id is set 
if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    try {
        $delete_user_script = "DELETE FROM users WHERE id = ?";
        $delete_user_stmt = $pdo->prepare($delete_user_script);
        $delete_user_stmt->execute([$user_id]);

        // Redirect back to the dashboard after successful deletion
        header("Location: ../../../../dashboard.php");
        exit();
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    }
} else {
    // Redirect to the dashboard if user_id is not provided or empty
    header("Location: ../../../../dashboard.php");
    exit();
}
?>