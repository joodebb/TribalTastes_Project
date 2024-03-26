<?php 
require_once "includes/config_session.inc.php";
require_once "includes/signup_view.inc.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
    <title>TribalTaste/ Signup Page</title>
</head>
<body>

<section class="menu">
        <div class="nav">
            <div class="logo"><a href="index.php"><img src="assests/images/logo1.png" alt="logo"></a></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="signup.php">Register</a></li>
            </ul>
            

            <li class="nav-item search">
                <form action="#" method="get">
                  <input type="text" placeholder="Search..." name="search">
                  <button type="submit">Search</button>
                </form>

            <li class="nav-item dropdown">
                <a href="#" class="dropbtn">
                  <img src="assests/images/icon.png" alt="Profile">
                </a>
                <div class="dropdown-content">
                    <a href="manage-profile.php">Edit Profile</a>
                    <a href="#">Logout</a>
                  </div>
            </li>
        </div>
    </section>
    <div class=reg>
    <h1> Welcome to TribalTastes</h1>
    </div>
    <div class=register-container>
        <div class="Login-box">
            <h2>Please enter your details</h3>
            <br><br>
            <form action="includes/signup.inc.php" method="post">
            <?php 
            signup_inputs();
          ?>
          <button>Sign up</button>
         
                <p>Do you have an account with us already?</p>
             </form>
            
             <a href="/login.php">Login</a>
             
             <?php 
          check_signup_errors();
        ?>
        </div>
        <div class=login-image>
            <img src="https://images.unsplash.com/photo-1542435503-956c469947f6?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">

        </div>

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
                        <li><a href="#">Contact Us</a></li>
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