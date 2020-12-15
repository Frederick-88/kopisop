<?php
require '../model/Auth_Model.php';

include '../component/modal/modal_resent_verify.php';

$verify = new Auth;


$id = $_GET['id'];
$token = $_GET['token'];

$result = $verify->verify($id, $token);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/styles/verify.css">

    <title>Verify Account</title>

</head>

<body>
    <div class="header">
        <h1> Kopisop</h1>
    </div>
    <div class="container">
        <?php
        if ($result) { ?>
            <div class="fill">
                <img class="img-fill" src="../assets/images/checklist.png" alt="">
                <br>
                <h1>Yay! You Did It!</h1>
                <h3>Your account has been successfully activated.</h3>
                <h3>You can now proceed to new <span style="color: #ca1414;">kopisop</span> account.</h3>
            </div>

        <?php } else { ?>
            <div class="fill">
                <img class="img-fill" src="../assets/images/failed.png" alt="">
                <br>
                <h1>Failed To Verify Your Account</h1>
                <h3>Your account failed to activate</h3>
                <h3>Please re-send verify your <span style="color: #ca1414;">kopisop</span> account.</h3>
                <br>
                <button type="button" class="button-verify" data-toggle="modal" data-target="#modalResentVerify">
                    Re-send email here
                </button>
            </div>
        <?php } ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>