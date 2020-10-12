<?php
session_start();

require_once "../library/process.php";

$name = "";
$email = "";
$errors = [];

// SIGN UP USER
if (isset($_POST['reg_user'])) {
    if (empty($_POST['name'])) {
        $errors['name'] = 'name required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $query = "SELECT * FROM User WHERE email='$email' LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO User SET name=?, email=?, password=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ssss', $name, $email, $password);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            // TO DO: send verification email to user
            // sendVerificationEmail($email, $token);

            $_SESSION['id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: ../login.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}