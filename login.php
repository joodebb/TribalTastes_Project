
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


<?php 

// Imports
require_once 'includes/utils/config_session.inc.php';
require_once 'includes/login/login_view.inc.php';

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
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="signup.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="chef.php">Chef</a></li>
                <?php echo $logoutLink; ?>
                <?php echo $logoutLink; ?>
              
            </ul>
        </div>
    </section>
    <div class="page">

        <div class="welcome">
        <h1>Welcome back to TribalTaste</h1>
        <h3>Please enter your details</h3>
    </div class="log">
       <div class="login-container">
        <form action="includes/login/login.inc.php" target="_self" method="post" autocomplete="on">
          <h4>User Name</h4><br><input type="text" class="input-with-person-icon" name="username" placeholder="" size="50" required autofocus><br><br>
          <h4>Password</h4><br><input type="password" class="input-with-password-icon" name="password" placeholder="Password" size="50" required><br><br>
          <button>Login</button>
        </form>
       </div>
      <div class="forgot">
        <p>
          Are you new here? 
          <a href="/signup.php"> Signup</a>
        </p>
        </div>
        <div class="forgot1">
        <a href="/forgot-password.php">Forgot Password</a>
      </div>
      </div>
   
        <!-- <form action="/includes/logout.inc.php">
          <button id="logout-btn">logout</button>
        </form> -->
      
        <?php 
          check_login_errors()
        ?>
      </div>
</div>

      <div class="login__content-bg"></div>
    </div>
</div>
  </main>
</body>

</html>
