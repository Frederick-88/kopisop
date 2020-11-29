<?php
require '../model/Auth_Model.php';

session_start();

$auth = new Auth;

// LOGIN
if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $auth->loginUser($email, $password);

    if ($result) {
        header('location: ../view/menu.php');
    } else {
        $_SESSION['notif_auth']=true;
        $_SESSION['message'] = $auth->errors;
        $_SESSION['type'] = "alert-danger";
        header('location: ../view/auth/login.php');
    }
}
