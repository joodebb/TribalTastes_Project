<?php 

// Check if a session is not already active
include("./utils/start_session.php");


// Check if the user is logged in

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
  try {
    // GET form data
    include("./dbh.inc.php");
    include("./actions/auth_check.php");
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $nationality = $_POST["nationality"];
    $gender = $_POST["gender"];
    
   
   

    // Check if "user" session variable is set
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User session not set.");
    }

    // Write the SQL Script to update to database

    $sql = "UPDATE users SET first_name = ?, last_name = ?, date_of_birth = ?, nationality = ?, gender =  WHERE id = ?";

    $result = $pdo->prepare($sql);
    $result->execute([$first_name, $last_name, $date_of_birth, $nationality, $gender, $_SESSION['user_id']]);

    header("Location: ../recipe.php");
    exit; // Ensure no further code execution after redirection
  } catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
  }
}
?>
