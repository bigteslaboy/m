<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'config.php';

function sendMail($to, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Set mailer to use SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = MAILHOST;
        $mail->Username = USERNAME;
        $mail->Password = PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Set sender and recipient
        $mail->setFrom(SEND_FROM, SEND_FROM_NAME);
        $mail->addAddress($to); // Use a predefined email here
        $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);

        // Set email format to HTML
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = strip_tags($message); // Plain text for non-HTML mail clients

        // Send the email
        if (!$mail->send()) {
            return "<p id='div1' class='message-error'>Email not sent. Please try again.</p>";
        } else {
            return "<p id='div1' class='message-success'>Success: Email sent!</p>";
        }
        
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $subject = "New Contact Form Submission";
    $message = "<h1>New Contact Form Submission</h1>";
    $message .= "<p><strong>Name:</strong> {$name}</p>";
    $message .= "<p><strong>Email:</strong> {$email}</p>";
    $message .= "<p><strong>Phone:</strong> {$phone}</p>";

    // Set the recipient email address (e.g., your email)
    $recipientEmail = "bigteslaboy@gmail.com"; // Replace with your email address

    // Send the email
    echo sendMail($recipientEmail, $subject, $message);
}
?>
