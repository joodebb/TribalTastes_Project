<?php 

// Start session
// Check if session is started already or start session
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Start session
    session_start();
    }
    
// include connection to database
include("./actions/auth_check.php");
include("./includes/utils/start_session.php");
include("./includes/utils/dbh.in.php");

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


<?php 
session_start();
include("./actions/auth_check.php");
include("./includes/utils/dbh.inc.php");


try {
  // Check for user_id
  if (isset($_SESSION['user_id'])) {
    // select user from the database
    $user_id = $_SESSION['user_id'];
    // To prevent sql injection
    $statement = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $statement->execute([$user_id]);
    // execute task
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Display user's profile if there is a user or display an error page if there is no user
    if ($user) {
      ?>
      

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
    <title>Chef</title>
</head>
<body>

<section class="menu">

<div class="nav">
    <div class="logo"><a href="index.php"><img src="assests/images/logo1.png" alt="logo"></a></div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">about</a></li>
        <li><a href="#">Contact Us</a></li>
        <?php echo $dashboardLink; ?>
        <?php echo $logoutLink; ?>
    </ul>

</div>

</section>


  <div class="container">
      <section class="profile">
    
          <div class="profile-info">
              <p>Welcome  Chef </strong> <?php echo $user['first_name']; ?></p>
        
          </div>
  </div>


  <div class="tab">
  <button class="tablinks" onclick="openTab(event, 'ViewRecipes')">View  Recipes</button>
  <button class="tablinks" onclick="openTab(event, 'AddRecipe')">Add Recipe</button>
  <button class="tablinks" onclick="openTab(event, 'ManageRecipe')">Manage Recipe</button>
</div>

<div id="ViewRecipes" class="tabcontent">
  <h3>View My Recipes</h3>
  <?php
  try {
    // Check for user_id
    if (isset($_SESSION['user_id'])) {
        // Select recipes' name and photo from the database for the logged-in user
        $user_id = $_SESSION['user_id'];
        $statement = $pdo->prepare("SELECT name, photo FROM recipe WHERE chef_id = ?");
        $statement->execute([$user_id]);
        $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($recipes) {
            // Display each recipe's name and picture
            foreach ($recipes as $recipe) {
                // Output recipe name and photo
                echo "<h2>{$recipe['name']}</h2>";
                echo "<img src='../../uploads/{$recipe['photo']}' alt='{$recipe['name']}'>";
                echo "<hr>";
            }
        } else {
            echo "<p>No recipes found for this user.</p>";
        }
    } else {
        header("Location: login.php");
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
</div>

<div id="AddRecipe" class="tabcontent">
  <h3>Add Recipe</h3>
  <form action="/includes/recipe/upload_recipe.php" method="post" enctype="multipart/form-data">
    <label for="name">Recipe Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $recipe['name']; ?>"><br>
    
    <label for="ingredient">Ingredient:</label><br>
    <textarea id="ingredient" name="ingredient" cols="30" rows="10" ></textarea>
    <br><br>


    <label for="description">Description:</label><br>
    <textarea id="description" name="description" cols="50" rows="10" ></textarea>
    <br><br>

    <label for="location">Location:</label>
    <select  input type ="text" id="location" name="location" value="<?php echo $recipe['location']; ?>"><br>
    <option value="">-- Select One --</option>
    <option value="African">African</option>
    <option value="Europe">Europe</option>
    <option value="Asia">Asia</option>
    <option value="Middle-East">Middle East</option>
    <option value="North-America">North America</option>
    <option value="South-America">South Ameica</option>
    </select>
    <br><br>

    <label for="dietary">Dietary:</label>
    <select input type="text" id="dietary" name="dietary" value="<?php echo $recipe['dietary']; ?>"><br>
    <option value="">-- Select One --</option>
    <option value="Vegan">-- Vegan --</option>
    <option value="Non-Vegan">-- Non-Vegan --</option>
    </select><br>

    <label for="photo">photo:</label>
     <!-- <input type="text" id="photo" name="photo" value="<?php echo $recipe['photo']; ?>"><br><br> -->
    <input id="photo" name="photo" type="file"><br>
    <input type="submit" value="Submit">
  </form>
</div>

<div id="ManageRecipe" class="tabcontent">
  <h3>Manage Recipe</h3>
  <?php
  try {
    // Check for user_id
    if (isset($_SESSION['user_id'])) {
        // Select recipes' name and photo from the database for the logged-in user
        $user_id = $_SESSION['user_id'];
        $statement = $pdo->prepare("SELECT recipe_id, name, photo FROM recipe WHERE chef_id = ?");
        $statement->execute([$user_id]);
        $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($recipes) {
            // Display each recipe with edit options
            foreach ($recipes as $recipe) {
                echo "<form action='/includes/recipe/upload_recipe.php' method='post' enctype='multipart/form-data'>";
                echo "<input type='hidden' name='recipe_id' value='{$recipe['recipe_id']}'>"; // Hidden field for recipe ID
                echo "<label for='photo'>Photo:</label>";
                echo "<img src='../../uploads/{$recipe['photo']}' alt='{$recipe['name']}'><br>";
                echo "<input type='file' id='photo' name='photo'><br>"; // Photo upload input
                echo "<label for='name'>Name:</label>";
                echo "<input type='text' id='name' name='name' value='{$recipe['name']}'><br><br>"; // Name input
                echo "<input type='submit' value='Save'><br><br>"; // Save button
                echo "</form>";
                echo "<hr>";
            }
        } else {
            echo "<p>No recipes found for this user.</p>";
        }
    } else {
        header("Location: login.php");
    }
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  ?>
</div>

<script>
  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>
  
  
    
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

<?php
    } else {
      echo "<h1>User not found</h1>";
    }
  } else {
    header("Location: login.php");
  }
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>