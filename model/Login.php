<?php
require '../library/process.php';

session_start();

$name = '';
$email = '';
$password = '';
$errors = [];

// LOGIN
if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM User where email='$email' LIMIT 1";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) < 0) {
        $errors['email'] = "Please insert a valid email!";
    }

    if (count($errors) === 0) {
        $query = "SELECT * FROM User WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: ../view/index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong Email / Password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";

            header('location: ../view/login.php');
        }
    }
}
