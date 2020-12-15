<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./auth/login.php');
}
require '../model/Auth_Model.php';

$auth = new Auth;
$user = $auth->getUserById($_SESSION['id']);
$value = $user->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $value['name'] ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/styles/navbar.css">
    <link rel="stylesheet" href="../assets/styles/alert.css">

    <link rel="stylesheet" href="../assets/styles/account.css">
</head>

<body>
    <?php
    include "../component/navbar.php";
    include "../component/alert.php";
    ?>

    <div class="bg-custom">
        <div class="wrapper bg-white mt-sm-5">
            <h4 class="pb-2 border-bottom">Account settings</h4>
            <div class="py-2">
                <div class="border-bottom">
                    <div class="py-1">
                        <label for="email">Email Address</label>
                        <input type="email" class="bg-light form-control" readonly placeholder="user@email.com" value="<?php echo $value['email'] ?>">
                        <small id="emailHelp" class="form-text text-danger">You can't change your email</small>
                    </div>
                </div>

                <form action="../controller/Account_Controller.php" method="post">
                    <div class="py-1">
                        <label for="name">Name</label>
                        <input name='name' type="text" class="bg-light form-control" placeholder="User" value="<?php echo $value['name'] ?>">
                    </div>

                    <div class="py-1">
                        <label for="address">Address</label>
                        <input name='address' type="text" class="bg-light form-control" placeholder="Jln." value="<?php echo empty($value['address']) ? "-" : $value['address']; ?>">
                    </div>

                    <div class="py-1">
                        <label for="phone">Phone Number</label>
                        <input name='phone' type="tel" class="bg-light form-control" value="<?php echo empty($value['phone']) ? "-" : $value['phone']; ?>">
                    </div>

                    <div class="py-1 mt-2">
                        <button type="submit" name="edit_user" class="btn btn-primary mr-3">Edit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>