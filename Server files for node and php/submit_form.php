<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require 'vendor/autoload.php';

// Load the .env file
$dotenv = Dotenv::createImmutable('./.env');    
$dotenv->load();

$appPassword = $_ENV['GMAIL_APP_PASSWORD'];
error_log("App password: " . $appPassword);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {

        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = getenv('SMTP_HOST') ?: 'smtp.gmail.com';
        $mail->Port = getenv('SMTP_PORT') ?: 465;
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = $appPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        // Email details
        $mail->setFrom('', '');
        $mail->addAddress('');
        $mail->Subject = 'A new message from there and there';
        $mail->Body = "You have received a new message:\n\n" .
                      "Name: $name\n" .
                      "Email: $email\n" .
                      "Message: $message";

        // Send email
        if ($mail->send()) {
            // If email is sent successfully, return 'success'
            echo 'success';
        } else {
            // If email sending fails, return an error message
            echo 'There was an error sending the email: ' . $mail->ErrorInfo;
        }

    } catch (Exception $e) {
        // Return an error message in case of exceptions
        echo 'There was an error sending the email: ' . $e->getMessage();
    }
}
?>
