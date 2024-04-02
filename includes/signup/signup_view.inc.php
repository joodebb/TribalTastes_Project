<?php 

declare(strict_types= 1);

function signup_inputs() {
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["signup_errors"]["username_taken"])) {
      echo '<div class="signup-input-container">';
      echo '<label for="username">User Name:</label>';
      echo '<input type="text" class="input-with-person-icon" name="username" placeholder="Username"  value="'. $_SESSION["signup_data"]["username"] .'" required>';
      echo '</div>';
    } else {
      echo '<div class="signup-input-container">';
      echo '<label for="username">User Name:</label>';
      echo '<input type="text" class="input-with-person-icon" name="username" placeholder=" " required>';
      echo '</div>';
    }

    if (isset($_SESSION["signup_data"]["first_name"]) && !isset($_SESSION["signup_errors"]["last_name_taken"])) {
      echo '<div class="signup-input-container">';
      echo '<label for="first name">First Name:</label>';
      echo '<input type="text" class="input-with-person-icon" name="first_name" placeholder="first name"  value="'. $_SESSION["signup_data"]["first_name"] .'" required>';
      echo '</div>';
    } else {
      echo '<div class="signup-input-container">';
      echo '<label for="username">First Name:</label>';
      echo '<input type="text" class="input-with-person-icon" name="first name" placeholder=" " required>';
      echo '</div>';
    }

    if (isset($_SESSION["signup_data"]["last_name"]) && !isset($_SESSION["signup_errors"]["last_name_taken"])) {
      echo '<div class="signup-input-container">';
      echo '<label for="username">Last Name:</label>';
      echo '<input type="text" class="input-with-person-icon" name="last_name" placeholder="last_name"  value="'. $_SESSION["signup_data"]["last_name"] .'" required>';
      echo '</div>';
    } else {
      echo '<div class="signup-input-container">';
      echo '<label for="username">Last Name:</label>';
      echo '<input type="text" class="input-with-person-icon" name="last_name" placeholder="" required>';
      echo '</div>';
    }


    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["signup_errors"]["email_used"]) && !isset($_SESSION["signup_errors"]["invalid_email"])) {
      echo '<div class="signup-input-container">';
      echo '<label for="username">Email:</label>';
      echo '<input type="email" class="input-with-email-icon" name="email" placeholder="E-mail"  value="'. $_SESSION["signup_data"]["email"] .'" required>';
      echo '</div>';
    } else {
      echo '<div class="signup-input-container">';
      echo '<label for="username">Email:</label>';
      echo '<input type="email" class="input-with-email-icon" name="email" placeholder="" required>';
      echo '</div>';
    }
    echo '<div class="signup-input-container">';
    echo '<label for="password ">Password :</label>';
    echo '<input type="password" class="input-with-password-icon" name="password" placeholder="Password" required>';
    echo '</div>';

    
}

function check_signup_errors() {
  if (isset($_SESSION['signup_errors'])) {
    $errors = $_SESSION['signup_errors'];
    // echo "<br>";

    foreach ($errors as $error) {
      echo '<p class="form-error">' . $error . '</p>';
    }

    // Delete this errors from session because it isn't needed anymore
    unset($_SESSION['signup_errors']);
  } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
    // echo '<br>';
    echo '<p class="form-success">Signup success!</p>';
  }
}