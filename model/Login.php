<?php
require '../library/process.php';

session_start();

$errors = [];

// LOGIN
if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM User where email='$email' LIMIT 1";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['login'] = true;
            header('location: ../view/index.php');
            exit();
        } else {
            $errors['login_fail'] = "Wrong Password";
        }
    } else {
        $errors['login_fail'] = "Email doesn't exists";
    }

    if (count($errors) > 0) {
        $_SESSION['message'] = $errors['login_fail'];
        $_SESSION['type'] = "alert-danger";
        header('location: ../view/login.php');
    }
}
