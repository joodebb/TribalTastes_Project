<?php 

declare(strict_types= 1);

// Get Username from DB
function get_username(object $pdo, string $username) {
  $query = "SELECT username FROM users WHERE username = :username";
  $statement = $pdo->prepare($query);
  $statement->bindParam(":username", $username);
  $statement->execute();

  // Fetch this result as an associative array
  $result = $statement->fetch(PDO::FETCH_ASSOC);
  return $result;
}

// Get Email From DB
function get_email(object $pdo, string $email) {
  $query = "SELECT email FROM users WHERE email = :email";
  $statement = $pdo->prepare($query);
  $statement->bindParam(":email", $email);
  $statement->execute();

  // Fetch this result as an associative array
  $result = $statement->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function set_user(object $pdo, string $username, string $email, string $password) {
  $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password);";
  $statement = $pdo->prepare($query);

  // hash password
  $options = [
    'cost' => 12,
  ];

  $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

  $statement->bindParam(":username", $username);
  $statement->bindParam(":email", $email);
  $statement->bindParam(":password", $hashedPassword);
  $statement->execute();
}