
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $companyWeb = $_POST['company-web'];
    $company = $_POST['company'];
    $subject = $_POST['Subject'];
    $message = $_POST['message'];
    $submit = $_POST['submit'];

    // PHPMailer initialization
    $mail = new PHPMailer(true);

    try {
      // Server settings
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';  // Change this to your SMTP server
      $mail->SMTPAuth = true;
      $mail->Username = 'khair@accountingcycle.us'; // Change this to your SMTP username
      $mail->Password = 'kxwiewoobzccjkgt'; // Change this to your SMTP password
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465; // Change this to your SMTP port

      // Recipients
      $mail->setFrom('khair@accountingcycle.us', 'khair');
      $mail->addAddress('recipient@example.com', 'Recipient Name');

      // Content
      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = "Name: $name <br> Email: $email <br> Phone: $phone <br> Company Website/LinkedIn: $companyWeb <br> Company: $company <br> Message: $message";

      // Send email
      $mail->send(); 
      echo '<script>alert("Message has been sent successfully");</script>';
      header("Location: index.html");
      exit(); 
    } 
    catch (Exception $e) {
      echo "
         <script>alert('Message could not be sent.')</script>";
    }
  }
}
 else {
}
?>