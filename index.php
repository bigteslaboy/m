
<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the PHPMailer script
require("script.php");

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Call the sendMail function and store the result
    $result = sendMail($email, $subject, $message);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Send Email To Anyone</title>
</head>
<body>
    <a href="" class='logo'>Big-<span>Boy</span></a>
    <main>
     <section class="container">
       
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input-container">
                
                <input type="email" name="email" placeholder="the reciever email" required>

            
           
            
                <input type="text" name="subject" placeholder="email subject" required>

            
            
            <textarea name="message" cols="30"
            rows="10" placeholder="Your Message" required></textarea>
        
            
            </div>
            <button type="submit" name="submit" class="button">submit</button>
        </form>
     </section>
    </main>

    <?php
if (isset($result)) {
    echo "<p id='div1' class='message-success'>$result</p>";
}
?>
      
</body>
</html>