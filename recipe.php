


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
    <title>Recipe</title>
</head>
<body>
    <section class="menu">

        <div class="nav">
            <div class="logo"><a href="index.php"><img src="assests/images/logo1.png" alt="logo"></a></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>

        </div>

    </section>


<div class="content">
    <h1><a href="#">Explore our  recipes</a></h1>
</div>
<div class="filter-container">
    <h2>Filter All Recipes</h2>
    <form id="filter-form">

        <label for="location">Location</label>
        <select name="location" id="location">
            <option value="">Africa</option>
            <option value="">Asia</option>
            <option value="">Europe</option>
            <option value="">North America</option>
            <option value="">South America</option>
        </select>

        <label for="Chef">Chef</label>
        <select name="name" id="name">
            <option value="">Chef Marcus</option>
            <option value="">Chef Kwame</option>
            <option value="">Chef Aisha</option>
            <option value="">Chef Fatima</option>
            <option value="">Chef Sophia </option>
            <option value="">Chef Isabella </option>
        </select>
        
        <label for="category">Category</label>
        <select name="category" id="category">
            <option value="">Ghanaian cuisine</option>
            <option value="">Nigerian cuisine</option>
            <option value="">North American Cuisine</option>
            <option value="">Caribbean cuisine</option>
            <option value=""> French cuisine </option>
            <option value="">British  cuisine </option>
            <option value="">Asian cuisine</option>
            <option value="">Middle East cuisine</option>
        </select>
        
        <label for="cooking-time">cooking-time</label>
        <select name="time" id="time">
            <option value=""> 180 minutes</option>
            <option value=""> 120 minutes</option>
            <option value=""> 60 minutes </option>
            <option value=""> 30 minutes</option>
            <option value=""> 15 minutes</option>
        </select>
        
      
    </form>

</div>

<div class="recipes-container">
    <!-- Display filtered recipes here -->
</div>



     <footer>
        <div class="footer-container">
            <div class="social-media"></div>
            <h4><a href="#">Contact Us</a></h4>

            <div class="footer-links">
                <a href="#"><img class="five" src="assests/images/facebook.png" alt="Facebook"></a>
                <a href="#"><img class="five" src="assests/images/twitter.png" alt="Twitter"></a>
                <a href="#"><img class="five" src="assests/images/youtube.png" alt="YouTube"></a>
                <a href="#"><img class="five" src="assests/images/telegram.png" alt="telegram"></a>
            </div>
           
        </div>

        <div class="footer-grid">
            <div class="footer-grid-item">
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>



            <div class="footer-grid-item">
                <ul>
                    <li><a href="#">Cookie Policy</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul> 
            </div>

            <h4 >TM & Copyright 2024 @ TribalTastes. All rights reserved </h4>
            </div>
           

     </footer>
        
</body>
</html>

