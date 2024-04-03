<?php 

$dsn = "mysql:host=localhost;dbname=TribalTaste;";
$dbusername = "joodebb";
$dbpassword = "joodebb";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword, );
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // // Create Database

  // $sql_db = "CREATE DATABASE IF NOT EXISTS TribalTaste";
  // $pdo->exec($sql_db);

  // // Execute Database

  // $pdo->exec("USE TribalTaste");

  // Create database tables if they don't exist
  $sql = "CREATE TABLE IF NOT EXISTS users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      first_name VARCHAR(255),
      last_name VARCHAR(255),
      email VARCHAR(100) NOT NULL,
      password VARCHAR(255) NOT NULL,
      is_admin BOOLEAN DEFAULT FALSE,
      UNIQUE (username),
      UNIQUE (email),
      created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  )";



/*$sql2 = "CREATE TABLE IF NOT EXISTS chef (
  chef_id VARCHAR(20) NOT NULL  PRIMARY KEY,
  id INT(11) UNSIGNED NOT NULL,
  specialisation VARCHAR(255),
  FOREIGN KEY (id) REFERENCES users(id)
)";
*/


$sql2 = "CREATE TABLE IF NOT EXISTS recipe (
  recipe_id INT  AUTO_INCREMENT PRIMARY KEY,
  chef_id INT(11)  NOT NULL ,
  name VARCHAR(255),
  ingredient TEXT,
  description TEXT,
  location VARCHAR(255),
  dietary VARCHAR(50),
  photo VARCHAR(255),
  FOREIGN KEY (chef_id) REFERENCES users(id)
)";

  $pdo->exec($sql);
  $pdo->exec($sql2);
 

  
// echo "Connected Successfully";
  // echo "User table created successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  die("Connection failed: " . $e->getMessage());
}
