<?php 
require_once "includes/utils/config_session.inc.php";
require_once "includes/signup/signup_view.inc.php";
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
                <li><a href="chef.php">Chef</a></li>
            </ul>
            

           
            </li>
        </div>
    </section>
    <div class=reg>
    <h1> Welcome to TribalTastes</h1>
    </div>
    <div class=register-container>
        <div class="Login-box">
            <h2>Please Register here</h3>
            <br><br>
            <form action="includes/signup/signup.inc.php" method="post">
            <?php 
            signup_inputs();
          ?>

          <style>
    .signup-input-container {
        display: flex;
        align-items: center;
    }

    .signup-input-container label {
        margin-right: 20px;
    }
</style>
          
          <button>Sign up</button>
         
                <p>Do you have an account with us already?</p>
             </form>
            
             <a href="/login.php">Login</a>
             
             <?php 
          check_signup_errors();
        ?>
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