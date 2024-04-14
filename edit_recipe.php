<?php
// Include database connection and session start
include("./includes/utils/dbh.inc.php");
include("./includes/utils/start_session.php");

// Check if recipe_id is provided in the URL
if(isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];

    try {
        // Retrieve recipe details from the database based on recipe_id
        $statement = $pdo->prepare("SELECT * FROM recipe WHERE recipe_id = ?");
        $statement->execute([$recipe_id]);
        $recipe = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($recipe) {
            // Ensure the recipe_id is properly passed in the form submission
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="assests/css/style.css">
           <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
                <title>Edit Recipe</title>
            </head>
            <body>
           <div class="edit_recipe">
                <h1>Edit Recipe</h1>
                <form action="/includes/recipe/update_recipe.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
                    <label for="name">Recipe Name:</label><br>
                    <input type="text" id="name" name="name" value="<?php echo $recipe['name']; ?>"><br>
                    
                    <label for="ingredient">Ingredient:</label><br>
                    <textarea id="ingredient" name="ingredient" cols="30" rows="10"><?php echo $recipe['ingredient']; ?></textarea><br>
                    
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" cols="50" rows="10"><?php echo $recipe['description']; ?></textarea><br>
                    
                    <label for="location">Location:</label>
                    <select id="location" name="location">
                        <option value="African" <?php if($recipe['location'] == 'African') echo 'selected'; ?>>African</option>
                        <option value="Europe" <?php if($recipe['location'] == 'Europe') echo 'selected'; ?>>Europe</option>
                        <option value="Asia" <?php if($recipe['location'] == 'Asia') echo 'selected'; ?>>Asia</option>
                        <option value="Middle-East" <?php if($recipe['location'] == 'Middle-East') echo 'selected'; ?>>Middle East</option>
                        <option value="North-America" <?php if($recipe['location'] == 'North-America') echo 'selected'; ?>>North America</option>
                        <option value="South-America" <?php if($recipe['location'] == 'South-America') echo 'selected'; ?>>South America</option>
                    </select><br><br>
                    
                    <label for="dietary">Dietary:</label>
                    <select id="dietary" name="dietary">
                        <option value="Vegan" <?php if($recipe['dietary'] == 'Vegan') echo 'selected'; ?>>Vegan</option>
                        <option value="Non-Vegan" <?php if($recipe['dietary'] == 'Non-Vegan') echo 'selected'; ?>>Non-Vegan</option>
                    </select><br><br>
                    
                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo"><br>
                    <input type="submit" value="Save Changes">
                </form>
        </div>
        
            </body>
            </html>
            <?php
        } else {
            echo "<p>Recipe not found.</p>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "<p>Recipe ID not provided.</p>";
}
?>