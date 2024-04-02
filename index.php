
<?php 

// Check if session is started already or start session
if (session_status() !== PHP_SESSION_ACTIVE) {
// Start session
session_start();
}

include("./includes/utils/start_session.php");

// Check if the user is logged in
$isLogged = isset($_SESSION['user_id']);

// Check if the user is an admin
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;

// Set link dynamically
$loginLink = $isLogged ? "" : '<li><a href="../login.php">Login</a></li>';
$recipeLink = $isLogged ? '<li><a href="../recipe.php">Recipe</a></li>' : "";
$registerLink = $isLogged ? "" : '<li><a href="../signup.php">Register</a></li>';
$logoutLink = $isLogged ? '<li><a href="../includes/logout/logout.inc.php">Logout</a></li>' : "";
$dashboardLink = $isAdmin ? '<li><a href="../dashboard.php">Dashboard</a></li>' : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
    <title>TribalTastes</title>
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
                <li><a href="login.php">Login</a></li>
                <li><a href="chef.php">Chef</a></li>
                <?php echo $dashboardLink; ?>
                <?php echo $logoutLink; ?>
              
            </ul>  
        </div>
        <div class="welcome">
            <h1> Welcome to TribalTastes Food Blog <h1>

        </div>

    </section>
    <section class="images">
            <div class="content">
                <h1><a href="recipe.php">Browse Trending Recipes.....</a></h1> 
            </div>
            
                <div class="container">
                    <div class="food-images">
                    <a href="recipe.php"><img src="assests/images/food9.jpeg" alt="image1"></a>
                    <a href="recipe.php"><img src="assests/images/food3.jpeg" alt="image2"></a>
                    <a href="recipe.php"><img src="assests/images/agusie stew.jpg" alt="image3"></a>
                    <a href="recipe.php"><img src="assests/images/image13.jpg" alt="image4"></a>
                    <a href="recipe.php"><img src="assests/images/food6.jpeg" alt="image5"></a>
                    <a href="recipe.php"><img src="assests/images/image6.jpg" alt="image6"></a>
                    <a href="recipe.php"><img src="assests/images/food.jpeg" alt="image7"></a>
                    <a href="recipe.php"><img src="assests/images/food8.jpeg" alt="image8"></a>
                    <a href="recipe.php"><img src="assests/images/image5.jpg" alt="image9"></a>
                    <a href="recipe.php"><img src="assests/images/image10.jpg" alt="image10"></a>
                    <a href="recipe.php"><img src="assests/images/image.jpg" alt="image11"></a>
                    <a href="recipe.php"><img src="assests/images/image4.jpg" alt="image12"></a>
                    <a href="recipe.php"><img src="assests/images/image9.jpg" alt="image10"></a>
                    <a href="recipe.php"><img src="assests/images/image2.jpg" alt="image10"></a>
                    <a href="recipe.php"><img src="assests/images/gob3.jpg" alt="image10"></a>
                </div>
                </div>
           </section>


        <div class="search-container">
        <div class="box">
                <div class="search">
               
               <div class="search-recipes">
                
                <h3> Search All  Recipes</h3>
                <form class="recipes">
              <input type="text" placeholder="Enter keywords...">
               <button type="submit">Search</button>
            </form>
          </div>
         </div>
       </div>

       <div class="box">
         <div class="newsletter">
         <h3>Subscribe for Our Newsletter</h3>
         <form class= "news-letter">
        <input type="email" id="email" name="email" placeholder="Your email address" required>
        <button type="submit">Subscribe</button>
    </form>
    </div>
   </div>
   </div>

            

            <div class=" middle">
                <h2><a href="chef-profile.php">Explore our Chef </a></h2>
            </div>
            
           <div class="chef-container">
            <div class=" chef">
            <img src="assests/images/chef1.jpeg" alt="Chef 1">
            <h4>Chef Marcus "SizzleMaster" </h4>
            <p>A BBQ aficionado with a knack for infusing global flavors into his 
               smoked delights.Originating from Texas, Marcus's love for grilling
               began at family gatherings where he mastered the art of seasoning 
               and smoking meats</p>
        </div>

        <div class="chef">
        <img src="assests/images/chef2.jpeg" alt="Chef 2">
        <h4>Chef Kwame "SoulfulPalate"</h4>
        <p>Asante - Born and raised in Accra, Ghana, Kwame's cooking style is a celebration
          of West African flavors with a modern twist. His dishes pay homage to his roots, 
           incorporating bold spices and fresh, locally sourced ingredients.</p>
    </div>

    <div class="chef">
        <img src="assests/images/image7.jpg" alt="Chef 3">
        <h4>Chef Aisha "FlavorAlchemy"</h4>
        <p>A self-taught chef from Nigeria, Aisha's culinary creations are a reflection of her rich 
            cultural heritage. With a passion for experimenting with exotic spices and herbs, 
            she crafts dishes that tantalize the taste buds and ignite the senses.</p>
    </div>


        </div>

        <div class="trends">
            <h2><a href="#">Whats happening on TribalTastes</a></h2>
           </div>

              <div class="grids">
              <main class="grid-container">

                <section class="grid-33">
                    <div>
                    <h4 class="three">Our favourite African Recipe</h4>
                    <img class="one" src="assests/images/gob3.jpg">
                    <h5>Gari and Beans aka Gobe </h5>
                    <P>The staple make up a complete protein.</P>
                </div>
                </section>

                <section class="grid-40">
                    <h3 >visit our youtube channel for videos</h3>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/RF7xafO-DwU?si=hD95vLRBODCtf1yW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                 </section>

    
              </main>
                 
                
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