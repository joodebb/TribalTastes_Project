<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  try {
    
    require_once "dbh.inc.php";
    require_once "signup_model.inc.php";
    require_once "signup_controller.inc.php";

    // ERROR HANDLERS
      // Create Errors array
    $errors = [];

    if (is_input_empty($username, $email, $password)) {
      $errors["empty_input"] = "Fill in all fields!";
    }

    if (is_email_invalid($email)) {
      $errors["invalid_email"] = "Invalid email used!";
    };

    if (is_username_taken($pdo, $username)) {
      $errors["username_taken"] = "Username already taken!";
    };

    if (is_email_registered($pdo, $username)) {
      $errors["email_used"] = "Email already registered";
    };


    // Start session
    require_once 'config_session.inc.php'; // Because I created a safer way to start a session in this required file.
    // Check errors array
    if ($errors) {
      $_SESSION["signup_errors"] = $errors;

      $signupDetails = [
        "username" => $username,
        "email" => $email
      ];

      $_SESSION["signup_data"] = $signupDetails;

      header("Location: ../login.php");
      die();
    }

    // Create user on signup
    create_user($pdo, $username, $email, $password);
    header("Location: ../signup.php?signup=success");
    $pdo = null;
    $statement = null;
    die();

  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }
} else {
  header("Location: ../profile.php");
  die();
}

