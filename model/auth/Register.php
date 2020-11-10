<?php
require '../../library/process.php';

use PHPMailer\PHPMailer\PHPMailer;

include '../../vendor/autoload.php';

session_start();

$error = [];

if (isset($_POST['reg_user'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $mail = new PHPMailer();


    $query = "SELECT * FROM Customer WHERE email='$email'";
    $result = $mysqli->query($query);

    if (mysqli_num_rows($result) > 0) {
        $error['error_msg'] = "Email already exists";
    }

    if (count($error) === 0) {
        $query = "INSERT INTO Customer SET name=?, email=?, password=?, token=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ssss', $name, $email, $password, $token);
        $insert_data = $stmt->execute();
        $user_id = $stmt->insert_id;

        $url = 'http://'.$_SERVER['SERVER_NAME'].'/kopisop/view/auth/verify.php?id='.$user_id.'&token='.$token;  
        $link= '<a href='."$url".'> Verify Here </a>';

		$output = '<p>Thanks for registering with localhost. Please click this link to complete this registation <br>'.$link.'</p>';

        if ($insert_data) {
            $stmt->close();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kopisopweb@gmail.com';
            $mail->Password = '';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';

            $mail->setFrom('kopisopweb@gmail.com', 'Kopisop Official');
            $mail->addAddress($email, $name);

            $mail->isHTML(true);

            $mail->Subject = 'Register confirmation';
            $mail->Body    = $output;

            if(!$mail->send()) {
                $_SESSION['message'] = "Message could not be sent. Mailer Error: $mail->ErrorInfo";
                $_SESSION['type'] = "alert-danger";
                
                header('location: ../../view/auth/register.php');

			} else {
                $_SESSION['message'] = "Please check your email for verify";
                $_SESSION['type'] = "alert-warning";
    
                header('location: ../../view/auth/login.php');
            }
        } else {
            $error['error_msg'] = "Error while inserting data. Please Try again";
        }
    } else {
        $_SESSION['message'] = $error['error_msg'];
        $_SESSION['type'] = "alert-danger";
        header('location: ../../view/auth/register.php');
    }
}
