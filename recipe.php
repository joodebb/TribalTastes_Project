
<?php

include "./includes/utils/start_session.php";
include "./includes/utils/dbh.inc.php";

if (isset($_GET['name'])) {
    $recipe_name = $_GET['name'];

    // Prepare and execute the SQL query to fetch the recipe
    $sql_recipe = $pdo->prepare("SELECT * FROM recipe WHERE name = ?");
    $sql_recipe->execute([$recipe_name]);
    $recipe = $sql_recipe->fetch(PDO::FETCH_ASSOC);

    if (!$recipe) {
        die("Recipe not Found");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
    <title>Recipe</title>
</head>
<body>
    <section class="menu">

        <div class="nav">
            <div class="logo"><a href="index.php"><img src="assests/images/logo1.png" alt="logo"></a></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>

    </section>

    <div class="view">
    <h1>View Details of Recipe Below</h1>
 </div>

<div class="content">
<div class="mylist">
    <h1><?php echo  $recipe['name']; ?></h1>
    <img src='./uploads/<?php echo $recipe['photo'] ?>' alt='image1'>
    <h1>Ingredients</h1>
    <p><?php echo  $recipe['ingredient']; ?></p>
    <h2>Step by Step Instructions</h2>
    <p><?php echo  $recipe['description']; ?></p>
    <h2>Cuisine Type</h2>
    <p><?php echo  $recipe['location']; ?></p>
    <h2>Allergen Information</h2>
    <p><?php echo  $recipe['dietary']; ?></p>
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

