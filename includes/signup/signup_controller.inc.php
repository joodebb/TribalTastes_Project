<?php 

declare(strict_types= 1);

// Validate that all field are not empty
function is_input_empty(string $username,string $first_name, string $last_name, string $email, string $password) {
  if (empty($username) || empty($email) || empty($password)) {
    return true;
  } else {
    return false;
  }
}

// Validate email
function is_email_invalid(string $email) {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }

}

// Validate username uniqueness
function is_username_taken(object $pdo, string $username) {
  // get username from the db via the model
  if (get_username($pdo, $username)){
    return true;
  } else {
    return false;
  }
}

// Validate email uniqueness
function is_email_registered(object $pdo, string $email) {
  // get username from the db via the model
  if (get_email($pdo, $email)){
    return true;
  } else {
    return false;
  }
}


//////////////////////////////// User actions /////////////////////////////////////////
function create_user(object $pdo, string $username, string $first_name, string $last_name, string $email, string $password) {
  // connect to the model to create user

  set_user($pdo, $username,  $first_name, $last_name, $email, $password);
}