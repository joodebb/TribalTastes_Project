
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

// Imports
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';

// Redirect already logged in user to the home page

if (isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
    <title>TribalTastes | Login Page</title>
</head>
<body>
  <main>
  <section class="menu">
        <div class="nav">
            <div class="logo"><a href="index.php"><img src="assests/images/logo1.png" alt="logo"></a></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="signup.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
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


        <h3>Welcome back to TribalTaste</h3>
        <p>Please enter your details</p>

        <form action="includes/login.inc.php" target="_self" method="post" autocomplete="on">
          <input type="text" class="input-with-person-icon" name="username" placeholder="Username" size="50" required autofocus><br>
          <input type="password" class="input-with-password-icon" name="password" placeholder="Password" size="50" required><br>
          <button>Login</button>
        </form>
      
        <p>
          Are you new here? 
          <a href="/signup.php"> Signup</a>
        </p>
      
        <!-- <form action="/includes/logout.inc.php">
          <button id="logout-btn">logout</button>
        </form> -->
      
        <?php 
          check_login_errors()
        ?>
      </div>

      <div class="login__content-bg"></div>
    </div>
  </main>
</body>

</html>
