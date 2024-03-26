<?php 

declare(strict_types= 1);

function get_user(object $pdo, string $username) {
  $query = "SELECT * FROM users WHERE username = :username";
  $statement = $pdo->prepare($query);
  $statement->bindParam(":username", $username);
  $statement->execute();

  // Fetch this result as an associative array
  $result = $statement->fetch(PDO::FETCH_ASSOC);
  return $result;
};