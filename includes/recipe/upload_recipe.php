<?php 

// Check if a session is not already active
include("../utils/start_session.php");


// Check if the user is logged in

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
  try {
    // GET form data
    include("../utils/dbh.inc.php");
    include("../utils/auth_check.php");
    $recipe_id = $_POST["recipe_id"];
    $chef_id = $_SESSION['user_id'];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $dietary = $_POST["dietary"];


    // GET ID OF CURRENT USER (LOGGED IN USER)
    // $chef_id = $_SESSION["user_id"];
    // $photo = $_POST["photo"]; // Remove this line

     // Handle file type
     $fileName = $_FILES['photo']['name']; // Correct usage of $_FILES instead of $_POST
     $fileTmpName = $_FILES['photo']['tmp_name'];
     $fileSize = $_FILES['photo']['size'];
     $fileErr = $_FILES['photo']['error'];
     $fileType = $_FILES['photo']['type'];
 
     $fileExt = explode('.', $fileName);
     $fileActualExt = strtolower(end($fileExt));
 
     $allowedFormat = array('jpg', 'jpeg', 'png', 'avif');


     // check if type of file submitted is of a format we allowed
    if (in_array($fileActualExt, $allowedFormat)) {
      if ($fileErr === 0) {
        if ($fileSize < 1000000) {
          $fileNameNew = uniqid('', true) . "." . $fileActualExt;
          $fileDestination = '../../uploads/' . $fileNameNew;
          // move the file to the desired location
          move_uploaded_file($fileTmpName, $fileDestination);
          echo "uploaded";
          $photo = $fileNameNew; // Assign the new filename to $photo
        } else {
          echo "<p>The file is too large!</p>";
        }
      } else {
        echo "<p>There was an error uploading your file!</p>";
      }
    } else {
      echo "<p>You cannot upload files of this type!</p>";
    }
   

    // Check if "user" session variable is set
 
    // Write the SQL Script to update to database

    ###

    $sql3 = "INSERT INTO recipe (chef_id, name, description, location, dietary, photo)  
         VALUES (:chef_id, :name, :description, :location, :dietary, :photo)";

    $stmt = $pdo->prepare($sql3);

    // Bind parameters
    $stmt->bindParam(':chef_id', $chef_id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':location', $location, PDO::PARAM_STR);
    $stmt->bindParam(':dietary', $dietary, PDO::PARAM_STR);
    $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);

    $stmt->execute();


    header("Location: ../../../../chef.php");
    exit; // Ensure no further code execution after redirection
  } catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
  }
}
?>
