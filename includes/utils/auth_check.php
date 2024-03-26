?php 

// Check for session start
include("./start_session.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("Location: ../../login.php");
    exit;
}

// echo "Session User ID: " . $_SESSION['user_id'];
