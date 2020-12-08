<?php

use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Dotenv\Dotenv;

include '../vendor/autoload.php';
require '../model/Auth_Model.php';

session_start();

$dotenv = new Dotenv();
$dotenv->load('../.env');

$auth = new Auth();

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = $_ENV['EMAIL_PHPMAILER'];
$mail->Password = $_ENV['PASSWORD_PHPMAILER'];
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';


if (isset($_POST['feedback'])) {
    $id = $_POST['id'];
    $message = $_POST['messageInput'];

    $getData = $auth->getUserById($id);

    if ($getData) {
        $setData = $getData->fetch_assoc();

        $email = $setData['email'];
        $name = $setData['name'];

        $mail->setFrom($email, $name);
        $mail->addAddress($_ENV['EMAIL_PHPMAILER'], "Kopisop Official");

        $mail->Subject = 'Feedback';
        $mail->Body    = $message;

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            header("location:../view/feedback.php");
        }
    }
}
