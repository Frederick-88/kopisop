<?php session_start() ?>
<?php if (!isset($_SESSION['login'])) {
    header('location:./auth/login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['name'] ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/styles/navbar.css">

    <link rel="stylesheet" href="../assets/styles/account.css">
</head>

<body>
    <?php include "../component/navbar.php"; ?>
    <div class="bg-custom">
        <div class="container mt-5">
            <div class="d-flex justify-content-center align-items-center m-sm-0 m-md-5">
                <div class="card w-100 p-sm-2 p-md-5">
                    <div class="card-body m-sm-0 m-md-5">
                        <h1 class="card-title mb-sm-2 mb-md-5">Personal Information</h1>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $_SESSION['name'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" readonly class="form-control-plaintext" value="<?php echo $_SESSION['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo empty($_SESSION['address']) ? "-" : $_SESSION['address']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo empty($_SESSION['phone']) ? "-" : $_SESSION['phone']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <div class="bg-custom">
        <div class="container mt-5">
            <div class="d-flex justify-content-center align-items-center m-sm-0 m-md-5">
                <div class="card w-100 p-sm-2 p-md-5">
                    <div class="card-body m-sm-0 m-md-5">
                        <h1 class="card-title mb-sm-2 mb-md-5">Personal Information</h1>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo $_SESSION['name'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" readonly class="form-control-plaintext" value="<?php echo $_SESSION['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo empty($_SESSION['address']) ? "-" : $_SESSION['address']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" value="<?php echo empty($_SESSION['phone']) ? "-" : $_SESSION['phone']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
=======
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
>>>>>>> bf5b625387a5ca7780cc307c73786d1ea036bd03
</body>

</html>