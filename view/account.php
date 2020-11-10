<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./auth/login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Menu</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/navbar.css">

    <link rel="stylesheet" href="../styles/account.css">
</head>

<body>
    <?php include "../component/navbar.php"; ?>
    <div class="row no-gutters">
        <div class="col-lg-3 col-md-12 no-gutters">
            <div class="img-box py-5">
                <div class="d-flex flex-column align-items-center text-center ">

                    <?php if (isset($_SESSION['pic'])) { ?>
                        <img src="<?php echo $_SESSION['pic'] ?>" alt="Admin" class="rounded-circle" width="150">
                    <?php } else { ?>
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <?php } ?>

                    <div class="mt-3">
                        <h4><?php echo $_SESSION['name'] ?></h4>
                        <button class="btn btn-danger">Change Photo</button>
                    </div>
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item list-group-item-action">Personal Information</li>
                <li class="list-group-item list-group-item-action">Feedback</li>
                <li class="list-group-item list-group-item-action">Log Out</li>
            </ul>
        </div>
        <div class="col-lg-9 col-md-12 no-gutters">
            <div class="rightside d-flex justify-content-center align-items-center">
                <div class="card" style="width: 25rem;">

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>