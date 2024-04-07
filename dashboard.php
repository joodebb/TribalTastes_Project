<?php 

// Check for session start
session_start();
include("./includes/utils/dbh.inc.php");

// Check if the user is logged in
try {

    if (isset($_SESSION['user_id'])) {

        $user_id = $_SESSION['user_id'];
        
        $statement = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $statement->execute([$user_id]);
        
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        // echo($user['is_admin']);

        // Display Admin Dashboard if the user is an admin

        if($user['is_admin'] === 1) {
          ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
    <title>Admin Dashboard</title>
</head>
<body>

<section class="menu">
        <div class="nav">
            <div class="logo"><a href="index.php"><img src="assests/images/logo1.png" alt="logo"></a></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="signup.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="chef.php">Chef</a></li>
                <?php echo $logoutLink; ?>
        </ul>  
        </section>
        <div class="panel">
        <h1>Admin Dashboard</h1>
       
    
        <?php include("./Components/dashboard-component.php"); ?>
       <?php include("delete.php");?>

        </div>
<footer>
    <div class="footer-container">
        <div class="social-media"></div>
        <h4><a href="#">Contact Us</a></h4>

        <div class="footer-links">
            <a href="#"><img class="five" src="assests/images/facebook.png" alt="Facebook"></a>
            <a href="#"><img class="five" src="assests/images/twitter.png" alt="Twitter"></a>
            <a href="#"><img class="five" src="assests/images/youtube.png" alt="YouTube"></a>
            <a href="#"><img class="five" src="assests/images/telegram.png" alt="telegram"></a>
        </div>
       
    </div>

    <div class="footer-grid">
        <div class="footer-grid-item">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="footer-grid-item">
            <ul>
                <li><a href="#">Cookie Policy</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Terms & Conditions</a></li>
            </ul> 
        </div>

        <h4 >TM & Copyright 2024 @ TribalTastes. All rights reserved </h4>
        </div>
       

 </footer>
</body>
</html>

<?php 
      } else {
          echo "<h1>You are restricted from this page</h1>";
      }
    } else { 
        // Redirect to the login page
        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
