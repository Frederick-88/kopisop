<?php include './model/Login.php' ?>
<?php
if (empty($_SESSION['id'])) {
    header('location: ./model/Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css">
    <link rel="stylesheet" href="styles/login.css">
    <title>Login</title>
</head>

<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert <?= $_SESSION['type']; ?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>
    <div class="row no-gutters">
        <div class="col-md-7 no-gutters">
            <div class="leftside d-flex justify-content-center align-items-center">
                <div class="card border-0" style="width: 20rem;">
                    <form action="./index.php" method="GET">
                        <?php if (count($errors) > 0) : ?>
                            <div class="alert alert-danger">
                                <?php foreach ($errors as $error) : ?>
                                    <li>
                                        <?php echo $error; ?>
                                    </li>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <h1>Login Here</h1>
                        <div class="form-group">
                            <label for="emailInput">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-0">
                                        <img class="input-icon" src="./assets/icons/email.png" alt="email">
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control " id="emailInput" placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light border-0">
                                        <img class="input-icon" src="./assets/icons/lock.png" alt="password">
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control " id="passwordInput" placeholder="Enter your password" required>
                            </div>
                        </div>
                        <button type="submit" name="login_user" class="btn btn-block btn-custom">Login</button>
                    </form>
                    <br>
                    <p>Doesn't have account yet? <a href="register.php">Create one.</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-5 no-gutters">
            <div class="rightside d-flex justify-content-center align-items-center">
                <div class="flex-column">
                    <h1 class="display-3 text-center">Welcome</h1>
                    <h3 class="pl-5 pr-5 text-center">Fill up personal information and enjoy!</h3>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>