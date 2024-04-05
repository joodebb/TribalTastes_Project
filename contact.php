



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/unsemantic-grid-responsive-tablet.css">
    <title>Contact Us</title>

</head>
<body class="contact-us">

<section class="menu">
        <div class="nav">
            <div class="logo"><a href="index.php"><img src="assests/images/logo1.png" alt="logo"></a></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>

        </div>

    </section>

    <div class="contact-container">
    <h2>Contact Us</h2>
    <form  class="contact" action="#" method="post">
      <label for="fullName">Full Name</label>
      <input type="text" id="fullName" name="fullName" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" required>

      <label for="complaintType" class="type">Type of Feedback</label>
      <select id="complaintType" name="complaintType">
        <option value="complaint">Complaint</option>
        <option value="suggestion">Suggestion</option>
      </select>

      <label for="details">Details</label>
      <textarea id="details" name="details" rows="4" required></textarea>

      <button type="submit">Submit</button>
    </form>
    <div class="chat">
    <h4> drop us an Email or use our Live chat..</h4>
   </div>
    <div class="channels">
    <a href="mailto:info@tribaltastes@gmail.com">
        <img src="https://cdn-icons-png.flaticon.com/128/732/732200.png" alt="Email">
    </a>

    <a href="https://wa.me/447425356398">
        <img src="https://cdn-icons-png.flaticon.com/128/733/733585.png">
    </a>
</div>
  </div>
    