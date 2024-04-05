<?php
session_start();

// Include database connection
include_once 'db_connection.php';

// Check if the user is logged in and is an admin
if (isset($_SESSION['user_id']) && $_SESSION['is_admin']) {
  try {
    // Retrieve all users
    $userStatement = $pdo->prepare("SELECT * FROM users");
    $userStatement->execute();
    $users = $userStatement->fetchAll(PDO::FETCH_ASSOC);

    // Retrieve all recipes
    $recipeStatement = $pdo->prepare("SELECT * FROM recipe");
    $recipeStatement->execute();
    $recipes = $recipeStatement->fetchAll(PDO::FETCH_ASSOC);



    // Display all users with option to delete
   
    echo "<div class='entity-container1'>";
    echo "<h2>All Users</h2>";
    if ($users) {
        echo "<ul class='entity-list'>";
        foreach ($users as $user) {
            echo "<li>{$user['username']} ";
            echo "<form action='delete.php' method='post' style='display:inline'>";
            echo "<input type='hidden' name='user_id' value='{$user['id']}'><br>";
            echo "<button type='submit' class='delete-button'>Delete</button>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No users found.</p>";
    }
    echo "</div>";
    

    // Display all recipes with option to delete
    echo "<div class='entity-container2'>";
    echo "<h2>All Recipes</h2>";
    if ($recipes) {
        echo "<ul class='entity-list'>";
        foreach ($recipes as $recipe) {
            echo "<li>{$recipe['name']} ";
            echo "<form action='delete.php' method='post' style='display:inline'>";
            echo "<input type='hidden' name='recipe_id' value='{$recipe['recipe_id']}'>";
            echo "<button type='submit' class='delete-button'>Delete</button>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No recipes found.</p>";
    }
    echo "</div>";

    // Summary
    echo "<div class='entity-container3'>";
    echo "<h2>Summary</h2>";
    echo "<table class='summary-table'>";
    echo "<tr><th>Total Users</th><th>Total Recipes</th><th>Location</th><th>Count</th></tr>";
    echo "<tr>";
    echo "<td>" . count($users) . "</td>";
    echo "<td>" . count($recipes) . "</td>";

    // Count of each location
    $locationStatement = $pdo->query("SELECT location, COUNT(*) AS count FROM recipe GROUP BY location");
    $locationCounts = $locationStatement->fetchAll(PDO::FETCH_ASSOC);
    if ($locationCounts) {
        foreach ($locationCounts as $locationCount) {
            echo "<tr>";
            echo "<td></td><td></td>";
            echo "<td>{$locationCount['location']}</td>";
            echo "<td>{$locationCount['count']}</td>";
            echo "</tr>";
        }
    } else {
        echo "<td></td><td></td><td colspan='2'>No locations found</td>";
    }
    echo "</table>";
    echo "</div>";

       
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    // Redirect to login page if not logged in as admin
    header("Location: login.php");
    exit();
}
?>