<?php 

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files
include "./includes/utils/start_session.php";

// Check if the user is logged in
$isLogged = isset($_SESSION['user_id']);

// Check if the user is an admin
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;

// Set dynamic links
$loginLink = $isLogged ? "" : '<li><a href="../login.php">Login</a></li>';
$recipeLink = $isLogged ? '<li><a href="../recipe.php">Recipe</a></li>' : "";
$registerLink = $isLogged ? "" : '<li><a href="../signup.php">Register</a></li>';
$logoutLink = $isLogged ? '<li><a href="../includes/logout/logout.inc.php">Logout</a></li>' : "";
$dashboardLink = $isAdmin ? '<li><a href="../dashboard.php">Dashboard</a></li>' : '';

// Include database connection
include "./includes/utils/dbh.inc.php";

try {
    // Check if $pdo is a valid object
    if (!$pdo instanceof PDO) {
        throw new Exception("Database connection is not valid.");
    }

    // Initialize SQL query
    $sql = "SELECT * FROM recipe WHERE 1=1"; // Initial query

    // Check if location filter is selected
    if (isset($_GET['location']) && !empty($_GET['location'])) {
        $location = $_GET['location'];
        $sql .= " AND location = :location";
    }

    // Check if dietary filter is selected
    if (isset($_GET['dietary']) && !empty($_GET['dietary'])) {
        $dietary = $_GET['dietary'];
        $sql .= " AND dietary = :dietary";
    }

    // Prepare SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters if they exist
    if (isset($location)) {
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
    }
    if (isset($dietary)) {
        $stmt->bindParam(':dietary', $dietary, PDO::PARAM_STR);
    }

    // Execute SQL statement
    $stmt->execute();

    // Fetch recipes
    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Log database error
    error_log("Database error: " . $e->getMessage());
    echo "Oops! Something went wrong. Please try again later.";
} catch (Exception $e) {
    // Log other errors
    error_log("Error: " . $e->getMessage());
    echo "Oops! Something went wrong. Please try again later.";
} finally {
    // Close database connection
    $pdo = null;
}
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
                <li><a href="contact.php">Contact Us</a></li>
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
    
    <div class="end">
        <h2>Browse Trending Recipes.....</h2> 
    </div>
    
    <section class="images">
        <div class="content1">
            <!-- Content here -->
        </div>
        <div class="container">
            <div class="food-images">
                <?php 
                    // Loop through recipes and display them
                    foreach($recipes as $recipe) {
                        echo "<div>";
                        echo "<a href='recipe.php?name={$recipe["name"]}'><img src='./uploads/{$recipe["photo"]}' alt='image1'></a>";
                        echo "<p>{$recipe["name"]}</p>";
                        echo "</div>";
                    }                        
                ?>
            </div>
        </div>
    </section>

    <div class="search-container">
        <div class="box">
            <div class="search">
                <div class="search-recipes">
                
                    <h3>Filter Below</h3>
                    <form class="recipes" action="" method="GET"> <!-- Remove action attribute to submit to the same page -->
                        <label for="location">Cuisine Location:</label>
                        <select id="location" name="location">
                            <option value="">All</option>
                            <option value="African">African</option>
                            <option value="Europe">Europe</option>
                            <option value="Asia">Asia</option>
                            <option value="Middle-East">Middle East</option>
                            <option value="North-America">North America</option>
                            <option value="South-America">South America</option>
                        </select>
                        <label for="dietary">Category:</label>
                        <select id="dietary" name="dietary">
                            <option value="">All</option>
                            <option value="Vegan">Vegan</option>
                            <option value="Non-Vegan">Non-Vegan</option>
                        </select>
                        <button type="submit" name="filter">Filter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="newsletter">
                <h3>Subscribe</h3>
                <p>Sign up for EMAIL UPDATES<br>  get a free ebook with our top 25 recipes</p><br>
                <form class="news-letter">
                    <input type="first_name" id="first_name" name="first_name" placeholder="First Name" required>
                    <br><br>
                    <input type="email" id="email" name="email" placeholder="Your email address" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>

    <div class="middle">
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
        <h2><a href="#"> TribalTastes Blog</a></h2>
    </div>

    <div class="grids">
        <main class="grid-container">
            <section class="grid-33">
                <div>
                    <h4 class="three">Our favourite African Recipe</h4>
                    <p>"Gobe" offers a delightful fusion of flavors, combining the comforting simplicity of gari and beans into a hearty and satisfying dish that warms both the stomach and the soul.</p>
                    <img class="one" src="assests/images/gob3.jpg">
                    <h5>Gari and Beans aka Gobe </h5>
                    <p>The staple make up a complete protein.</p>
                    <h5><a href="http://localhost:3000/recipe.php?name=Gobe"> Get the recipe</a></h5>
                </div>
            </section>
            <section class="grid-40">
                <h3>Follow us on  youtube</h3>
                <p> follow the live video tutorial to prepare your favourite Jollof Rice and Beef Sauce.we'll take you step-by-step through the process of creating this mouthwatering ensemble, ensuring that you can savor the essence of West African culinary tradition in the comfort of your own kitchen</p>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/RF7xafO-DwU?si=hD95vLRBODCtf1yW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </section>
        </main>
    </div>

    <footer>
        <div class="footer-container">
            <div class="social-media"></div>
            <h4><a href="contact.php">Contact Us</a></h4>
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
