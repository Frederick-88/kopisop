<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'kopisop') or die(mysqli_error($mysqli));

$name = "";
$email = "";
$errors = [];

// SIGN UP USER
if (isset($_POST['reg_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $query = "SELECT * FROM User WHERE email='$email' LIMIT 1";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 1) {
        $errors['email'] = "Email already exists";
        
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO User SET name=?, email=?, password=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('sss', $name, $email, $password);
        $result = $stmt->execute();
        print_r($stmt);

        if ($result) {
            $stmt->close();

            // TO DO: send verification email to user
            // sendVerificationEmail($email, $token);

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'Account success registered!';
            $_SESSION['type'] = 'alert-success';
            header('location: ../login.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    } else {
        $_SESSION['message'] = $errors['email'];
        $_SESSION['type'] = "alert-danger";

        header('location: ../register.php');
    }
}
