<?php
// Assuming you have already established a database connection
include "./includes/utils/start_session.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected filters
    $location = $_POST["location"];
    $dietary = $_POST["dietary"];

    // Construct the SQL query based on the selected filters
    $sql = "SELECT * FROM recipe WHERE 1";

    if (!empty($location)) {
        $sql .= " AND location = '$location'";
    }

    if (!empty($dietary)) {
        $sql .= " AND dietary = '$dietary'";
    }

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any recipes are found
    if (mysqli_num_rows($result) > 0) {
        // Output the recipes
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Recipe Name: " . $row["name"] . "<br>";
            echo "Chef: " . $row["chef_id"] . "<br>";
            // Output other recipe details as needed
            echo "<hr>";
        }
    } else {
        echo "No recipes found.";
    }

    // Free result set
    mysqli_free_result($result);
}