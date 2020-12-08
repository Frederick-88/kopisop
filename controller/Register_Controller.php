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
$mail->setFrom($_ENV['EMAIL_PHPMAILER'], 'Kopisop Official');
$mail->AddEmbeddedImage('../assets/images/cherry-e-mail-marketing.png', 'image-email', 'image-email.png'); 

$message = file_get_contents('../view/email/Layout_verify.php');

echo $message;

if (isset($_POST['reg_user'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $token = bin2hex(random_bytes(50));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $result = $auth->regUser($email, $name, $token, $password);

    if ($result) {
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/kopisop/view/verify.php?id=' . $result . '&token=' . $token;
        $message = str_replace('%link%', $url, $message);

        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Register confirmation';
        $mail->Body    = $message;

        if (!$mail->send()) {
            $_SESSION['notif_auth'] = true;
            $_SESSION['message'] = "Message could not be sent. Mailer Error: $mail->ErrorInfo";
            $_SESSION['type'] = "alert-danger";

            header('location: ../view/auth/register.php');
        } else {
            $_SESSION['notif_auth'] = true;
            $_SESSION['message'] = "Please check your email for verify";
            $_SESSION['type'] = "alert-warning";

            header('location: ../view/auth/login.php');
        }
    } else {
        $_SESSION['notif_auth'] = true;
        $_SESSION['message'] = $auth->errors;
        $_SESSION['type'] = "alert-danger";
        header('location: ../view/auth/register.php');
    }
}

if (isset($_POST['resent_verify'])) {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50));
    $result = $auth->resentVerify($email, $token);

    if ($result) {
        echo $result;
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/kopisop/view/verify.php?id=' . $result . '&token=' . $token;
        $link = '<a href=' . "$url" . '> Verify Here </a>';

        $output = '<p>Thanks for registering with localhost. Please click this link to complete this registation <br>' . $link . '</p>';

        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Register confirmation';
        $mail->Body    = $output;

        if (!$mail->send()) {
            $_SESSION['notif_auth'] = true;
            $_SESSION['message'] = "Message could not be sent. Mailer Error: $mail->ErrorInfo";
            $_SESSION['type'] = "alert-danger";
        } else {
            $_SESSION['notif_auth'] = true;
            $_SESSION['message'] = "Please check your email for verify";
            $_SESSION['type'] = "alert-warning";
        }
    } else {
        $_SESSION['notif_auth'] = true;
        $_SESSION['message'] = $auth->errors;
        $_SESSION['type'] = "alert-danger";
    }
    header('location: ../view/auth/login.php');
}
