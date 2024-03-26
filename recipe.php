

<?php 

// Start session

include("./includes/utils/start_session.php");

// Check if the user is logged in
$isLogged = isset($_SESSION['user_id']);

// Set link dynamically
$loginLink = $isLogged ? "" : '<li><a href="../login.php">Login</a></li>';
$recipeleLink = $isLogged ? '<li><a href="../recipe.php">Recipe</a></li>' : "";
$registerLink = $isLogged ? "" : '<li><a href="../signup.php">Register</a></li>';
$logoutLink = $isLogged ? '<li><a href="../includes/logout.inc.php">Logout</a></li>' : "";
?>



<?php 
session_start();

include("./includes/dbh.inc.php");


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
      
      
      <div class="container">
        <div class="manage">
       
        <?php         
        include("./components/profile_form.php");
        ?>
          </div>
 </div>
    
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
                <?php echo $logoutLink; ?>
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
                    
                  </div>
            </li>

        </div>

    </section>

   
          <div class="container">
              <section class="profile">
            
                  <div class="profile-info">
                      <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
                      <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                      <p><strong>First Name:</strong> <?php echo $user['first_name']; ?></p>
                      <p><strong>Last Name:</strong> <?php echo $user['last_name']; ?></p>
                      <p><strong>Nationality:</strong> <?php echo $user['nationality']; ?></p>
                      <p><strong>Date of Birth:</strong> <?php echo $user['date_of_birth']; ?></p>
                      <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
                      <!-- Display other user details here -->
                  </div>
                  <div class="profile-actions">
                  <a href="/manage-profile.php" class="button" id="manage-profile-btn">Manage Profile</a>
                  <a href="/" class="button" id="back-btn">Back to home</a>
                  </div>
              </section>
            
          </div>


<div class="content">
    <h1><a href="#">Explore our  recipes</a></h1>
</div>
<div class="filter-container">
    <h2>Filter Options</h2>
    <form id="filter-form">

        <label for="location">Location</label>
        <select name="location" id="location">
            <option value="">Africa</option>
            <option value="">Asia</option>
            <option value="">Europe</option>
            <option value="">North America</option>
            <option value="">South America</option>
        </select>

        <label for="Chef">Chef</label>
        <select name="name" id="name">
            <option value="">Chef Marcus</option>
            <option value="">Chef Kwame</option>
            <option value="">Chef Aisha</option>
            <option value="">Chef Fatima</option>
            <option value="">Chef Sophia </option>
            <option value="">Chef Isabella </option>
        </select>
        
        <label for="category">Category</label>
        <select name="category" id="category">
            <option value="">Ghanaian cuisine</option>
            <option value="">Nigerian cuisine</option>
            <option value="">North American Cuisine</option>
            <option value="">Caribbean cuisine</option>
            <option value=""> French cuisine </option>
            <option value="">British  cuisine </option>
            <option value="">Asian cuisine</option>
            <option value="">Middle East cuisine</option>
        </select>
        
        <label for="cooking-time">cooking-time</label>
        <select name="time" id="time">
            <option value=""> 180 minutes</option>
            <option value=""> 120 minutes</option>
            <option value=""> 60 minutes </option>
            <option value=""> 30 minutes</option>
            <option value=""> 15 minutes</option>
        </select>
        
      
    </form>

</div>

<div class="recipes-container">
    <!-- Display filtered recipes here -->
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

